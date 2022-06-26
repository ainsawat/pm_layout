<?php
	//$limittemp=$_GET['Limit'];
	//echo $limittemp;
	//$start_time=$_GET['start_time'];
	//$end_time=$_GET['end_time'];
	//IF($start_time=="") return "";
	include "connect.php";
	include "sqlupdate.php";
	$sysName = substr($_SERVER['QUERY_STRING'], 8);
							
	//open connection to mysql db
	//$connection = mysqli_connect("10.82.209.99","stwhost","stwhost","stw_temp") or die("Error " . mysqli_error($connection));
	//fetch table rows from mysql db
	//$sql =$sql_Chart;
	
	$result_chart =$db->query($sql_Chart);// mysqli_query($connection, $sql_Chart) or die("Error in Selecting " . mysqli_error($connection));
	$emparray = array();
	
	
	
	while($row =$result_chart->fetch())// mysqli_fetch_assoc($result_chart))
	{
		$emparray[] = $row;
	}
	
	//
	
	$db=null;
	echo json_encode($emparray);
	//echo "var chartData = ".json_encode($emparray).";";

?>