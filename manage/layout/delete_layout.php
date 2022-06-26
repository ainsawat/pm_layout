<html>
<head>
<title>ThaiCreate.Com PHP & CSV To MySQL</title>
</head>
<body>
<?php
if($_POST['stw_temp_area']=="" )
{
	echo"<script>alert('กรุณาใส่ข้อมูลให้ครบถ้วน');</script>";
	echo"<script>window.location='index.php';</script>";
	exit();
	
}
	include "connect.php";

$SQL="DELETE FROM `stw_temp_layout` WHERE `area_group`='".$_POST['stw_temp_area']."';";
$excute=$db->query($SQL);// mysql_query($del,$conn);
	if($excute){
		echo"<script>alert('Delete complete');</script>";
		echo"<script>window.location='index.php';</script>";
	}
	else
	{
		echo"<script>alert('Delete uncomplete');</script>";
		echo"<script>window.location='index.php';</script>";
	}
	$db=null;
?>
</table>
</body>
</html>