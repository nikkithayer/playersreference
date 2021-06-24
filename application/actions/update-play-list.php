<?php
require_once "../config.php";

$lineID = $_REQUEST['lineID'];
$lineType = $_REQUEST['lineType'];
$playContents = $_REQUEST['playContents'];
$playUnits = $_REQUEST['playUnits'];
$playName = $_REQUEST['playName'];

$i = 0;
while($i < count($lineID)){
  $sql = "UPDATE $playContents SET lineType='$lineType[$i]' WHERE lineId=$lineID[$i]";
  if(mysqli_query($link, $sql)){
      echo "Records were updated successfully.";
  } else {
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  }
  $i++;
}

// Close connection
mysqli_close($link);
?>