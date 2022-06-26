<?PHP
ob_start();
require_once("../../auth/include/membersite_config.php");
require_once("../../config.php");
$LoginState=false;
$level_user=0;
	if(!$fgmembersite->CheckLogin())
	{
		$LoginState=false;
	}
	else
	{
		$level_user=$fgmembersite->LevelUser();
		//$level_user=intval($le_user);
		$LoginState=true;
	}
	//$lv_MTC_edit=3;
	
//echo("Rev Limit:".$lv_MTC_edit . " LV.USER:".$level_user. " Login state:".$LoginState);						   

//$level_user=0;
?>
<!DOCTYPE html>
<html>

<?php
	$search="";
	$Action="";
	
	
	if(!empty($_GET["search"])) $search = $_GET["search"];
	//echo "TEST:$search<br>";
	//$Action = "0,1,2,3,4";
	
	
	
	//echo $Action."<br>";
?>
<head>
		
		
		
		
		<script>
			function AlertFunction() {
				alert("Action at tester !");
			}
			
			function ScriptTop() {
				window.top.window.GoUpPage(1);
			}
			
			$(document).ready(function() {
			  $('#example').dataTable({
					"paging":   false,
					"order": [[ 0, "desc" ]],
					"info":     false,
					"filter": false
				});
			});
		</script>
		
</head>
<?php

			try{
				$db = new PDO('mysql:host='.$ServerName.';dbname='.$dbMTTR.';'.$CHAR_SET,$uName,$uPass);

			} catch (PDOException $e) {

					die( "ไม่สามารถเชื่อมต่อฐานข้อมูลได้ : ".$e->getMessage());

			}
//			$tbl_alert_pm="machines_his1";

			//SELECT COUNT(*) AS num FROM (SELECT machines_his.`ID` FROM machines_his INNER JOIN man_tester_view ON machines_his.TesterID=man_tester_view.TesterID)i
			
			/* $query = "SELECT COUNT(*) AS num FROM (SELECT ".$tbl_alert_pm.".`ID` FROM ".$tbl_alert_pm." INNER JOIN man_tester_view ON ".$tbl_alert_pm.".TesterID=man_tester_view.TesterID
						   WHERE ((( ".$tbl_alert_pm.".TesterID LIKE '%$search%' OR ".$tbl_alert_pm.".EC LIKE '%$search%' OR ".$tbl_alert_pm.".Product LIKE '%$search%' )) AND ".$tbl_alert_pm.".Status IN ('2','3','4','5','6')))i";
			
			$result = $db->query($query);
			while($row = $result->fetch())
			{
				$numAll = $row['num'];
			}
			
			$query = "SELECT COUNT(*) AS num FROM (SELECT ".$tbl_alert_pm.".`ID` FROM ".$tbl_alert_pm." INNER JOIN man_tester_view ON ".$tbl_alert_pm.".TesterID=man_tester_view.TesterID
						   WHERE ((man_tester_view.name LIKE '%$name%' AND ".$tbl_alert_pm.".`owner` LIKE '%$supname%' AND (".$tbl_alert_pm.".Cell LIKE '%$cell%' OR ".$tbl_alert_pm.".Cell IS NULL ) AND ( ".$tbl_alert_pm.".TesterID LIKE '%$search%' OR ".$tbl_alert_pm.".EC LIKE '%$search%' OR ".$tbl_alert_pm.".Product LIKE '%$search%' )) AND ".$tbl_alert_pm.".Status = '2'))i";
			$result = $db->query($query);
			while($row = $result->fetch())
			{
				$numWD = $row['num'];
			}
			
			$query = "SELECT COUNT(*) AS num FROM (SELECT ".$tbl_alert_pm.".`ID` FROM ".$tbl_alert_pm." INNER JOIN man_tester_view ON ".$tbl_alert_pm.".TesterID=man_tester_view.TesterID
						   WHERE ((man_tester_view.name LIKE '%$name%' AND ".$tbl_alert_pm.".`owner` LIKE '%$supname%' AND (".$tbl_alert_pm.".Cell LIKE '%$cell%' OR ".$tbl_alert_pm.".Cell IS NULL ) AND ( ".$tbl_alert_pm.".TesterID LIKE '%$search%' OR ".$tbl_alert_pm.".EC LIKE '%$search%' OR ".$tbl_alert_pm.".Product LIKE '%$search%' )) AND ".$tbl_alert_pm.".Status = '3'))i";
			$result = $db->query($query);
			while($row = $result->fetch())
			{
				$numShutdown = $row['num'];
			}
			
			$query = "SELECT COUNT(*) AS num FROM (SELECT ".$tbl_alert_pm.".`ID` FROM ".$tbl_alert_pm." INNER JOIN man_tester_view ON ".$tbl_alert_pm.".TesterID=man_tester_view.TesterID
						   WHERE ((man_tester_view.name LIKE '%$name%' AND ".$tbl_alert_pm.".`owner` LIKE '%$supname%' AND (".$tbl_alert_pm.".Cell LIKE '%$cell%' OR ".$tbl_alert_pm.".Cell IS NULL ) AND ( ".$tbl_alert_pm.".TesterID LIKE '%$search%' OR ".$tbl_alert_pm.".EC LIKE '%$search%' OR ".$tbl_alert_pm.".Product LIKE '%$search%' )) AND ".$tbl_alert_pm.".Status = '4'))i";
			$result = $db->query($query);
			while($row = $result->fetch())
			{
				$numR = $row['num'];
			}
			
			$query = "SELECT COUNT(*) AS num FROM (SELECT ".$tbl_alert_pm.".`ID` FROM ".$tbl_alert_pm." INNER JOIN man_tester_view ON ".$tbl_alert_pm.".TesterID=man_tester_view.TesterID
						   WHERE ((man_tester_view.name LIKE '%$name%' AND ".$tbl_alert_pm.".`owner` LIKE '%$supname%' AND (".$tbl_alert_pm.".Cell LIKE '%$cell%' OR ".$tbl_alert_pm.".Cell IS NULL ) AND ( ".$tbl_alert_pm.".TesterID LIKE '%$search%' OR ".$tbl_alert_pm.".EC LIKE '%$search%' OR ".$tbl_alert_pm.".Product LIKE '%$search%' )) AND ".$tbl_alert_pm.".Status = '5'))i";
			$result = $db->query($query);
			while($row = $result->fetch())
			{
				$numOnline = $row['num'];
			}
			
			$query = "SELECT COUNT(*) AS num FROM (SELECT ".$tbl_alert_pm.".`ID` FROM ".$tbl_alert_pm." INNER JOIN man_tester_view ON ".$tbl_alert_pm.".TesterID=man_tester_view.TesterID
						   WHERE ((man_tester_view.name LIKE '%$name%' AND ".$tbl_alert_pm.".`owner` LIKE '%$supname%' AND (".$tbl_alert_pm.".Cell LIKE '%$cell%' OR ".$tbl_alert_pm.".Cell IS NULL ) AND ( ".$tbl_alert_pm.".TesterID LIKE '%$search%' OR ".$tbl_alert_pm.".EC LIKE '%$search%' OR ".$tbl_alert_pm.".Product LIKE '%$search%' )) AND ".$tbl_alert_pm.".Status = '6'))i";
			$result = $db->query($query);
			while($row = $result->fetch())
			{
				$numSP = $row['num'];
			}
			 */
			//Query search
			
			
			
			$query = "SELECT ".$tbl_man_tester.".`TesterID`,".$tbl_man_tester.".`model`,".$tbl_man_tester.".`IP`,".$tbl_man_tester.".`MC_Asset_No`,".$tbl_man_tester.".`MC_Type` FROM " .$tbl_man_tester."  
						   WHERE (".$tbl_man_tester.".TesterID LIKE '%$search%' OR ".$tbl_man_tester.".IP LIKE '%$search%' OR ".$tbl_man_tester.".model LIKE '%$search%' OR ".$tbl_man_tester.".MC_Asset_No LIKE '%$search%' OR ".$tbl_man_tester.".MC_Type LIKE '%$search%')" ;
			
			//echo $query."<br>";
			$result1 = $db->query($query);
			

?>

<body>
			
			<div class="se-pre-con"></div>
		
			<div style="font-size:100%; ">
				<table id="example" class="Lay_out" border="1" >
					<thead>
						<tr>
							<th class ="HColumn">TesterID</th>
							<th class ="HColumn">Model</th>
							<th class ="HColumn">IP</th>
							<th class ="HColumn">MC_Asset_No</th>
							<th class ="HColumn">MC_Type</th>
						</tr>
					</thead>
					<tbody>	
							<?php
						    
							    while($row = $result1->fetch())
							    {
								   echo "<tr>";
								   echo "<td>".$row['TesterID']."</td>";
								   echo "<td>".$row['model']."</td>";
								   echo "<td>".$row['IP']."</td>";
								   echo "<td>".$row['MC_Asset_No']."</td>";
								   echo "<td>".$row['MC_Type']."</td>";
								   echo "</tr>";
							    }
						    ?>	
					</tbody>
				</table>
				<?php //print_r ($query);?>
			</div>		
</body>