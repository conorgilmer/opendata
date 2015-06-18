<?php
include_once 'dbMySql.php';
include_once 'quandl.php';
$con = new DB_con();
$table = "urllinks";
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
    <th colspan="5"><a href="index.php">List Data</a></th>
    </tr>
    <tr>
    <th>Code</th>
    <th>URL</th>
    <th>Table</th>
    <th>Start</th>
    <th>Last</th>
    <th colspan="3">Actions</th>
    </tr>
    <?php
	while($row=mysql_fetch_row($res))
	{ 
			?>
            <tr>
            <td><?php echo $row[1]; ?></td>
            <td><a href="<?php echo $row[2]. '?&auth_token=xcN1MXUnC_248YofABy-'; ?>">Link</a></td>
            <td><?php echo $row[3]; ?></td>
            <td><?php echo $row[4]; ?></td>
            <td><?php echo $row[5]; ?></td>
            <td><a href="graph.php?table=<?php echo $row[3]; ?>">Graph</a></td>
            <td><a href="up.php?id=<?php echo $row[3]; ?>">Upload</a></td>
            <td><a href="down.php?id=<?php echo $row[3]; ?>">CSV</a></td>
            </tr>
            <?php
	}
	?>
    </table>
    </div>
</div>

<?php include ('footer.php'); ?>
