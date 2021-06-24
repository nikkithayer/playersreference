<div id="add-note">
  <form action="../application/actions/insert-new-note.php" method="post">
    <p>
        <label for="noteType">Note Type:</label>
        <select name="noteType" id="noteType">
          <option value="readerGloss">Reader - Gloss</option>
          <option value="studentNote">Student - Note</option>
          <option value="performerScanson">Performer - Scansion</option>
          <option value="performerGloss">Performer - Gloss</option>
        </select>
    </p>
    <p>
        <label for="linkedText">Linked Text:</label>
        <input type="text" name="linkedText" id="linkedText">
    </p>
    <p>
        <label for="scansionAlt">Scansion Spelling:</label>
        <input type="text" name="scansionAlt" id="scansionAlt">
    </p>
    <p>
        <label for="noteContents">Note contents:</label>
        <textarea name="content" id="content"></textarea>
    </p>

<?php
    echo "<input type='hidden' name='playUnits' value='".$playUnits."'>";
    echo "<input type='hidden' name='playContents' value='".$playContents."'>";
    echo "<input type='hidden' name='playName' value='".$playName."'>";
?>
    <input type="submit" value="Add Line" id="submit-line">
  </form>
</div>