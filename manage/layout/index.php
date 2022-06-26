<html>
<head>
<title>STW Temperature Layout</title>
</head>
<body>
<form action="phpCSVMySQLUpload.php" method="post" enctype="multipart/form-data" name="form1">
  <table border="1" align="center">
    <tbody>
      <tr>
        <td colspan="2" align="center" valign="middle" bgcolor="green" style="color: #F4F4F4; font-style: oblique; font-weight: bold;">Import Layout by csv file</td>
      </tr>
      <tr>
        <td>CSV File</td>
        <td><input name="fileCSV" type="file" id="fileCSV"></td>
      </tr>
      <tr>
        <td>Area Name</td>
        <td><input type="text" name="area_name" id="area_name"></td>
      </tr>
      <tr>
        <td>Update by</td>
        <td><input type="text" name="up_by" id="up_by"></td>
      </tr>
      <tr>
        <td colspan="2"  align ='center'><input name="btnSubmit" type="submit" id="btnSubmit" value="Import csv"></td>
      </tr>
    </tbody>
  </table>
  
  
</form>
<form action="delete_layout.php" method="post" enctype="multipart/form-data" name="form1" onSubmit="if(!confirm('Do you want to delete area name?')){return false;}" >
	<table  border="1" align="center">
    <tbody>
      <tr>
        <td colspan="2" align="center" valign="middle" bgcolor="#F86C6E" style="color: #F4F4F4; font-style: oblique; font-weight: bold;">Delete Area name</td>
      </tr>
      <tr>
        <td>Area Name</td>
        <td><?PHP include("connect.php"); ?>
				
					<select name="stw_temp_area" id="stw_temp_area"size=1 >
						<?php
						//echo "<option value='ALL'>ALL</option>";
						$query = "Select distinct(`area_group`) FROM `stw_temp_layout`";
						//echo $query;
						$result =$db->query($query);// mysql_query($query);
						if(!$result){
							//die("Error".explode(",", $db->errorInfo()));
							echo"<script>alert('".explode(",", $db->errorInfo())."');</script>";
						}
						while($ri =$result->fetch())// mysql_fetch_array($result))
						{
							echo "<option value=" .$ri['area_group'] . ">" . $ri['area_group'] . "</option>";
						}
						echo "</select> ";
						?></td>
      </tr>
      
      <tr>
        <td colspan="2" align ='center'><input name="btnSubmitdel" type="submit" id="btnSubmitdel" value="Delete Area"></td>
      </tr>
    </tbody>
  </table>
				<br>
	
</form>

</body>
</html>