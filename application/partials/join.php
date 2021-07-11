<?php

// Attempt select query execution
$sql = "SELECT * FROM $playUnits LEFT JOIN $playContents ON $playUnits.unitId = $playContents.unitId LEFT JOIN $playNotes ON $playContents.lineId = $playNotes.lineId";
if($result = mysqli_query($link, $sql)){
  if(mysqli_num_rows($result) > 0){
    $lastAct = "";
    $lastUnit = "";
    $lastLine = "";
    while($row = mysqli_fetch_array($result)){
      if($row['act']!=$lastAct){
        echo "<h1>" . $row['act'] . "</h1>";
        $lastAct = $row['act'];
      }

      if($row['unitId']!=$lastUnit){
        echo "<div class='unit-meta'>";
        echo "<h2>" . $row['unit'] . " " . $row['unitTitle'] . "</h2>";
        echo "<h3>" . $row['unitLocation'] . "</h3>";
        echo "<h3>" . $row['unitDescription'] . "</h3>";
 //       echo $row['sceneBreak'];
        echo "</div>";
        $lastUnit = $row['unitId'];
      }

      if($row['content']!=$lastLine){
        echo "<div class='".$row['lineType']."' id='line-".$row['lineId']."'>".$row['content'] . "</div>";
//        echo $row['lineTags'];
        $lastLine = $row['content'];
      }

      if($row['contentString']!=""){
        echo $row['contentString'];
        echo "<br>";
        echo $row['noteType'];
        echo "<br>";
        echo $row['scansionAlt'];
        echo "<br>";
        echo $row['noteContent'];
        echo "<br>";      
      }

    }
    mysqli_free_result($result);
    echo "</table>";
  }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);

?>