<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
	<?php
		include("format_table.css");
	?>
	<script>
		function delete_Confirm(id){
			var C =confirm("Are you sure delete?");
			if(!C){
				return false;
			}
			window.location='sensor_delete.php?id='+id;
		}
		
	</script>
<body > 
	<a href="sensor_save_form.php">Add sensor</a>|<a href="sensor_search_form.php">Search</a>
	
<?php
	include("connect.php");
	$sql="SELECT * FROM `stw_temp_table`";
	$run =$db->query($sql);// mysql_query($sql,$conn);
	$row=$run->rowCount();// mysql_num_rows($run);
	//echo "Row:" .$row;
	
?>
	<H3 align="center"> STW Temperature table</H3>
	<table border="5" align="center">
		<thead>
			<tr>
				<th>ID</th>  <!-- <th> ระบุเป็นคอลัมน์-->
				
				<th>Sensor ID</th>  <!-- <th> ระบุเป็นคอลัมน์-->
				<th>Sensor Area</th>  <!-- <th> ระบุเป็นคอลัมน์-->
				<th>Update Time</th>  <!-- <th> ระบุเป็นคอลัมน์-->
				<th>Edit</th>  <!-- <th> ระบุเป็นคอลัมน์-->
				<th>Delete</th>  <!-- <th> ระบุเป็นคอลัมน์-->
				
			</tr>
		</thead>
		<tbody>
			<?php
				for($i=1;$i<=$row;$i++){
					$data=$run->fetch();// mysql_fetch_array($run);
					
					echo "<tr>";
					echo "<td>$data[id]</td>";
					echo "<td>$data[sensor_id]</td>";
					echo "<td>$data[area_name]</td>";
					echo "<td>$data[update_time]</td>";
					echo "<td><a href='sensor_update_form.php?id=$data[id]'>Edit</a></td>";
					echo "<td><a href='#' onclick=\"delete_Confirm('$data[id]');\">Delete</a></td>";
					echo "</tr>";
				}
			
			
			?>
		</tbody>
	</table>
</body>
</html>
