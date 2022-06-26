<?php
//$lastDayOfWeek=$day_minus['LastDay_13'];
//$StartDay =$start_time;//$day_minus['LastDay_6'];//date("Y-m-d",strtotime("today - 30 day"));
//$EndDay=$end_time;//$day_minus['LastDay'];
//$EndDay =date("Y-m-d",strtotime("$EndDay + 1 day")); ;//date("Y-m-d",strtotime("today"));
//echo $EndDay;
//$connection = mysqli_connect("10.82.209.99","stwhost","stwhost","stw_temp") or die("Error " . mysqli_error($connection));
//Limit Temp							
/* $sql_Chart = "SELECT area_group, (stw_temp_table.area_name)as area_name, (stw_temp_table.sensor_id)as sensor_id, Temp, (stw_temp_area.iTime)as iTime FROM stw_temp_table LEFT JOIN stw_temp_area ON stw_temp_table.sensor_id = stw_temp_area.sensor LEFT JOIN stw_temp_layout ON stw_temp_layout.area_name = stw_temp_table.area_name WHERE `Temp` > 25 AND `iTime` > DATE_SUB(NOW(), INTERVAL 10 MINUTE) Order by `area_name` asc"; */
///All Temp update
//$sql_Chart = "SELECT area_group, (stw_temp_table.area_name)as area_name, (stw_temp_table.sensor_id)as sensor_id, Temp, (stw_temp_area.iTime)as iTime FROM stw_temp_table LEFT JOIN stw_temp_area ON stw_temp_table.sensor_id = stw_temp_area.sensor LEFT JOIN stw_temp_layout ON stw_temp_layout.area_name = stw_temp_table.area_name WHERE `iTime` > DATE_SUB(NOW(), INTERVAL 10 MINUTE) Order by `area_name` asc";

//$sql_Chart = "SELECT area_group, (stw_temp_table.area_name)as area_name, (stw_temp_table.sensor_id)as sensor_id, ROUND(Temp, 2)as Temp, (stw_temp_area.iTime)as iTime FROM stw_temp_table LEFT JOIN stw_temp_area ON stw_temp_table.sensor_id = stw_temp_area.sensor LEFT JOIN stw_temp_layout ON stw_temp_layout.area_name = stw_temp_table.area_name WHERE `iTime` > DATE_SUB(NOW(), INTERVAL 599 Second) Order by iTime asc ,`area_name` asc";

//$sql_Chart = "SELECT `TesterID`,`MC_Asset_No`,`MC_Asset_Name`  FROM `man_tester` WHERE `MC_Asset_No` IS NOT NULL";					
//$sql_Chart = "SELECT `TesterID`, `MC_Asset_No` FROM `man_tester_view` ";	
$sql_Chart = "SELECT pm_alert.`TesterID`,pm_alert.`Status`, testerInfo.`IP`, testerInfo.`model`, testerInfo.`MC_Asset_No`, testerInfo.`MC_Type` FROM ( SELECT * FROM `pm_alert` ) pm_alert LEFT JOIN( SELECT * FROM man_tester_view ) testerInfo ON pm_alert.`TesterID` = testerInfo.`TesterID`";	

		
/* //$query_ecc = "Select * FROM `stw_temp_table` Order by `area_name` asc";
$result_ecc = mysqli_query($connection, $query_ecc) or die("Error in Selecting " . mysqli_error($connection));
					
$x=0;
$emparray = array();
while($row =mysqli_fetch_assoc($result_ecc))
{
	$ecc_array[] = $row;
	$x=$x+1;
}
//echo json_encode($ecc_array);
$maxData = count($ecc_array);

	//foreach ($ecc_array as $key => $value) {
	    //echo "$key = $value\n";
	//}
	//$maxData = count($ecc_array);
	//echo $maxData;
	$sql_Chart = "SELECT P.`iTime` as 'Time',";
	
	
	for ($x = 0; $x < $maxData; $x++) {
		$data=$ecc_array[$x];
		$area_group=$data['area_group'];
		$area_name=	$data['area_name'];
		$sensor_id=	$data['sensor_id'];
		
		if($x != ($maxData-1))
		{
			$sql_Chart = $sql_Chart."SUM(CASE WHEN P.`sensor` ='".$sensor_id."' THEN  ROUND(P.`temp`, 2) END ) AS '".$area_group."_".$area_name."',";
		}
		else
		{
			$sql_Chart = $sql_Chart."SUM(CASE WHEN P.`sensor` ='".$sensor_id."' THEN  ROUND(P.`temp`, 2) END ) AS '".$area_group."_".$area_name."'";
		}
	} 
	
	$sql_Chart = $sql_Chart."

 FROM `stw_temp_area` P
WHERE  `iTime` BETWEEN DATE_SUB(NOW() , INTERVAL 10 MINUTE)AND NOW() AND Temp > 25
GROUP BY P.`iTime` asc" ;
//WHERE  `iTime` BETWEEN DATE_SUB(NOW() , INTERVAL 15 MINUTE)AND NOW()
//WHERE `iTime` BETWEEN '2017-05-23 16:00:00.000000' AND '2017-05-23 16:46:00.000000'
	//echo "<br>". $sql_Chart."<br>"; */
?>