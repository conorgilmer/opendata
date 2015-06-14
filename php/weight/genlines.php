<?php

   include('config.php');

    $db =  mysql_connect(DB_SERVER,DB_USER,DB_PASS);
    mysql_select_db(DB_NAME);    
	
// The Chart table contain two fields: Date and PercentageChange
$queryData = mysql_query("
  SELECT	low,
                high,
		date as thedate
        FROM myweight");


$table = array();
$table['cols'] = array(
    array('label' => 'Date', 'type' => 'string'),
    array('label' => 'Low', 'type' => 'number'),
    array('label' => 'High', 'type' => 'number')
);
//First Series
$rows = array();
while($r = mysql_fetch_assoc($queryData)) {
	$temp = array();
	// the following line will used to slice the Pie chart
	$temp[] = array('v' => (string) $r['thedate']); 

	//Values of the each slice
	$temp[] = array('v' => (float) ( $r['low'])); 
	$temp[] = array('v' => (float) (($r['high']))); 
	$rows[] = array('c' => $temp);
}

$table['rows'] = $rows;
$jsonTable = json_encode($table);

//echo $jsonTable;

?>

<html>
  <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Weight</title>
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
          title: 'My Weight',
          width: 800,
          height: 600,
 	  vAxis: {title: "Weight (Kilos)"},
          hAxis: {title: "Dates"}
        };
      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
    </script>
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
    <th colspan="2"><a href="add_data.php">Add Reading</a></th>
    <th colspan="2"><a href="index.php">List</a></th>
    <th colspan="2"><a href="genlines.php">Graph</a></th>
    </tr>
<tr><td colspan="6">

    <div id="chart_div"></div>
</td></tr>
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




