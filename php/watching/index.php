<?php
include_once 'dbMySql.php';
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
<body>
<center>

<div id="header">
	<div id="content">
    <label>Watching Data from Quandl</label>
    </div>
</div>
<div id="body">
	<div id="content">
    <table align="center">
    <tr>
    <th colspan="3"><a href="add_code.php">Add Data Code</a></th>
    <th colspan="3"><a href="index.php">List Data</a></th>
    </tr>
    <tr>
    <th>Code</th>
    <th>URL</th>
    <th>Table</th>
    <th>Start</th>
    <th>Last</th>
    <th>Action</th>
    </tr>
    <?php
	while($row=mysql_fetch_row($res))
	{ 
			?>
            <tr>
            <td><?php echo $row[1]; ?></td>
            <td><a href="<?php echo $row[0]; ?>">Link</a></td>
            <td><?php echo $row[3]; ?></td>
            <td><?php echo $row[4]; ?></td>
            <td><?php echo $row[5]; ?></td>
            <td><a href="graph.php?id=<?php echo $row[0]; ?>">Graph</a></td>
            </tr>
            <?php
	}
	?>
    </table>
    </div>
</div>

<div id="footer">
	<div id="content">
    <hr /><br/>
    <label>by Conor Gilmer</label>
    </div>
</div>

</center>
</body>
</html>