<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	include("connect.php");
	$sql="select 
	b.company_name as company ,count(a.username) as count_member,sum(a.salary) as total 
	from 
	member as a inner join company as b
	on a.company_id=b.company_id
	group by b.company_name
	
	";
	$run =$db->query($sql);//mysql_query($sql,$conn);
	$row=$run->rowCount();//mysql_num_rows($run);
	//echo "Row:" .$row;
	
?>
	<table border="5" align="center">
		<thead>
			<tr>
				<th>แผนก</th>  <!-- <th> ระบุเป็นคอลัมน์-->
				<th>จำนวน</th>  <!-- <th> ระบุเป็นคอลัมน์-->
				<th>รวมเงินเดือน</th>  <!-- <th> ระบุเป็นคอลัมน์-->
				
				
			</tr>
		</thead>
		<tbody>
			<?php
				$sum_member=0;
				$sum_total=0;
				for($i=1;$i<=$row;$i++){
					$data=$run->fetch();//mysql_fetch_array($run);
					
					echo "<tr>";
					echo "<td>$data[company]</td>";
					echo "<td  align=\"right\">$data[count_member]</td>";
					echo "<td  align=\"right\">".number_format($data[total])."</td>";
					
					echo "</tr>";
					$sum_member=$sum_member+$data[count_member];
					$sum_total=$sum_total+$data[total];
				}
				echo "<tr>";
					echo "<td>Total</td>";
					echo "<td  align=\"right\">$sum_member</td>";
					echo "<td  align=\"right\">".number_format($sum_total)."</td>";
					
					echo "</tr>";
			
			?>
		</tbody>
	</table>
</body>
</html>
