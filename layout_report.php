<style>
		footer { 
			display: block;
		}
		table, th, td { /*Line table*/
			padding: 1px;
		   border: 1px solid black;
		   border-collapse: collapse;
		}
		th,td { /* settext to center */
			text-align: center;
		}
		/* tr:nth-child(even) {background-color: #f2f2f2} /*Hilight row*/ */
		td.textLeft{
			text-align: left;/*set text to left */
			width=200px;
		}
		th {/* */
		    background-color:#8A2BE2; /*Head table bg=Green font=white*/
		    color: white;
			padding: 5px;
			text-align: center;
			vertical-align: middle;
		}
		th.rotate {
		  /* Something you can count on */
		  height: 100px;
		  white-space: nowrap;
		  text-align: center;
		  vertical-align: middle;
		  width: 1.5em;
		}

		th.rotate > div {
		  -moz-transform: rotate(-90.0deg);  /* FF3.5+ */
		       -o-transform: rotate(-90.0deg);  /* Opera 10.5 */
		  -webkit-transform: rotate(-90.0deg);  /* Saf3.1+, Chrome */
		             filter:  progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083);  /* IE6,IE7 */
		         -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083)"; /* IE8 */
		         margin-left: -10em;
		         margin-right: -10em;
		}
		
		div.ScollBarX{
			overflow-x:auto; /*Show scollbar X */
		
		}
		
		</style>
<?php
	
	$stw_temp_area=$_GET['stw_temp_area'];
	$templimit=$_GET['tempLimit'];
	
	echo "<H3 style=\"text-align: center;color:red\">STW Alert Temp over limit(".$templimit ." °C)</H3>";
				
	//echo $stw_temp_area;
	if($stw_temp_area=="All")
	{
		include("connect.php");
		$sql="SELECT DISTINCT(area_group) FROM `stw_temp_layout`";
		$run =mysql_query($sql,$conn);
		$row=mysql_num_rows($run);
		while ($row = mysql_fetch_array($run)) {
			GenLayout($row['area_group'],$templimit);
			echo "<br><br>";
		}
	}
	else
	{
		GenLayout($stw_temp_area,$templimit);
	}
	
	function GenLayout($stw_temp_area,$templimit)
	{
		include("connect.php");
		$sql="SELECT MAX(irow)as 'irow',MAX(icol)as 'icol' FROM `stw_temp_layout` WHERE `area_group`='$stw_temp_area'";
		//$sql="SELECT * FROM `stw_temp_layout` WHERE `area_group`='STW'  ORDER BY `stw_temp_layout`.`irow` ASC, `icol` ASC";
		$run =$db->query($sql);// mysql_query($sql,$conn);
		$data=$run->fetch();// mysql_fetch_array($run);
		$max_iRow=$data['irow'];
		$max_iCol=$data['icol'];
		//echo "Position:"."$max_iRow" .":". "$max_iCol";
		$sql="SELECT stw_temp_layout.area_group,stw_temp_layout.area_name,stw_temp_layout.irow,stw_temp_layout.icol,ROUND(r.Temp,2)as Temp FROM stw_temp_layout LEFT JOIN
		(SELECT stw_temp_table.area_name,q.Temp,q.iTime FROM stw_temp_table LEFT JOIN
		(SELECT stw_temp_area.sensor,stw_temp_area.iTime,stw_temp_area.Temp FROM stw_temp_area RIGHT JOIN  
		(SELECT sensor, MAX(iTime)as iTime
		FROM stw_temp_area
		GROUP BY sensor)p
		On stw_temp_area.sensor=p.sensor AND stw_temp_area.iTime=p.iTime)q
		ON stw_temp_table.sensor_id=q.sensor)r
		ON stw_temp_layout.area_name=r.area_name WHERE stw_temp_layout.`area_group`='$stw_temp_area'  ORDER BY `stw_temp_layout`.`irow` ASC, `icol` ASC";
		$run =$db->query($sql);// mysql_query($sql,$conn);
		$row=$run->rowCount();// mysql_num_rows($run);
		while ($row =$db->fetch())// mysql_fetch_array($run)) 
		{
			$lay_data[$row['irow']][$row['icol']]=$row['area_group']."_".$row['area_name']."_".$row['Temp'];
		  //echo $row['area_name'] . ' ' . $row['irow']. ' ' . $row['icol'];
		}
		//print_r($lay_data);
		
		
		//echo "Row:" .$row;
		echo "<H3 style=\"text-align:left\">ZONE : $stw_temp_area</H3>";
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
						$data=mysql_fetch_array($run);
						echo "<tr>";
						if($i!=0){
							
								for($j=0;$j<=$max_iCol;$j++){
									$TesterID=null;
									$Temp=null;
									if($j!=0){
										
										try {
											error_reporting(0);//ยกเลิก Eeror ที่แสดง
											if($lay_data[$i][$j]!=null){
												$alldata=$lay_data[$i][$j]; //Area_Tester ID
												$arr_data = explode("_",$alldata );
												$TesterID=$arr_data[1];
												$Temp=$arr_data[2];
												//if(is_null($TesterID) )continue;
												//if($TesterID != null or $Temp =null )continue;
											}
										} catch (Exception $e) {
											
										}
										if($Temp > $templimit)
										{
											echo "<td bgcolor=\"#FF3300\" style=\"color:#404040;\" id='".$alldata."' name='R".$i."C".$j."'>".$TesterID."<br>".$Temp."</td>";
										}else{
											echo "<td style=\"color:#404040;\" id='".$alldata."' name='R".$i."C".$j."'>".$TesterID."<br>".$Temp."</td>";
										}
										
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