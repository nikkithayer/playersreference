<div id="add-unit">
  <a href="#" id="add-unit-close">Close</a>
  <form action="partials/insert-new-unit.php" method="post">
    <h1>Insert New Unit</h1>
    <p>
        <label for="act">Act:</label>
        <input type="text" name="act" id="act">
    </p>
    <p>
        <label for="unit">Unit:</label>
        <input type="text" name="unit" id="unit">
    </p>
    <p>
        <label for="unitTitle">Unit Title: (ie (ACT I.i.a 1-19) 19 lines, 1'15"</label>
        <input type="text" name="unitTitle" id="unitTitle">
    </p>
    <p>
        <label for="unitLocation">Unit Location:</label>
        <input type="text" name="unitLocation" id="unitLocation">
    </p>
    <p>
        <label for="unitDescription">Unit Description:</label>
        <input type="text" name="unitDescription" id="unitDescription">
    </p>
    <p>
        <label for="content">Content:</label>
        <textarea name="content" id="content"></textarea>
    </p>
    <p>
        <input type="checkbox" id="sceneBreak" name="sceneBreak" value="1">
        <label for="sceneBreak"> Does this unit end with a scene break?</label><br>
    </p>
    <input type="submit" value="Add New Unit" id="submit-unit">
  </form>
</div>