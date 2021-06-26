<?php

// Attempt select query execution
$sql_unit = "SELECT * FROM $playUnits";

if($result_unit = mysqli_query($link, $sql_unit)){
    if(mysqli_num_rows($result_unit) > 0){

      echo "<div class='' id='edit-text'>";

        while($row = mysqli_fetch_array($result_unit)){
          echo "<a class='unit-accordion-control' href='unit-".$row['unitId']."'>".$row['act'].", ".$row['unit'].", ".$row['unitTitle']."</a>";
          echo "<div id='unit-".$row['unitId']."' class='unit'>";
          echo "<div class='unit-meta'>";
              echo "<p>" . $row['unitLocation'] . "</p>";
              echo "<p>" . $row['unitDescription'] . "</p>";
              echo "</div>";

              $sql_line = "SELECT * FROM $playContents WHERE unitID=$row[unitId]";
              if($result_line = mysqli_query($link, $sql_line)){
                if(mysqli_num_rows($result_line) > 0){
                  while($row_line = mysqli_fetch_array($result_line)){
                    echo "<div class='line-type'>".$row_line['lineType']."</div>";
                    echo "<div aria-label='editable-text' class='".$row_line['lineType']."' id='line-".$row_line['lineId']."'>".$row_line['content'] . "</div>";
                    include "../application/forms/add-new-note.php";
                    echo "<button class='add-note-button' id='button-".$row_line['lineId']."'>Add Note</button>";
                  }
                  mysqli_free_result($result_line);
                } else{
                    echo "No records matching your query were found.";
                }
              } else{
                  echo "ERROR: Could not able to execute $sql_line. " . mysqli_error($link);
              }
              echo "</div>";
            }
        // Free result set
        mysqli_free_result($result_unit);

        echo "</div>";
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql_unit. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);

?>