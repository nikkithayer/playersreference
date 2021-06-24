<? require_once "../application/config.php"; 
$playUnits = "rj_play_units";
$playContents = "rj_play_contents";
$playNotes = "rj_play_notes";
$playName = "romeo";
?>

<meta http-equiv="content-type" content="text/html; charset=UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Romeo and Juliet</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="../css/reset.css" rel="stylesheet">
      <link href="../css/play/style.css" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic%7CPoppins:400italic,700italic,400,700' rel='stylesheet' type='text/css'>
      <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
      <script>
        var playUnits ="<?php echo $playUnits; ?>";
        var playContents ="<?php echo $playContents; ?>";
        var playName ="<?php echo $playName; ?>";
      </script>
      <script src="../js/edit-actions.js" type="text/javascript"></script>
      <script src="../js/edit-view-actions.js" type="text/javascript"></script>
      <script src="../js/add-unit-actions.js" type="text/javascript"></script>