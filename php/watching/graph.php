<?php

   include('config.php');
   $tablename = $_GET['table'];

    $db =  mysql_connect(SERVER,USER,PWD);
    mysql_select_db(DB);    
	
// The Chart table contain 4 fields: Date and Rate, High and Low
$queryData = mysql_query("
  SELECT date as thedate,
	rate,
	high,
	low
        FROM $tablename ORDER BY date ASC"  );


$table = array();
$table['cols'] = array(
    array('label' => 'Date', 'type' => 'string'),
    array('label' => 'Rate', 'type' => 'number'),
    array('label' => 'High', 'type' => 'number'),
    array('label' => 'Low', 'type' => 'number')
);
//First Series
$rows = array();
while($r = mysql_fetch_assoc($queryData)) {
//print_r($r);
	$temp = array();
	// the following line will used to slice the Pie chart
	$temp[] = array('v' => (string) $r['thedate']); 

	//Values of the each slice
	$temp[] = array('v' => (float) ( $r['high'])); 
	$temp[] = array('v' => (float) ( $r['rate'])); 
	$temp[] = array('v' => (float) ( $r['low'])); 
	$rows[] = array('c' => $temp);
}

$table['rows'] = $rows;
$jsonTable = json_encode($table);

//echo $jsonTable;

?>

<html>
  <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $tablename; ?></title>
<link rel="stylesheet" href="style.css" type="text/css" />


    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">

    // Load the Visualization API and the chart package.
    google.load('visualization', '1', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    function drawChart() {

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(<?=$jsonTable?>);
      var options = {
          title: '<?php echo $tablename; ?>',
          width: 800,
          height: 600,
 	  vAxis: {title: "Price"},
          hAxis: {title: "Dates"}
        };
      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
    </script>
  </head>

<?php include('header.php'); ?>

<div id="body">
        <div id="content">
<table align="center">
    <tr>
    <th colspan="6"><a href="index.php">List</a></th>
    </tr>
<tr><td colspan="6">

    <div id="chart_div"></div>
</td></tr>
</table>
</div>
</div>



<?php include('footer.php'); ?>


