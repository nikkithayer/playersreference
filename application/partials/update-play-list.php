<?php

$lineID = $_REQUEST['lineID'];
$lineType = $_REQUEST['lineType'];

$i = 0;
while($i < count($lineID)){
  $sql = "UPDATE play_contents SET lineType='$lineType[$i]' WHERE lineId=$lineID[$i]";
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