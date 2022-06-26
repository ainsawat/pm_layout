<?php
	
	$stw_temp_area=$_GET['stw_temp_area'];
	//echo $stw_temp_area;
	if($stw_temp_area=="All")
	{
		include("connect.php");
		$sql="SELECT DISTINCT(area_group) FROM `stw_temp_layout`";
		$run =$db->query($sql);// mysql_query($sql,$conn);
		$row=$run->rowCount();//mysql_num_rows($run);
		while ($row =$run->fetch())// mysql_fetch_array($run)) 
		{
			GenLayout($row['area_group']);
			echo "<br><br>";
		}
	}
	else
	{
		GenLayout($stw_temp_area);
	}
	
	function GenLayout($stw_temp_area)
	{
		include("connect.php");
		$sql="SELECT MAX(irow)as 'irow',MAX(icol)as 'icol' FROM `stw_temp_layout` WHERE `area_group`='$stw_temp_area' ";
		//$sql="SELECT * FROM `stw_temp_layout` WHERE `area_group`='STW'  ORDER BY `stw_temp_layout`.`irow` ASC, `icol` ASC";
		$run =$db->query($sql);//mysql_query($sql,$conn);
		$data=$run->fetch();//mysql_fetch_array($run);
		$max_iRow=$data['irow'];
		$max_iCol=$data['icol'];
		//echo "Position:"."$max_iRow" .":". "$max_iCol";
		//$sql="SELECT area_group,area_name,irow,icol FROM `stw_temp_layout` WHERE `area_group`='$stw_temp_area'  ORDER BY `stw_temp_layout`.`irow` ASC, `icol` ASC";
		$sql="SELECT layout.*,testerInfo.`IP`,testerInfo.`model`,testerInfo.`MC_Asset_No`,testerInfo.`MC_Type`FROM
(SELECT  `area_group`, `area_name`, `irow`, `icol` FROM `stw_temp_layout` WHERE `area_group` LIKE '$stw_temp_area' )layout
LEFT JOIN
(SELECT * FROM man_tester_view) testerInfo
ON layout.`area_name`=testerInfo.`TesterID` ORDER BY `irow` ASC, `icol` ASC";
	
	//echo "$sql<br>";
		$run =$db->query($sql);//mysql_query($sql,$conn);
		$row=$run->rowCount();//mysql_num_rows($run);
		while ($row =$run->fetch())// mysql_fetch_array($run))
		{
			$lay_data[$row['irow']][$row['icol']]=$row['area_group']."_".$row['area_name']."_".$row['IP']."_".$row['model']."_".$row['MC_Asset_No']."_".$row['MC_Type'];
		  //echo $row['area_name'] . ' ' . $row['irow']. ' ' . $row['icol'];
		}
		//print_r($lay_data);
		
		
		//echo "Row:" .$row;
		echo "<H3 style=\"text-align: center;\">ZONE : $stw_temp_area</H3>";
	?>
		
		<!--<table class ="Lay_out" onMousedown="WhichButton(event)" style='font-size:100%; width=95% ;' border=3>-->
	  <table class ="Lay_out" style='font-size:100%; width=95% ;' border=3>
			<thead>
				<tr>
						<?php
						for($j=0;$j<=$max_iCol;$j++){
							if($j==0){
								echo "<th class =\"HColumn\"></th>";
							}
							else{
								echo "<th class =\"Lay_out\">".$j."</th>";
							}
							
						}
						?>
				</tr>
			</thead>
			

			<tbody>
				<?php
				error_reporting(0);
					for($i=0;$i<=$max_iRow;$i++){
						$data=$run->fetch();// mysql_fetch_array($run);
						echo "<tr>";
						if($i!=0){
							
								for($j=0;$j<=$max_iCol;$j++){
									$TesterID="";
									$IP="";
									$model="";
									$MC_Asset_No="";
									$MC_Type="";
									
									
									if($j!=0){
										
										try {
											error_reporting(0);//ยกเลิก Eeror ที่แสดง
											if($lay_data[$i][$j]!=null){
												$alldata=$lay_data[$i][$j]; //Area_Tester ID
												$arr_data = explode("_",$alldata );
												$TesterID=$arr_data[1];
												$IP=$arr_data[2];
												$model=$arr_data[3];
												$MC_Asset_No=$arr_data[4];
												$MC_Type=$arr_data[5];
												

											}
										} catch (Exception $e) {
											
										}
										echo "<td  id='".$TesterID."' name='R".$i."C".$j."'>".'<div class="tooltip">'.$TesterID.'
  <span class="tooltiptext" id="'.$TesterID.'tip" >TesterID : '.$TesterID.'<br>IP : '.$IP.'<br>Model : '.$model.'<br>MC_Asset_No : '.$MC_Asset_No.'<br>MC_Type : '.$MC_Type.'</span>
</div>'."</td>";
																		
									}
									else
									{
										echo "<th class =\"HColumn\">".$i."</th>";
									}
								
							}
						}
						
						
						echo "</tr>";
					}
				
				
				?>
			</tbody>
		
		</table>	
	<?php
		}
	?>