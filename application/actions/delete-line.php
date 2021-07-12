<?php
require_once "../config.php";

$playContents = $_REQUEST['playContents'];
$playNotes = $_REQUEST['playNotes'];
$lineId = $_REQUEST['lineID'];

$sql_line = "DELETE FROM $playContents WHERE lineId=$lineId";
if(mysqli_query($link, $sql_line)){
    echo "Records were deleted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql_line. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);


// Attempt delete query execution
$sql_note = "DELETE FROM $playNotes WHERE lineIdRef=$lineId";
if(mysqli_query($link, $sql_note)){
    echo "Records were deleted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql_note. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
header("Location: ../../".$playName."/edit.php");
?>