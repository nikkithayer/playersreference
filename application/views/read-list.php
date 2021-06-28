<?php

// Attempt select query execution
$sql = "SELECT * FROM $playUnits LEFT JOIN $playContents ON $playUnits.unitId = $playContents.unitId LEFT JOIN $playNotes ON $playContents.lineId = $playNotes.lineIdRef ORDER BY $playContents.lineId ASC";
if($result = mysqli_query($link, $sql)){
  if(mysqli_num_rows($result) > 0){
    $lastAct = "";
    $lastUnit = "";
    $lastLine = array();
    $lineArray = array();
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

      if($row['lineId']!==$lastLine['lineId']){
        echo "new line".$row['content']."<br>";
      }else{
        //add to array
        echo "repeat line".$row['content']."<br>";
      }
      $lastLine = $row;

    }
    mysqli_free_result($result);
  }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);



//take all notes and order by string position
//if two notes have the same string position, start with the one with the longer string length
// if the content string for a note exists
// take the contents of the previous line and break them into an array
// then wrap the contents of the matched string in the right tag
// then convert the array back into a string

?>