<?php
require_once "../config.php";

$playNotes = $_REQUEST['playNotes'];
$playName = $_REQUEST['playName'];


$sql_add_note = "INSERT INTO $playNotes (lineIdRef, contentString, noteType, scansionAlt, noteContent) VALUES (?, ?, ?, ?, ?)";
 
if($stmt_note = mysqli_prepare($link, $sql_add_note)){
    mysqli_stmt_bind_param($stmt_note, "issss", $lineId, $contentString, $noteType, $scansionAlt, $noteContent);
    
    $lineId = $_REQUEST['playLine'];
    $noteType = $_REQUEST['noteType'];
    $contentString = $_REQUEST['contentString'];
    $scansionAlt = $_REQUEST['scansionAlt'];
    $noteContent = $_REQUEST['noteContent'];

    if(mysqli_stmt_execute($stmt_note)){
//      $lastID = mysqli_insert_id($link);
    } else{
        echo "ERROR: Could not execute query: $sql_add_note. " . mysqli_error($link);
    }
} else{
    echo "ERROR: Could not prepare query: $sql_add_note. " . mysqli_error($link);
}
mysqli_stmt_close($stmt_note);
header("Location: ../../".$playName."/edit.php");

?>