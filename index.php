
 <html lang="en">
  <head>   
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Convert & PM Layout</title>

    <!-- Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet"> 

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<link rel="stylesheet" href="style_table.css" type="text/css">
		<link rel="stylesheet" href="tooltiptext.css" type="text/css">
		<link href="../Format/css/metro.css" rel="stylesheet">		
		<script src="../Format/js/jquery.js"></script>
		<script src="../Format/js/metro.js"></script>
		
		
		<!-- Resources -->

	
		<script>
				function setURL(url){
					document.getElementById('IFRAME').src = url;
				}
				function UpdateLayout()
				{
					var xstw_temp_area = document.getElementById('stw_temp_area');
				    var stw_temp_area = xstw_temp_area.options[xstw_temp_area.selectedIndex].value;
					$("#show_layout").html("<br><br><br><H1 style='color:red;'>LOADING PLEASE WAIT!!</H1>");
					//alert("Layout");
				    //alert(p);
					//setURL("trend.php?model="+model+"&xtype="+Group+"&cYearWK="+Week);
						$.get("layout.php",{
										stw_temp_area:stw_temp_area,
										ran:Math.random()},function(data){
										//alert(data);
										$("#show_layout").html(data);		
						}); 
					//resizeIframe(this);
					//update_PM_data();
				}
				function searchInfo()
				{
					var search = $("input:text[name=search]").val();
					//$("#show_search").html("<br><br><br><H1 style='color:red;'>LOADING PLEASE WAIT!!</H1>");
					//alert(stw_temp_area);
				    //alert(search);
					//setURL("trend.php?model="+model+"&xtype="+Group+"&cYearWK="+Week);
						$.get("./search/ajax.php",{
										search:search,
										ran:Math.random()},function(data){

										$("#show_search").html(data);
						}); 
					resizeIframe(this);
					
				}
				function update_PM_data()
				{
						$.get("update.php",{
										//start_time:start_time,
										//end_time:end_time,
										//Limit:Limit,
										typedata:"",
										ran:Math.random()},function(data){
																				
										//var jsonData =data;// [{person:"me", age :"30"},{person:"you",age:"25"}];
										//alert(data);
										/* var myJSON = JSON.parse(data);
										console.log( myJSON[0].area_group );
										alert(myJSON);
										 */
										 var TesterID="";
										 var IP="";
										 var Model="";
										 var MC_Asset_No="";
										 var MC_Type="";
										 var Status="";
										 
										
										  
										JSON.parse(data, (key, value) => {
										  //console.log(key); // log the current property name, the last is "".
										  //alert(key +"-"+ value) ;     // return the unchanged property value.
										  //setColor(key,value);
										  
										  if (key == "TesterID") {
												TesterID= value;
												
											} 
										
											else if (key == "IP") {
												IP= value;
												
											} 
											else if (key == "model") {
												Model= value;
												
											} 
											else if (key == "MC_Asset_No") {
												MC_Asset_No= value;
												
											} 
											else if (key == "MC_Type") {
												MC_Type= value;
												
											} 
											else if (key == "Status") {
												Status= value;
												
											} 
											
											else if (value == "[object Object]") {
												//alert(TesterID +"_"+ Status );
												//setColor(TesterID,MC_Asset_No);
												var select_i=$('input[name="AC1"]:checked').val();
												if (select_i == "2") {
													setColor(TesterID,IP,Status);
												} 
												else if (select_i == "3") {
													setColor(TesterID,Model,Status);
												} 
												else if(select_i == "4"){
													setColor(TesterID,MC_Asset_No,Status);
												}
												else if(select_i == "5"){
													setColor(TesterID,MC_Type,Status);
												}
											
											} 
											else {
												//alert(key+"_Else_"+value);
											};
										  
										  
										});
						}); 
					countDownDate=300;
				}
			
			
				
			</script>
			
			<script type="text/javascript" >        
			function JudgeTemp(x,Temp)
			{
				//var fColor=document.getElementById('CL20').getAttribute('style');
				if(Temp==1){
					var fColor=document.getElementById('CL21').getAttribute('style');
					var bColor=document.getElementById('CL21').getAttribute('bgcolor');
				}
				else if(Temp==2){
					var fColor=document.getElementById('CL22').getAttribute('style');
					var bColor=document.getElementById('CL22').getAttribute('bgcolor');
				}
				else if(Temp==3){
					var fColor=document.getElementById('CL23').getAttribute('style');
					var bColor=document.getElementById('CL23').getAttribute('bgcolor');;
				}
				else if(Temp==4){
					var fColor=document.getElementById('CL24').getAttribute('style');
					var bColor=document.getElementById('CL24').getAttribute('bgcolor');
				}
				else if(Temp==5){
					var fColor=document.getElementById('CL25').getAttribute('style');
					var bColor=document.getElementById('CL25').getAttribute('bgcolor');
				}
				else if(Temp==6){
					var fColor=document.getElementById('CL26').getAttribute('style');
					var bColor=document.getElementById('CL26').getAttribute('bgcolor');
				}
				else if(Temp==7){
					var fColor=document.getElementById('CL27').getAttribute('style');
					var bColor=document.getElementById('CL27').getAttribute('bgcolor');
				}
				else if(Temp==0){
					var fColor=document.getElementById('CL28').getAttribute('style');
					var bColor=document.getElementById('CL28').getAttribute('bgcolor');
				}
				
				x.style =fColor;
							
				x.bgColor =bColor;
			
				
			}
			function setColor(tester_id,MC_Asset_No,status)
			{
				if(tester_id =="0"||tester_id ==""){return "";}//||Temp==null
						try {
							var x = document.getElementById(tester_id);
							//alert(tester_id);
							var y = document.getElementById(tester_id+"tip").innerHTML ;
							//alert(tester_id+"tip");
							//var z=document.getElementById(tester_id+"text").value;//
							//var w=document.getElementById(tester_id+"text").innerHTML;//+"<span class='tooltiptext' id='".+tester_id."tip'>"+y + "</span>
							var lbinfo="<div class='tooltip'>"+tester_id+"<br>"+MC_Asset_No +"<span class='tooltiptext' id='"+tester_id +"tip'>"+y+"</span></div>";
							//alert();
							//alert(tester_id);
					
							x.innerHTML=lbinfo ;
							JudgeTemp(x,status);
												
						}
				
						catch (e) {
							//alert(tester_id+"<br>"+e);// handle the unsavoriness if needed
							//JudgeTemp(x,status);
						}
					
					            
			}
			//setInterval('update_PM_data();', 300000);
			var countDownDate=300;
			var x = setInterval(function count_down() {
				//alert(countDownDate);
				// Get todays date and time
				countDownDate = countDownDate - 1;
				
				
				
				// Output the result in an element with id="demo"
				document.getElementById("demo").innerHTML = " Next update in " + countDownDate + "s";
				
				// If the count down is over, write some text 
				if (countDownDate < 0) {
					countDownDate=300;
					update_PM_data();
					//clearInterval(x);
					document.getElementById("demo").innerHTML = "Updating";
				}
			}, 1000);
			
    </script> 
		 <script> 
			function WhichButton(event) {
				alert("You pressed button: " + event.button)
			}
			function resizeIframe(obj) {
				  //alert(xh);
				  var xh=obj.contentWindow.document.body.scrollHeight+200;
					//alert(xh);
				if(obj.contentWindow.document.body.scrollHeight>700)
					{
						obj.style.height =xh + 'px';//obj.contentWindow.document.body.scrollHeight + 'px';
					}
				else{
					obj.style.height='700px';
				}
				//var xh=screen.height-200;
				//obj.style.height =xh  + 'px';// obj.contentWindow.document.body.scrollHeight + 'px';
				
				  $(document).ready(function(){
					$(this).scrollTop(0);
				});
			  }
			  
			 function updateData(){
				 
				 UpdateLayout();
				 //alert("mt");
				update_PM_data();
				 //alert("mtew");
			 }
			
		
			</script>
		 	
			
		
		</head>
		
		
  <body  onLoad=" UpdateLayout(); ">
   
  <!-- header -->
    <header>
	<!-- navigaation -->
	<!--	<div class="app-bar navy">
			<a class="app-bar-element" href="http://10.82.209.9/qcsc/"><span class="glyphicon glyphicon-fast-backward"></span>&nbsp;&nbsp;Back Home</a>
			<span class="app-bar-divider"></span>
			<a class="app-bar-element" href="../../STWHWDR/"><span class="glyphicon glyphicon-fast-backward"></span>&nbsp;&nbsp;STW Hardware Report</a>
			<span class="app-bar-divider"></span>
			<a class="app-bar-element" href="../../STWTEMP/"><span class="glyphicon glyphicon-fast-backward"></span>&nbsp;&nbsp;STW Temperature</a>
			<span class="app-bar-divider"></span>
			<a class="app-bar-element" href="../../STWTEMP/Real"><span class="glyphicon glyphicon-fast-backward"></span>&nbsp;&nbsp;Temperature realtime</a>
			<span class="app-bar-divider"></span>
	</div>
	<!-- navigaation -->
	</header>
	
	<!-- header -->
	<div class="container-fluid">
		<div class="row">
			<br>
				<h2><center>&nbsp;&nbsp;Convert & PM Layout</center></h2>
				<br>
				&nbsp;&nbsp;
				<?PHP include("connect.php"); ?>
				PM area:
				
					<select name="stw_temp_area" id="stw_temp_area"size=1 onchange="javascript:updateData();">
						<option value="All">All</option>
						<?php
						//echo "<option value='ALL'>ALL</option>";
						$query = "Select distinct(`area_group`) FROM `stw_temp_layout`";
						//echo $query;
						$result = $db->query($query);// mysql_query($query);
						while($ri =$result->fetch())// mysql_fetch_array($result))
						{
							echo "<option value=" .$ri['area_group'] . ">" . $ri['area_group'] . "</option>";
						}

						?>
						</select>


							<button style=\"float: left;\" onclick="javascript:update_PM_data();">update</button>
						
							
							<a id="demo"></a>
							
							
							<input type="radio" name="AC1" value="2" > IP
							<input type="radio" name="AC1" value="3" > Model
							<input type="radio" name="AC1" value="4" Checked> Asset_No
							<input type="radio" name="AC1" value="5" > MC_Type
											<br><br>
											<label> All Search </label> * ( TesterID,Model,IP,Asset_No,MC_Type ) :   
											
											<input type="text" name="search" style="width:150px">
										
											

											<button style=\"float: left;\" onclick="javascript:searchInfo()">Search</button>
											<!--<input class="button primary" type="button" name="TestCom" id="TestCom"value="TestCom" style="width:300px" onclick="CheckUPdate()">-->
											<div id="show_search"></div> 
								
							
							
		</div>
						
						
						<center>
							<!--<iframe width="99%" height="60%" frameborder="2" id="IFRAME" src="trend.php?model=AR8&xtype=1&cYearWK=""></iframe>	-->
				
		
			
							<div id="show_layout"></div>
							
							
							<br>
							
							<br>
							
							<table   style='font-size:80%; ;' border=1 align="center" >
								<tr>
									
									<td id="CL21" width="50px" style='color:white' bgcolor="#ff6600">PM</td>
									<td id="CL22" width="50px" style='color:white' bgcolor="#ffcc00">Notify</td>
									<td id="CL23" width="50px" style='color:white' bgcolor="#ff00ff">Start Action</td>
									<td id="CL24" width="50px" style='color:white' bgcolor="#66ffff">Action PM Complete</td>
									<td id="CL25" width="50px" style='color:white' bgcolor="#0000ff">Release to MTC</td>
									<td id="CL26" width="50px" style='color:white' bgcolor="#6600cc">Receive Tester</td>
									<td id="CL27" width="50px" style='color:white' bgcolor="#808080">Production Start</td>
									<td id="CL28" width="50px" style='color:white' bgcolor="#33cc33">PM Job Complete</td>
									
								</tr>
							  
							</table>
							<p id="Time"></p>
	
		</div>
							
							
						
							
							
						</center>
						<br><br>
						<br><br>
		</div>

	
	
	
	
	
  </body>
  
</html>