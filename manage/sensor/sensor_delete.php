<?php
include('connect.php');
$del="delete from stw_temp_table where id='$_GET[id]'";
//echo $del;
//exit();//จบ
$excute=$db->query($del);// mysql_query($del,$conn);
	if($excute){
		echo"<script>alert('Delete complete');</script>";
		echo"<script>window.location='index.php';</script>";
	}
	else
	{
		echo"<script>alert('Delete uncomplete');</script>";
		echo"<script>window.location='index.php';</script>";
	}

?>