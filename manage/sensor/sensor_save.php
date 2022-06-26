<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	echo"name:".$_POST['sensor_id']."<br>";
	echo"surname:".$_POST['area_name']."<br>";
	
	
	include("connect.php");
	$sql="INSERT INTO `stw_temp_table` (`sensor_id`, `area_name`) VALUES ( '$_POST[sensor_id]', '$_POST[area_name]');";
	//echo $sql;
	$run=$db->query($sql);// mysql_query($sql,$conn); //ตรวจสอบผล or die("Error")
	if($run)
	{
		echo"<script>alert('Insert complete');</script>";
		echo"<script>window.location='index.php';</script>";
	}else
	{
		echo"<script>alert('Insert fail');</script>";
		echo"<script>window.location='index.php';</script>";
	}
	
	
	
	?>

</body>
</html>
