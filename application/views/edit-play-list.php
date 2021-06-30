<?php

// Attempt select query execution
$sql = "SELECT * FROM $playUnits LEFT JOIN $playContents ON $playUnits.unitId = $playContents.unitId LEFT JOIN $playNotes ON $playContents.lineId = $playNotes.lineIdRef ORDER BY $playContents.lineId ASC";
if($result = mysqli_query($link, $sql)){
  if(mysqli_num_rows($result) > 0){
    $lastUnit = "";
    $lastLine = array();
    echo "<div id='edit-text'>";
    while($row = mysqli_fetch_array($result)){

      if($row['unitId']!==$lastUnit){
        if($lastUnit!==""){ 
          echo "</div>";
        }
        echo "<a class='unit-accordion-control' href='unit-".$row['unitId']."'>".$row['act'].", ".$row['unit'].", ".$row['unitTitle']."</a>";
        echo "<div id='unit-".$row['unitId']."' class='unit'>";
        echo "<div class='unit-meta'>";
            echo "<p>" . $row['unitLocation'] . "</p>";
            echo "<p>" . $row['unitDescription'] . "</p>";
            echo "</div>";
      $lastUnit = $row['unitId'];
      }

      if($row['lineId']!==$lastLine[0]['lineId']){
        printNote($lastLine);
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

  $printString = $line[0]['content'];
  $noteContent = array();
  foreach($line as $print){
    if(strpos($printString, $print['contentString'])!== false) {
      if($print['noteType']=="readerGloss"){
        $replaceString = "<span id='note-".$print['noteId']."' aria-reader-gloss='".$print['noteContent']."' class='".$print['noteType']."'>".$print['contentString']."</span>";
      }
      if($print['noteType']=="performerGloss"){
        $replaceString = "<span id='note-".$print['noteId']."' aria-performer-gloss='".$print['noteContent']."' class='".$print['noteType']."'>".$print['contentString']."</span>";
      }
      if($print['noteType']=="performerScansion"){
        $replaceString = "<span id='note-".$print['noteId']."' aria-scansion='".$print['scansionAlt']."' class='".$print['noteType']."'>".$print['contentString']."</span>";
        $noteContent[] = "<div class='noteClosed' id='open-note-".$print['noteId']."'>".$print['noteContent']."</div>";
      }
      if($print['noteType']=="studentNote"){
        $replaceString = "<span id='note-".$print['noteId']."' class='".$print['noteType']."'>".$print['contentString']."</span>";
        $noteContent[] = "<div class='noteClosed' id='open-note-".$print['noteId']."'>".$print['noteContent']."</div>";
      }
      $printString = substr_replace($printString, $replaceString, strpos($printString, $print['contentString']), strlen($print['contentString']));
    }
  }
  echo "<div class='line-type'>".$line[0]['lineType']."</div>";
  echo "<div aria-label='editable-text' class='".$line[0]['lineType']."' id='line-".$line[0]['lineId']."'>".$printString . "</div>";
  include "../application/forms/add-new-note.php";
  echo "<button class='add-note-button' id='button-".$line[0]['lineId']."'>Add Note</button>";
  foreach($noteContent as $note){
    echo $note;
  }
}


/*
        echo "<div class='line-type'>".$line[0]['lineType']."</div>";
        echo "<div aria-label='editable-text' class='".$line[0]['lineType']."' id='line-".$line[0]['lineId']."'>".$printString . "</div>";
        include "../application/forms/add-new-note.php";
        echo "<button class='add-note-button' id='button-".$line['lineId']."'>Add Note</button>";

*/

?>
