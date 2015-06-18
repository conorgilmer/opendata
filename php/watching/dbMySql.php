<?php
require('config.php');

$table = "urllinks";

class DB_con
{
 function __construct()
 {
  $conn = mysql_connect(SERVER,USER,PWD) or die('localhost connection problem'.mysql_error());
  mysql_select_db(DB, $conn);
 }
 
/* public function insert($fname,$lname,$city)
 {
  $res = mysql_query("INSERT $table(first_name,last_name,user_city) VALUES('$fname','$lname','$city')");
  return $res;
 }
 */
 public function select($table)
 {
  $res=mysql_query("SELECT * FROM $table");
  return $res;
 }
}

?>
