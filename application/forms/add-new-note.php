<div class="add-note" id="addNote-<?php echo $line[0]['lineId'];?>">
  <form action="../application/actions/insert-new-note.php" method="post">
    <p>
        <label for="noteType">Note Type:</label>
        <select name="noteType" id="noteType">
          <option value="readerGloss">Reader - Gloss</option>
          <option value="studentNote">Student - Note</option>
          <option value="performerScansion">Performer - Scansion</option>
          <option value="performerGloss">Performer - Gloss</option>
        </select>
    </p>
    <p>
        <label for="linkedText">Linked Text:</label>
        <input type="text" name="contentString" id="contentString">
    </p>
    <p>
        <label for="scansionAlt">Scansion Spelling:</label>
        <input type="text" name="scansionAlt" id="scansionAlt">
    </p>
    <p class="flex2">
        <label for="noteContent">Note contents:</label>
        <textarea name="noteContent" id="noteContent"></textarea>
    </p>

<?php
    echo "<input type='hidden' name='playName' value='".$playName."'>";
    echo "<input type='hidden' name='playNotes' value='".$playNotes."'>";
    echo "<input type='hidden' name='playLine' value='".$line[0]['lineId']."'>";
?>
    <input type="submit" value="Add Line" id="submit-line">
  </form>
</div>