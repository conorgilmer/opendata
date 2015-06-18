<?php
include_once 'dbMySql.php';
include_once 'quandl.php';
$con = new DB_con();
$table = $_GET['table']; //"urllinks";
$res=$con->select($table);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Watching Data from Quandl</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<?php include('header.php'); ?>
<div id="body">
	<div id="content">
    <table align="center">
    <tr>
    <th colspan="3"><a href="add_code.php">Add Data Code</a></th>
    <th colspan="2"><a href="index.php">List Data</a></th>
    </tr>
    <tr>
    <th>ID</th>
    <th>Date</th>
    <th>Rate</th>
    <th>High</th>
    <th>Low</th>
    </tr>
    <?php
	while($row=mysql_fetch_row($res))
	{ 
			?>
            <tr>
            <td><?php echo $row[0]; ?></td>
            <td><?php echo $row[1]; ?></td>
            <td><?php echo $row[2]; ?></td>
            <td><?php echo $row[3]; ?></td>
            <td><?php echo $row[4]; ?></td>
            </tr>
            <?php
	}
	?>
    </table>
    </div>
</div>

<?php include ('footer.php'); ?>
