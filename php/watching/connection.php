<?php
include('config.php');
$db = mysql_connect(SERVER, USER, PWD) or die("Could not connect.");

if(!$db) 

	die("no db");

if(!mysql_select_db(DB,$db))

 	die("No database selected.");
?>
