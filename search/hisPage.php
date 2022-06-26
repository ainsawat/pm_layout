<?php require_once("../../config.php"); ?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link href="../../Format/css/bootstrap.min.css" rel="stylesheet">
		
		<link rel="stylesheet" href="../../Format/css/w3.css">
		<link href="../../Format/css/metro.css" rel="stylesheet">
		<link href="../../Format/css/metro-schemes.css" rel="stylesheet">
		
		<link href="/MTTR/table/dataTables.bootstrap.css" rel="stylesheet" />
		<script src="/MTTR/table/jquery.min.js"></script>
		<script src="/MTTR/table/jquery.dataTables.min.js"></script>
		<script src="/MTTR/table/dataTables.bootstrap.js"></script>

		<title>MTTR :: PRB STW HGST</title>
		
		<style>
		footer { 
			display: block;
		}
		</style>
		
		<script>	
			$(document).ready(function() {
			  $('#example').dataTable({
					"paging":   false,
					"order": [[ 0, "desc" ]],
					"info":     false,
					"filter": true
				});
			});
		</script>
</head>
<?php 

		//$conn = mysql_connect($ServerName,$uName,$uPass);
		//$db = mysql_select_db($dbMTTR,$conn);
		try{
				$db = new PDO('mysql:host='.$ServerName.';dbname='.$dbMTTR.';'.$CHAR_SET,$uName,$uPass);

			} catch (PDOException $e) {

					die( "ไม่สามารถเชื่อมต่อฐานข้อมูลได้ : ".$e->getMessage());

			}

		

		
			if(isset($_GET["Tester"]))
			{
				$Tester = $_GET["Tester"];
			}
			if(isset($_GET["Period"]))
			{
				$Period = $_GET["Period"];
			}
			//$QueryTestID = substr($_SERVER['QUERY_STRING'], 7,4);
			
			//$QueryCell = substr($_SERVER['QUERY_STRING'], 16);
								
			//echo $Tester;
			//echo $Period;
			
			$Peri=explode(',',$Period);
			$periodlist="";
			foreach ($Peri as $value) {
				if($periodlist==""){
					$periodlist="'$value'";
				}else{
					$periodlist=$periodlist.",'$value'";
				}
				
			}
			
			//echo $periodlist;
			
			$query = "SELECT * FROM `item_check` WHERE `period` IN ($periodlist)";
							
			//$result = mysql_query($query);
			$result = $db->query($query);
	//echo($query);

?>
<body>
	<h3>Item for Action PM</h3>
	<br>
	<label><b>TesterID :</b><?php echo $Tester; ?></label>
	<br>

		<div style="font-size:80%;">
			<table id="example" class="table striped border bordered hovered" >
				<thead>
					<tr>
						<th >Period</th>
						<th >Item for PM</th>	
						<th>Check point</th>
						
					</tr>
				</thead>
				<tbody>
				<?php
					while($row = $result->fetch())
					{
						echo "<tr>";
						echo "<td>".$row['period']."</td>";
						echo "<td>".$row['item']."</td>";
						echo "<td>".$row['detail']."</td>";
						echo "</tr>";
					}
				?>
				</tbody>
			</table>
		</div>
		
</body>
</html>
