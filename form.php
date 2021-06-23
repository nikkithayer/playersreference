<?php

$mailTo = "kurt.daw@gmail.com";
$sendAddress = "response-form@kurtdaw.com";
$mailFrom = $_POST['emailFrom'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$university = $_POST['university'];
$subject = "test";
$mailcopyfile = "incoming.txt";

$fp = fopen($mailcopyfile, "a"); 
fputs($fp, "\nName:  ".$firstName." ".$lastName."\nEmail:  ".$mailFrom."\nUniversity/Company: ".$university."\n----------" );
fclose($fp);

mail($mailTo, "Experiential Shakespeare lead: ".$subject,"Name:  ".$firstName." ".$lastName."\nEmail: ".$mailFrom."\nUniversity: ".$university, "From: ".$sendAddress);

?>