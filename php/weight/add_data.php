<?php
include_once 'dbMySql.php';
$con = new DB_con();

// data insert code starts here.
if(isset($_POST['btn-save']))
{
	$low = $_POST['low'];
	$high = $_POST['high'];
	$wdate = $_POST['wdate'];
	$comment = $_POST['comment'];
	
	$res=$con->insert($low,$high,$wdate,$comment);
	if($res)
	{
		?>
		<script>
		alert('Record inserted...');
        window.location='index.php'
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error inserting record...');
        window.location='index.php'
        </script>
		<?php
	}
}
// data insert code ends here.

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP Data Insert and Select Data</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>

<div id="header">
	<div id="content">
    <label>PHP Data Insert and Select Data </label>
    </div>
</div>
<div id="body">
	<div id="content">
    <form method="post">
    <table align="center">
    <tr>
    <td><input type="text" name="low" placeholder="Low" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="high" placeholder="High" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="wdate" placeholder="Date" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="comment" placeholder="Comment" required /></td>
    </tr>
    <tr>
    <td>
    <button type="submit" name="btn-save"><strong>SAVE</strong></button></td>
    </tr>
    </table>
    </form>
    </div>
</div>

</center>
</body>
</html>
