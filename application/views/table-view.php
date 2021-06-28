<?php

// Attempt select query execution
$sql = "SELECT * FROM $playUnits LEFT JOIN $playContents ON $playUnits.unitId = $playContents.unitId LEFT JOIN $playNotes ON $playNotes.lineIdRef = $playContents.lineId ORDER BY $playContents.lineId ASC";
if($result = mysqli_query($link, $sql)){
  if(mysqli_num_rows($result) > 0){
echo "<table>";
  echo "<th>unitId</th>";
  echo "<th>position</th>";
  echo "<th>act</th>";
  echo "<th>unit</th>";
  echo "<th>unitTitle</th>";
  echo "<th>unitLocation</th>";
  echo "<th>unitDescription</th>";
  echo "<th>sceneBreak</th>";
  echo "<th>lineId</th>";
  echo "<th>lineNumber</th>";
  echo "<th>lineType</th>";
  echo "<th>lineTags</th>";
  echo "<th>content</th>";
  echo "<th>noteId</th>";
  echo "<th>contentString</th>";
  echo "<th>noteType</th>";
  echo "<th>scansionAlt</th>";
  echo "<th>noteContent</th>";

    while($row = mysqli_fetch_array($result)){
      echo "<tr>";
        echo "<td>".$row["unitId"]."</td>";
        echo "<td>".$row["position"]."</td>";
        echo "<td>".$row["act"]."</td>";
        echo "<td>".$row["unit"]."</td>";
        echo "<td>".$row["unitTitle"]."</td>";
        echo "<td>".$row["unitLocation"]."</td>";
        echo "<td>".$row["unitDescription"]."</td>";
        echo "<td>".$row["sceneBreak"]."</td>";
        echo "<td class='highlight'>".$row["lineId"]."</td>";
        echo "<td>".$row["lineNumber"]."</td>";
        echo "<td>".$row["lineType"] ."</td>";
        echo "<td>".$row["lineTags"] ."</td>";
        echo "<td>".$row["content"]."</td>";
        echo "<td>".$row["noteId"]  ."</td>";
        echo "<td>".$row["contentString"] ."</td>";
        echo "<td>".$row["noteType"] ."</td>";
        echo "<td>".$row["scansionAlt"] ."</td>";
        echo "<td>".$row["noteContent"] ."</td>";
      echo "</tr>";
    }
    mysqli_free_result($result);
  }
echo "</table>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);

/*
["unitId"]=> string(2) "80" 
["position"]=> string(1) "0" 
["act"]=> string(1) "1" 
["unit"]=> string(1) "1" 
["unitTitle"]=> string(4) "test"
["unitLocation"]=> string(4) "test" 
["unitDescription"]=> string(4) "test"
["sceneBreak"]=> string(1) "0" 
[8]=> string(2) "80" 
["lineId"]=> NULL 
["lineNumber"]=> string(1) "0" 
["lineType"]=> string(9) "character" 
["lineTags"]=> string(0) "" 
["content"]=> string(58) "Lorem ipsum dolor sit amet, consectetur adipiscing elit. " 
["noteId"]=> NULL 
[15]=> NULL 
["contentString"]=> NULL 
["noteType"]=> NULL 
["scansionAlt"]=> NULL 
["noteContent"]=> NULL 
*/
?>