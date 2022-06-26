<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<a href="index.php">Show all list</a>|<a href="sensor_save_form.php">Add sensor</a>
 
<form action="sensor_search.php" method="post" name="form1" id="form1">
  <table  border="1" align="center">
    <tbody>
      <tr>
        <td colspan="2" align="center" valign="middle" bgcolor="#F86C6E" style="color: #F4F4F4; font-style: oblique; font-weight: bold;">Search function</td>
      </tr>
      <tr>
        <td>Sensor ID</td>
        <td><input type="text" name="sensor_id" id="sensor_id"></td>
      </tr>
      <tr>
        <td>Sensor Area</td>
        <td><input type="text" name="area_name" id="area_name"></td>
      </tr>
      
      <tr>
        <td colspan="2" align="center"><input type="submit" name="button" id="button" value="Search">
          <input type="reset" name="button2" id="button2" value="Reset" onClick="window.location='index.php'";></td>
      </tr>
    </tbody>
  </table>
</form>
</body>
</html>
