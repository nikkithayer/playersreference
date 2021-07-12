<?php

// Attempt select query execution
$sql = "SELECT * FROM $playUnits LEFT JOIN $playContents ON $playUnits.unitId = $playContents.unitId LEFT JOIN $playNotes ON $playContents.lineId = $playNotes.lineIdRef ORDER BY $playContents.lineId ASC";
if($result = mysqli_query($link, $sql)){
  if(mysqli_num_rows($result) > 0){
    $lastAct = "";
    $lastUnit = "";
    $lastLine = array();
    while($row = mysqli_fetch_array($result)){
      if($row['act']!=$lastAct){
        echo "<h1>" . $row['act'] . "</h1>";
        $lastAct = $row['act'];
      }

      if($row['unitId']!==$lastUnit){
        if($lastUnit!==""){ 
          printNote($lastLine, $playNotes, $playName);
          $printString = "";
          unset($lastLine);
          $lastLine[] = $row;
        }
        printUnit($row);
        $lastUnit = $row['unitId'];
      }

      if($row['lineId']!==$lastLine[0]['lineId']){
        if($lastLine[0]['lineId']!==null){
          printNote($lastLine);
        }
        $printString = "";
        unset($lastLine);
      }
      $lastLine[] = $row;

    }
    mysqli_free_result($result);
  }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);

function printNote($line){
  for($i = 0; $i < count($line); $i++) {
    $line[$i]['pos'] = strpos($line[$i]['content'], $line[$i]['contentString']);
    $line[$i]['len'] = strlen($line[$i]['contentString']);
  }
  $pos  = array_column($line, 'pos');
  $len  = array_column($line, 'len');

  array_multisort($pos, SORT_ASC, $len, SORT_DESC, $line);
//if there's no notes on the line, just print it
  printStudentMode($line, "student");
  printReaderMode($line, "reader");
  printPerformerMode($line, "performer");
  printPracticeMode($line, "practice");
  printNotes($line);
}

function printUnit($row){
  echo "<div class='unit-meta'>";
  echo "<h2>" . $row['unit'] . " " . $row['unitTitle'] . "</h2>";
  echo "<h3>" . $row['unitLocation'] . "</h3>";
  echo "<h3>" . $row['unitDescription'] . "</h3>";
//       echo $row['sceneBreak'];
  echo "</div>";

}

function printNotes($line){
  foreach($line as $print){
    if($print['noteContent']!==""){
      echo "<div class='noteClosed' id='open-note-".$print['noteId']."'>".$print['noteContent']."</div>";
    }
  }
}

function printStudentMode($line, $modeName){
  $printString = $line[0]['content'];
  foreach($line as $print){
    if(strpos($printString, $print['contentString'])!== false) {
      if($print['noteType']=="studentNote"){
        $replaceString = "<span id='note-".$print['noteId']."' class='".$print['noteType']."'>".$print['contentString']."</span>";
        $printString = substr_replace($printString, $replaceString, strpos($printString, $print['contentString']), strlen($print['contentString']));
      }
    }
  }
  echo "<div class='".$line[0]['lineType']." ".$modeName." ".$line[0]['lineTags']."' id='line-".$line[0]['lineId']."'>".$printString . "</div>";
}
function printReaderMode($line, $modeName){
  $printString = $line[0]['content'];
  foreach($line as $print){
    if(strpos($printString, $print['contentString'])!== false) {
      if($print['noteType']=="readerGloss"){
        $replaceString = "<span id='note-".$print['noteId']."' aria-reader-gloss='".$print['noteContent']."' class='".$print['noteType']."'>".$print['contentString']."</span>";
        $printString = substr_replace($printString, $replaceString, strpos($printString, $print['contentString']), strlen($print['contentString']));
      }
    }
  }
  echo "<div class='".$line[0]['lineType']." ".$modeName." ".$line[0]['lineTags']."' id='line-".$line[0]['lineId']."'>".$printString . "</div>";
}
function printPerformerMode($line, $modeName){
  $printString = $line[0]['content'];
  foreach($line as $print){
    if(strpos($printString, $print['contentString'])!== false) {
      if($print['noteType']=="performerScansion"){
        $replaceString = "<span id='note-".$print['noteId']."' aria-scansion='".$print['scansionAlt']."' class='".$print['noteType']."'>".$print['contentString']."</span>";
        $printString = substr_replace($printString, $replaceString, strpos($printString, $print['contentString']), strlen($print['contentString']));
      }
      if($print['noteType']=="performerGloss"){
        $replaceString = "<span id='note-".$print['noteId']."' aria-performer-gloss='".$print['noteContent']."' class='".$print['noteType']."'>".$print['contentString']."</span>";
        $printString = substr_replace($printString, $replaceString, strpos($printString, $print['contentString']), strlen($print['contentString']));
      }
    }
  }
  echo "<div class='".$line[0]['lineType']." ".$modeName." ".$line[0]['lineTags']."' id='line-".$line[0]['lineId']."'>".$printString . "</div>";
}
function printPracticeMode($line, $modeName){
  $printString = $line[0]['content'];
  echo "<div class='".$line[0]['lineType']." ".$modeName." ".$line[0]['lineTags']."' id='line-".$line[0]['lineId']."'>".$printString . "</div>";
}

  ?>