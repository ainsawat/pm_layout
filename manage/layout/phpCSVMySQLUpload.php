<html>
<head>
<title>ThaiCreate.Com PHP & CSV To MySQL</title>
</head>
<body>
<?php
if($_POST['area_name']=="" || $_POST['up_by']=="" || $_FILES["fileCSV"]["name"]=="")
{
	echo"<script>alert('กรุณาใส่ข้อมูลให้ครบถ้วน');</script>";
	echo"<script>window.location='index.php';</script>";
	exit();
	
}
move_uploaded_file($_FILES["fileCSV"]["tmp_name"],$_FILES["fileCSV"]["name"]); // Copy/Upload CSV
include "connect.php";

$SQL="DELETE FROM `stw_temp_layout` WHERE `area_group`='".$_POST["area_name"]."';";
$db->query($SQL);// mysql_query($SQL);
$objCSV = fopen($_FILES["fileCSV"]["name"], "r");
while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
	$strSQL = "INSERT INTO stw_temp_layout ";
	$strSQL .="(area_group,area_name,irow,icol,up_by) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$_POST['area_name']."','".$objArr[0]."','".$objArr[1]."' ";
	$strSQL .=",'".$objArr[2]."','".$_POST['up_by']."'); ";
	//echo $strSQL;
	$objQuery =$db->query($strSQL);// mysql_query($strSQL);
}
fclose($objCSV);
unlink($_FILES["fileCSV"]["name"]);
echo"<script>alert('Import Layout complete');</script>";
echo"<script>window.location='index.php';</script>";
$db=null;
?>
</table>
</body>
</html>