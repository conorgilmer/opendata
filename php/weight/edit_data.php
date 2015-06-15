<?php
include_once 'dbMySql.php';
$con = new DB_con();
$table = "myweight";

// data insert code starts here.
if(isset($_GET['edit_id']))
{
$sql=mysql_query("SELECT * FROM $table WHERE id=".$_GET['edit_id']);
 $result=mysql_fetch_array($sql);
}


// data update code starts here.
if(isset($_POST['btn-update']))
{
	$low     = $_POST['low'];
	$high    = $_POST['high'];
	$wdate   = $_POST['wdate'];
	$comment = $_POST['comment'];
	$id      = $_GET['edit_id'];
	
	$res=$con->update($table,$id,$low,$high,$wdate,$comment);
	if($res)
	{
		?>
		<script>
		alert('Record updated...');
        window.location='index.php'
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error updating record...');
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
<title>Weight Monitor</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<?php include('header.php');?>

<div id="body">
	<div id="content">
    <form method="post">
    <table align="center">
  <tr>
    <th><a href="add_data.php">Add Reading</a></th>
    <th><a href="index.php">List</a></th>
    <th><a href="genlines.php">Graph</a></th>
    </tr>


    <tr>
    <td colspan="3"><input type="text" name="low" placeholder="Low" value="<?php echo $result['low'];?>" /></td>
    </tr>
    <tr>
    <td colspan="3"><input type="text" name="high" placeholder="High" value="<?php echo $result['high'];?>"  /></td>
    </tr>
    <tr>
    <td colspan="3"><input type="text" name="wdate" placeholder="Date" value="<?php echo $result['date'];?>"  /></td>
    </tr>
    <tr>
    <td colspan="3"><input type="text" name="comment" placeholder="Comment" value="<?php echo $result['comment'];?>"  /></td>
    </tr>
    <tr>
    <td colspan="3">

    <button type="submit" name="btn-update"><strong>UPDATE</strong></button></td>
    </tr>
    </table>
    </form>
    </div>
</div>

<?php include('footer.php');?>
