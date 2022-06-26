<?php
	include("connect.php");
	$up="update stw_temp_table 
	set 
	sensor_id='$_POST[sensor_id]',
	area_name='$_POST[area_name]'
	
	where id='$_POST[id]'
	
	";
	//echo $up;
//exit();//จบ
	$run=$db->query($up);// mysql_query($up,$conn);
	if($run){
		echo"<script>alert('Update complete');</script>";
		echo"<script>window.location='index.php';</script>";
	}
	else
	{
		echo"<script>alert('Can't update');</script>";
		echo"<script>window.location='index.php';</script>";
	}
	
?>