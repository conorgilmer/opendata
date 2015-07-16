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

<script type="text/javascript">
function del_id(id)
{
 if(confirm('Sure to delete this record ?'))
 {
  window.location='delete_data.php?delete_id='+id
 }
}
function edit_id(id)
{
 if(confirm('Sure to edit this record ?'))
 {
  window.location='edit_data.php?edit_id='+id
 }
}
</script>

</head>

<?php include('header.php');  ?>

<div id="body">
	<div id="content">
    <table align="center">
    <tr>
    <th colspan="2"><a href="add_data.php">Add Reading</a></th>
    <th colspan="2"><a href="index.php">List Readings</a></th>
    <th colspan="2"><a href="genlines.php">Graph</a></th>
    </tr>
    <tr>
    <th>Date</th>
    <th>Low</th>
    <th>High</th>
    <th>Comment</th>
    <th colspan="2">Actions</th>
    </tr>
    <?php
	while($row=mysql_fetch_row($res))
	{
			?>
            <tr>
            <td><?php echo $row[3]; ?></td>
            <td><?php echo $row[1]; ?></td>
            <td><?php echo $row[2]; ?></td>
            <td><?php echo $row[4]; ?></td>
 <td align="center"><a href="javascript:edit_id(<?php echo $row[0]; ?>)"><img src="edit.png" width="40" height="40" alt="EDIT" /></a></td>
            <td align="center"><a href="javascript:del_id(<?php echo $row[0]; ?>)"><img src="delete.png" width="40" height="40" alt="DELETE" /></a></td>
       
            </tr>
            <?php
	}
	?>
    </table>
    </div>
</div>

<?php include('footer.php');  ?>
