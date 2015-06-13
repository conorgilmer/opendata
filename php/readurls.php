<?php
define('DB_SERVER', "localhost");
define('DB_USER', "root");
define('DB_PASSWORD', "");
define('DB_TABLE', "opendata");

$conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_TABLE);

if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}

$query = "SELECT id, code, url, tblname, source, first, last, enable FROM `urllinks`";
$result = $conn->query($query);
 
if($result === false) {
  trigger_error('Wrong SQL: ' . $query . ' Error: ' . $conn->error, E_USER_ERROR);
} else {
	$result->data_seek(0);
	while($row = $result->fetch_assoc()){
	    echo  $row['id']. ' | '. $row['code'] .' | '.$row['url'] . ' | '. $row['source']. ' | '. $row['first']. ' | '. $row['last']. '<br>';
	}  
}

$result->free();
$conn->close();

?>
