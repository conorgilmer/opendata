<?php
include('config.php');

class DB_con
{
 function __construct()
 {
  $conn = mysql_connect(DB_SERVER,DB_USER,DB_PASS) or die('localhost connection problem'.mysql_error());
  mysql_select_db(DB_NAME, $conn);
 }
 
 public function insert($low,$high,$wdate,$comment)
 {
  $res = mysql_query("INSERT myweight(id, low, high, date,comment) VALUES('','$low','$high','$wdate','$comment')");
  return $res;
 }
 
 public function select()
 {
  $res=mysql_query("SELECT * FROM myweight");
  return $res;
 }
}

?>
