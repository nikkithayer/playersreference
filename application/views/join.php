<?php

// Attempt select query execution
$sql = "SELECT * FROM $playUnits LEFT JOIN $playContents ON $playUnits.unitId = $playContents.unitId LEFT JOIN $playNotes ON $playContents.lineId = $playNotes.lineId";
if($result = mysqli_query($link, $sql)){
  if(mysqli_num_rows($result) > 0){
    echo "<table>";
    while($row = mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<td>".$row['unitId']."</td>";
      echo "<td>".$row['act']."</td>";
      echo "<td>".$row['unit']."</td>";
      echo "<td>".$row['unitTitle']."</td>";
      echo "<td>".$row['unitLocation']."</td>";
      echo "<td>".$row['unitDescription']."</td>";
      echo "<td>".$row['sceneBreak']."</td>";
      echo "<td>".$row['lineId']."</td>";
      echo "<td>".$row['lineNumber']."</td>";
      echo "<td>".$row['lineType']."</td>";
      echo "<td>".$row['lineTags']."</td>";
      echo "<td>".$row['content']."</td>";
      echo "<td>".$row['noteId']."</td>";
      echo "<td>".$row['contentString']."</td>";
      echo "<td>".$row['noteType']."</td>";
      echo "<td>".$row['scansionAlt']."</td>";
      echo "<td>".$row['noteContent']."</td>";
      echo "</tr>";
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