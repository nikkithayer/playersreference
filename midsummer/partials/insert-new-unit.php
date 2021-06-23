<?php
require_once "../config.php";

$sql_add_unit = "INSERT INTO $playUnits (act, unit, unitTitle, unitLocation, unitDescription, sceneBreak) VALUES (?, ?, ?, ?, ?, ?)";
 
if($stmt_unit = mysqli_prepare($link, $sql_add_unit)){
    mysqli_stmt_bind_param($stmt_unit, "sssssi", $act, $unit, $unitTitle, $unitLocation, $unitDescription, $sceneBreak);
    
    // Set parameters
    $act = $_REQUEST['act'];
    $unit = $_REQUEST['unit'];
    $unitTitle = $_REQUEST['unitTitle'];
    $unitLocation = $_REQUEST['unitLocation'];
    $unitDescription = $_REQUEST['unitDescription'];

    if(isset($_REQUEST['sceneBreak'])){
      $sceneBreak =1;
    }
    else{
      $sceneBreak=0;
    }

    if(mysqli_stmt_execute($stmt_unit)){
      $lastID = mysqli_insert_id($link);
    } else{
        echo "ERROR: Could not execute query: $sql_add_unit. " . mysqli_error($link);
    }
} else{
    echo "ERROR: Could not prepare query: $sql_add_unit. " . mysqli_error($link);
}
mysqli_stmt_close($stmt_unit);


$sql_line = "INSERT INTO $playContents (unitId, lineType, content) VALUES (?, ?, ?)";
$lineType = "line";
$content = explode("\n", $_REQUEST["content"]);
  for ($i = 0; $i < count($content); $i++) {

  if($stmt_line = mysqli_prepare($link, $sql_line)){

    mysqli_stmt_bind_param($stmt_line, "iss", $lastID, $lineType, $content[$i]);

    if(mysqli_stmt_execute($stmt_line)){
    } else{
        echo "ERROR: Could not execute query: $sql_line. " . mysqli_error($link);
    }
  } else{
    echo "ERROR: Could not prepare query: $sql_line. " . mysqli_error($link);
  }

  mysqli_stmt_close($stmt_line);
}

// Close connection
mysqli_close($link);
header("Location: ../edit.php");


?>