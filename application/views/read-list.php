<?php

// Attempt select query execution
$sql = "SELECT * FROM $playUnits LEFT JOIN $playContents ON $playUnits.unitId = $playContents.unitId LEFT JOIN $playNotes ON $playContents.lineId = $playNotes.lineId";
if($result = mysqli_query($link, $sql)){
  if(mysqli_num_rows($result) > 0){
    $lastAct = "";
    $lastUnit = "";
    $lastLine = "";
    $notesArray = array();
    while($row = mysqli_fetch_array($result)){
      if($row['act']!=$lastAct){
        echo "<h1>" . $row['act'] . "</h1>";
        $lastAct = $row['act'];
      }

      if($row['unitId']!==$lastUnit){
        echo "<div class='unit-meta'>";
        echo "<h2>" . $row['unit'] . " " . $row['unitTitle'] . "</h2>";
        echo "<h3>" . $row['unitLocation'] . "</h3>";
        echo "<h3>" . $row['unitDescription'] . "</h3>";
 //       echo $row['sceneBreak'];
        echo "</div>";
        $lastUnit = $row['unitId'];
      }

// here's a line that's different from the last line
      if($row['content']!==$lastLine){
// print the last line with all the modifications, then
        echo $lastLine;
        foreach($notesArray as $test){
          echo $test."<br>";
        }
        unset($notesArray);
// does it have a note? no - don't do anything and it will print in the next cycle
// does it have a note? yes - tight, add the note to a new array
        if($row['contentString']!==""){
          $notesArray[] = $row['contentString'];
        }
// here's a line that's the same
      }else{
// ah neat, it has a note then. add the note to the array
        $notesArray[] = $row['contentString'];
      }
      $lastLine = $row['content'];

/*
//        echo "<div class='".$row['lineType']." ".$row['lineTags']."' id='line-".$row['lineId']."'>".$row['content'] . "</div>";
      if($row['contentString']!==""){
        addNotes($row['content'],$row['contentString']);
        echo $row['contentString'];
        echo "<br>";
        echo $row['noteType'];
        echo "<br>";
        echo $row['scansionAlt'];
        echo "<br>";
        echo $row['noteContent'];
        echo "<br>";      
      }
*/
    }
    mysqli_free_result($result);
    echo "</table>";
  }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);

function addNotes($line, $string){
  if (strpos($line, $string)!== false) {
    //break into array at string position and string position + string length
    echo strpos($line, $string);
    echo strlen($string);
  }
}

//take all notes and order by string position
//if two notes have the same string position, start with the one with the longer string length
// if the content string for a note exists
// take the contents of the previous line and break them into an array
// then wrap the contents of the matched string in the right tag
// then convert the array back into a string

?>
