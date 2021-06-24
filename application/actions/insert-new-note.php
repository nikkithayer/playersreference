<?php

$sql_add_note = "INSERT INTO $playNotes (lineId, contentString, noteType, scansionAlt, noteContent) VALUES (?, ?, ?, ?, ?)";
 
if($stmt_note = mysqli_prepare($link, $sql_add_note)){
    mysqli_stmt_bind_param($stmt_note, "issss", $lineId, $contentString, $noteType, $scansionAlt, $noteContent);
    
    $lineId = 2;
    $contentString = "test string"; 
    $noteType = "fake";
    $scansionAlt = "f-eh-k";
    $noteContent = "this is a fake note";
    
    if(mysqli_stmt_execute($stmt_note)){
//      $lastID = mysqli_insert_id($link);
    } else{
        echo "ERROR: Could not execute query: $sql_add_note. " . mysqli_error($link);
    }
} else{
    echo "ERROR: Could not prepare query: $sql_add_note. " . mysqli_error($link);
}
mysqli_stmt_close($stmt_note);

?>