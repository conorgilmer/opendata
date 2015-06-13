<?php
include_once 'dbMySql.php';
$con = new DB_con();
$table = "myweight";
$res=$con->select($table);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Weight</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>

<div id="header">
	<div id="content">
    <label>Weight Monitor</label>
    </div>
</div>
<div id="body">
	<div id="content">
    <table align="center">
    <tr>
    <th colspan="4"><a href="add_data.php">add weight reading...</a></th>
    </tr>
    <tr>
    <th>Date</th>
    <th>Low</th>
    <th>High</th>
    <th>Comment</th>
    </tr>
    <?php
	while($row=mysql_fetch_row($res))
	{
			?>
            <tr>
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

<div id="footer">
	<div id="content">
    <hr /><br/>
    <label>No Copyright: <a href="http://www.conorgilmer.com">conorgilmer.com</a></label>
    </div>
</div>

</center>
</body>
</html>
