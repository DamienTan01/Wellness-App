<?PHP
	//Community.php
	
	include('header.php');
	
	$object = new Connect();
	
	if(!$object->isLogin())
	{
		header("location:".$object->base_url."index.php");
	}
?>

<html>
	<head>
		<title> - Community Management - </title>		
		
		<style>
			.con
			{
				padding:5%;
				padding-top:5px;
				margin-top:5px;
				margin-left:auto;
				margin-right:auto;
			}
			
			.tablink 
			{
				background-color: #CCC5FF;
				color: black;
				float: left;
				border: none;
				outline: none;
				padding: 10px;
				width: 50%;
			}

			.tablink:hover 
			{
				background-color: #E6E3FF;
				transition:0.3s;
			}		

			/* Style the tab content */
			.tabcontent 
			{				
				display: none;
				background-color: snow;
				padding:20px;
				padding-top: 70px;
				box-shadow: 5px 5px 10px rgba(0,0,0,0.5);
				text-align:center;
			}
			
			h1
			{
				text-align:center;
				font-style:italic;
				font-weight:bold;
			}
			
			/* Style the input */
			.wrap
			{
				width:90%;
				margin-left:auto;
				margin-right:auto;
				background: white;
				padding:30px;
				box-shadow:0 0 10px rgba(0,0,0,0.2);
				border-radius:10px;
			}
			
			.in-wrap
			{
				width:100%;
				margin-left:auto;
				margin-right:auto;
				margin-bottom:20px;
				background-image: linear-gradient(10deg, #E8E9FF, snow);
				height:auto;
				padding:20px;
				box-shadow:0 0 10px rgba(0,0,0,0.2);
				border-radius:10px;
			}	
			
			.wrap .InputText 
			{				
				height:75px;
				width:100%;
				position:relative;
			}
			
			.wrap .InputText input
			{
				height:100%;
				width:100%;
				border:none;
				background-color:white;
				border-bottom:2px solid silver;
				font-size:20px;
				outline:none;
			}
			
			.wrap .InputText input:focus ~ label,
			.wrap .InputText input:valid ~ label
			{				
				transform: translateY(-40px);
				transition:all 0.3s ease;
				color:black;
			}
			
			.wrap .InputText label
			{
				font-size:20px;
				position:absolute;
				bottom:10px;
				left:0;
				color:grey;
			}
			
			.disabled ~ label
			{
				transform: translateY(-40px);
				transition:all 0.3s ease;
				color:black;
				outline:none;
			}
			
			.wrap .InputText .underline
			{
				position:absolute;
				bottom:0px;
				height:2px;
				width:100%;				
			}				
				
			.submit, .cancel
			{
				background-color: white;
				color: black;
				font-family:georgia,garamond,serif;
				font-size:20px;
				text-align: center;
				text-decoration: none;
				padding: 10px 120px;
				border:none;
				box-shadow:0 0 10px rgba(0,0,0,0.2);
			}
			
			.submit:hover
			{
				background-color:#5199F9;
				color: white;
				transition:0.3s;
			}
			
			.cancel:hover
			{
				background-color:red;
				color: white;
				transition:0.3s;
			}
			
			#overlay
			{
				position: absolute;
				top: 50%;
				left: 50%;
				width:60%;
				transform:translate(-50%, -50%);
				border: 2px solid black;
				box-shadow:5px 5px 10px rgba(0,0,0,0.2);
				display: none;
				
				z-index: 1000;
			}			
			
			table, th, td
			{
				border:none;
				border-collapse:collapse;
				padding:10px;
			}
			
			table
			{
				width:100%;
			}
			
			.tb_title
			{
				text-align:left;
			}
			
			.tb_image
			{
				width:250px;
				border:solid 1px grey;
				box-shadow:0 0 10px rgba(0,0,0,0.2);
			}
			
			.tb_publish
			{
				text-align:right;
			}
			
			.tb_status
			{
				text-align:right;
			}
			
			.tb_content
			{
				white-space: pre-line;
			}
			
			.edit_btn			
			{
				background-color: #A99CFF;
				color: white;
				width: 40px;
				margin-right: 20px;
				text-align: center;
				text-decoration: none;
				font-size: 20px;
				padding: 10px;
				border: none;
				border-radius: 25%;
				box-shadow: 0 0 10px rgba(0,0,0,0.2);
			}
			
			.edit_btn2			
			{
				background-color: #A99CFF;
				color: white;
				float: right;
				text-align: center;
				text-decoration: none;
				font-size: 20px;
				padding: 10px;
				border: none;
				border-radius: 25%;
				box-shadow: 0 0 10px rgba(0,0,0,0.2);
			}
			
			.edit_btn:hover, edit_btn2:hover
			{
				background-color: snow;
				color: black;
				transition:0.5s;
			}
			
			.add_btn			
			{
				background-color: #83C2FF;
				color: white;
				text-align: center;
				text-decoration: none;
				padding:10px;
				border:none;
				width:250px;
				height:50px;
				border-radius:5px;
				opacity:60%;
				box-shadow:0 0 10px rgba(0,0,0,0.2);
				font-size:25px;
				font-weight:bold;
			}
			
			.add_btn:hover
			{
				box-shadow:5px 5px 10px rgba(0,0,0,0.2);
				opacity:1;
				transition:0.3s;
			}
		</style>
	</head>
	
	<body>		
		<div class = "content">
			<div class = "con">
				<button class = "tablink" onclick = "openPage('Show', this, 'snow')" id = "defaultOpen">Pending Approval</button>
				<button class = "tablink" onclick = "openPage('Insert', this, 'snow')">Community</button>			

				<span>
					<?PHP
						if(isset($_SESSION['message']))
						{
							echo $_SESSION['message'];
						}				
						unset($_SESSION['message']);
					?>
				</span>
				
				<div id = "Show" class = "tabcontent">	
						<button class = 'add_btn' style = "text-align:center;" onclick = "on()"><i class = 'fas fa-plus'></i> Add Post </button>
						
						<br><br>
					
					<?php
						$result = mysqli_query($connected,"select * FROM community WHERE com_status = 'Pending' order by com_published");

						while($row = mysqli_fetch_array($result))
						{	
					
					?>
						<div class = "in-wrap">
					<?php							
						echo "<table>";
							
							echo "<tr>";									
								echo "<th class = 'tb_title'  colspan = 2>" .$row['com_title']. "</th>";
							echo "</tr>";
							
							echo "<tr>";
								if($row['com_media'] == NULL)
								{
									echo '<td class = "tb_image">No Media Uploaded</td>';
								}
								else
								{
									echo '<td><img class = "tb_image" src = "upload/'.$row["com_media"].'"></td>';
								}	
								echo '<td class = "tb_content" width = "80%">' .$row['com_content']. '</td>';
								
							echo "</tr>";						
								
							echo "<tr>";
								echo "<td class = 'tb_publish'> Published on : " .$row['com_published']. "</td>";
								echo "<td> Published by : " .$row['user_id']. "</td>";
							echo "</tr>";
							
							echo "<tr>";
								echo "<td colspan = 2><center><button class = 'edit_btn' id = 'com_app'><a href = 'com_approve.php?id=".$row['com_id']."' onClick=\"javascript:return confirm('Are you sure you want to approve this?');\"><i class = 'fas fa-check'></i></a></button>";
								echo "<button class = 'edit_btn'><a href = 'com_delete.php?id=".$row['com_id']."' onClick=\"javascript:return confirm('Are you sure you want to delete this?');\"><i class = 'fas fa-times'></i></a></button></center></td>";
							echo "</tr>";
							
						echo "</table>";
					?>
						</div>
					<?php
						}
					?>
				</div>

				<div id = "Insert" class = "tabcontent">
					<h1>Post List</h1>
					
					<div class = "wrap">
					<?php
						$result = mysqli_query($connected,"select * FROM community WHERE com_status = 'Approved'");
						
						$rowcount = mysqli_num_rows($result);
							
						if($rowcount == 0)
						{								
							echo "<center><h3 style = 'font-size:25px;'><b>There is no Community Post Record</b></h3></center>";								
						}
						else
						{						
							while($row = mysqli_fetch_array($result))
							{	
					?>
						<div class = "in-wrap">								
						
					<?php 							
								echo "<table>";
							
								echo "<tr>";
									echo "<th colspan = 2 style = 'text-align:right;'><button class = 'edit_btn' onclick = 'on2()'><i class = 'fa fa-eye'></i></button></a>";
									echo "<a href = 'com_delete.php?id=".$row['com_id']."' onClick=\"javascript:return confirm('Are you sure you want to delete this?');\"><button class = 'edit_btn2'><i class = 'fa fa-trash'></i></button></a></th>";
								echo "</tr>";
							
								echo "<tr>";									
									echo "<th class = 'tb_title'  colspan = 2>" .$row['com_title']. "</th>";
								echo "</tr>";
								
								echo "<tr>";									
									echo "<td class = 'tb_content'><img class = 'tb_image' src = 'upload/".$row['com_media']."'></td>";
								echo "</tr>";
								
								echo "<tr>";
									echo "<td class = 'tb_publish' colspan = 2> Published on : " .$row['com_published']. "</td>";
								echo "</tr>";
								
								echo "<tr>";
									echo "<td class = 'tb_status' colspan = 2> Status : " .$row['com_status']. "</td>";
								echo "</tr>";
								
							echo "</table>";																
						?>
						
						</div>
						
					<?php
							}
						}
					?>
					</div>
				</div>
				
				
				<!-- Overlay Add Community Post -->
				<div id = "overlay" class = "overlay">
				<div class = "wrap" style = "text-align:center; width:100%;">
					<form method = "post" action = "com_insert.php">
						<h2>Create Community</h2>
							 
						<hr style = "border-bottom:2px solid grey;">
						
						
							
						<br><br>
							
						<input type = "submit" class = "submit">
						<button type = "reset" class = "cancel" onclick = "off()">Cancel</button>
					</form>
				</div>
				</div>
				
				<div id = "overlay2" class = "overlay2">
				<div class = "wrap" style = "text-align:center; width:100%;">
					<form method = "post" action = "com_insert.php">
						<h2>Post</h2>
						
						<hr style = "border-bottom:2px solid grey;">
						
						<?php
							$result = mysqli_query($connected,"select * FROM community WHERE com_id = ");
						
							while($row = mysqli_fetch_array($result))
							{	
						?>
						<div class = "in-wrap">								
						
					<?php 							
								echo "<table>";
								
								echo "<tr>";
									echo "<th colspan = 2 style = 'text-align:right;'><button class = 'edit_btn' onclick = 'on2()'><i class = 'fa fa-eye'></i></button></a>";
									echo "<a href = 'com_delete.php?id=".$row['com_id']."' onClick=\"javascript:return confirm('Are you sure you want to delete this?');\"><button class = 'edit_btn2'><i class = 'fa fa-trash'></i></button></a></th>";
								echo "</tr>";
							
								echo "<tr>";									
									echo "<th class = 'tb_title'  colspan = 2>" .$row['com_title']. "</th>";
								echo "</tr>";
									
								echo "<tr>";									
									echo "<td class = 'tb_content'><img class = 'tb_image' src = 'upload/".$row['com_media']."'></td>";
								echo "</tr>";
								
								echo "<tr>";
									echo "<td class = 'tb_publish' colspan = 2> Published on : " .$row['com_published']. "</td>";
								echo "</tr>";
								
								echo "<tr>";
									echo "<td class = 'tb_status' colspan = 2> Status : " .$row['com_status']. "</td>";
								echo "</tr>";
									
								echo "</table>";																
						?>
						
						</div>
						
					<?php
							}
						}
					?>
							
						<br><br>
							
						<input type = "submit" class = "submit">
						<button type = "reset" class = "cancel" onclick = "off2()">Cancel</button>
					</form>
				</div>
				</div>
				
				<script>
					function openPage(pageName,elmnt,color) 
					{
						var i, tabcontent, tablinks;
						tabcontent = document.getElementsByClassName("tabcontent");
						
						for (i = 0; i < tabcontent.length; i++) 
						{
							tabcontent[i].style.display = "none";
						}
						
						tablinks = document.getElementsByClassName("tablink");
						
						for (i = 0; i < tablinks.length; i++) 
						{
							tablinks[i].style.backgroundColor = "";
						}
						
						document.getElementById(pageName).style.display = "block";
						elmnt.style.backgroundColor = color;
					}

					document.getElementById("defaultOpen").click();
					
					function setbg(color)
					{
						document.getElementById("Tip_content").style.background=color
					}
					
					function on() 
					{
						document.getElementById("overlay").style.display = "block";
					}

					function off() 
					{
						document.getElementById("overlay").style.display = "none";
					}
					
					function on2() 
					{
						document.getElementById("overlay2").style.display = "block";
					}

					function off2() 
					{
						document.getElementById("overlay2").style.display = "none";
					}
				</script>
			</div>
		</div>
	</body>
</html>