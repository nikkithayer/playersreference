<?php

// Attempt select query execution
$sql = "SELECT * FROM $playUnits LEFT JOIN $playContents ON $playUnits.unitId = $playContents.unitId LEFT JOIN $playNotes ON $playContents.lineId = $playNotes.lineIdRef ORDER BY $playContents.lineId ASC";
if($result = mysqli_query($link, $sql)){
  if(mysqli_num_rows($result) > 0){
    $lastUnit = "";
    $lastLine = "";
    echo "<div id='edit-text'>";
    while($row = mysqli_fetch_array($result)){

      if($row['unitId']!==$lastUnit){
        if($lastUnit!==""){ 
          echo "</div>";
        }
        echo "<a class='unit-accordion-control' href='unit-".$row['unitId']."'>".$row['act'].", ".$row['unit'].", ".$row['unitTitle']."</a>";
        echo "<div id='unit-".$row['unitId']."' class='unit'>";
        echo "<div class='unit-meta'>";
            echo "<p>" . $row['unitLocation'] . "</p>";
            echo "<p>" . $row['unitDescription'] . "</p>";
            echo "</div>";
      $lastUnit = $row['unitId'];
      }

      if($row['lineId']!==$lastLine){
        echo "<div class='line-type'>".$row['lineType']."</div>";
        echo "<div aria-label='editable-text' class='".$row['lineType']."' id='line-".$row['lineId']."'>".$row['content'] . "</div>";
        include "../application/forms/add-new-note.php";
        echo "<button class='add-note-button' id='button-".$row['lineId']."'>Add Note</button>";
        $lastLine = $row['lineId'];
      }

    }
    mysqli_free_result($result);
  }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);

?>
