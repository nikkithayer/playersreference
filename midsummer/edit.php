<!DOCTYPE html>
<html lang="en">
   <head>
   <?php include 'header.php'; ?>
   </head>
    <body>
      <header>
        <button id="show-add-unit">Add Unit</button>
        <button id="save-text-changes">Save Edits</button>
        <div id="text-change-alert">Watch this space</div>
      </header>
      <div class="container" id="text">
        <?php @include "partials/edit-play-list.php" ?>
      </div>

      <?php @include "forms/add-new-unit.php" ?>

   </body>
</html>