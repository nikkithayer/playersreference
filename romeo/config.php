<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'mysql.playersreference.com');
define('DB_USERNAME', 'playersref_user1');
define('DB_PASSWORD', 'testpassword123');
define('DB_NAME', 'midsummer_contents');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

global $playUnits;
global $playContents;
$playUnits = "rj_play_units";
$playContents = "rj_play_contents";

?>