<?php
	//echo $_GET['id'];
	include("connect.php");
	$sql="Select * from stw_temp_table where id='$_GET[id]'";
	$run =$db->query($sql);// mysql_query($sql,$conn);
	$data=$run->fetch();// mysql_fetch_array($run);
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
	<script>
		function cancel(){
			var c=confirm("คุณต้องการยกเลิกการแก้ไขใช่หรือไม่");
			if(!c){
				return false;
			}
			window.location='index.php';
		}
	</script>
<body>
<a href="index.php">Show all list</a>|<a href="sensor_save_form.php">Add sensor</a>|<a href="sensor_search_form.php">Search</a>
<form action="sensor_update.php" method="post" name="form1" id="form1">
  <table  border="1" align="center">
    <tbody>
      <tr>
        <td colspan="2" align="center" valign="middle" bgcolor="#F86C6E" style="color: #F4F4F4; font-style: oblique; font-weight: bold;">Update Sensor information</td>
		
      </tr>
      
      
	  <tr>
        <td>Sensor ID</td>
        <td><input name="id" type="hidden" id="id" value="<?php echo($data['id']) ?>"><input type="text" name="sensor_id" id="sensor_id" value="<?php echo($data['sensor_id']) ?>"></td>
      </tr>
      <tr>
        <td>Sensor Area</td>
        <td><input type="text" name="area_name" id="area_name" value="<?php echo($data['area_name']) ?>"></td>
      </tr>
      
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="button" id="button" value="Update">
          <input type="button" name="button2" id="button2" value="Cancel" onClick="window.location='index.php'";></td>
      </tr>
    </tbody>
  </table>
</form>
</body>
</html>
