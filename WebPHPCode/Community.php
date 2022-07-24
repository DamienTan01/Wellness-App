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
				padding: 5%;
				padding-top: 5px;
				margin-top: 5px;
				margin-left: auto;
				margin-right: auto;
			}
			
			.tablink 
			{
				font-weight: bold;
				background-color: #CCC5FF;
				color: black;
				float: left;
				border: none;
				outline: none;
				padding: 15px;
				width: 50%;
			}

			.tablink:hover 
			{
				background-color: #E6E3FF;
				transition: 0.3s;
				text-shadow: -0.5px 1px black;
			}		

			/* Style the tab content */
			.tabcontent 
			{				
				display: none;
				background-color: snow;
				padding: 20px;
				padding-top: 70px;
				box-shadow: 5px 5px 10px rgba(0,0,0,0.5);
				text-align: center;
			}
			
			h1
			{
				text-align: center;
				font-style: italic;
				font-weight: bold;
			}
			
			h2
			{
				text-align: center;
				font-style: italic;
				font-weight: bold;
			}
			
			/* Style the input */
			.wrap, .ParentWrap
			{
				width: 100%;
				margin-left: auto;
				margin-right: auto;
				background: white;
				padding: 30px;
				box-shadow: 0 0 10px rgba(0,0,0,0.2);
				border-radius: 10px;
			}
			
			.ParentWrap
			{				
				display: flex;
				flex-direction: row;
				flex-wrap: wrap;
				width: 100%;
			}
			
			.in-wrap, .layout-wrap
			{
				width: 100%;
				margin-left: auto;
				margin-right: auto;
				margin-bottom: 20px;
				background-image: linear-gradient(35deg, #E1F2FF, snow);
				height: auto;
				padding: 20px;
				box-shadow: 0 0 10px rgba(0,0,0,0.2);
				border-radius: 10px;
			}
			
			.layout-wrap
			{	
				flex: 30%;
				margin: 20px;
			}
			
			.wrap .InputText, .wrap2 .InputText
			{				
				height: 60px;
				width: 100%;
				position: relative;
			}
			
			.wrap .InputText input, .wrap2 .InputText input
			{
				height: 100%;
				width: 100%;
				border: none;
				background-color: white;
				border-bottom: 2px solid silver;
				font-size: 16px;
				outline: none;
			}
			
			.wrap .InputText input:focus ~ label,
			.wrap .InputText input:valid ~ label, 
			.wrap2 .InputText input:focus ~ label,
			.wrap2 .InputText input:valid ~ label
			{				
				transform: translateY(-40px);
				transition: all 0.3s ease;
				color: black;
			}
			
			.wrap .InputText label, .wrap2 .InputText label
			{
				font-size: 16px;
				position: absolute;
				bottom: 10px;
				left: 0;
				color: grey;
			}
			
			.disabled ~ label
			{
				transform: translateY(-40px);
				transition: all 0.3s ease;
				color: black;
				outline: none;
			}
			
			.wrap .InputText .underline, .wrap2 .InputText .underline
			{
				position: absolute;
				bottom: 0px;
				height: 2px;
				width: 100%;				
			}

			.wrap3
			{
				width: 95%;
				margin-left: auto;
				margin-right: auto;
				background: white;
				padding: 30px;
				box-shadow: 0 0 10px rgba(0,0,0,0.2);
				border-radius: 6px;
			}
			
			.in-wrap3
			{
				width: 100%;
				margin-left: auto;
				margin-right: auto;
				margin-bottom: 20px;
				background-image: linear-gradient(35deg, #CAE9FF, #EEF8FF, snow);
				height: auto;
				padding: 20px;
				box-shadow: 0 0 10px rgba(0,0,0,0.2);
				border-radius: 10px;
			}
				
			.submit, .cancel
			{
				background-color: white;
				color: black;
				font-family: georgia,garamond,serif;
				text-align: center;
				text-decoration: none;
				padding: 10px;
				border: none;
				width: 160px;
				height: 45px;
				opacity: 60%;
				box-shadow: 0 0 10px rgba(0,0,0,0.2);
				font-size: 16px;
			}
			
			.submit:hover
			{
				background-color: #6FC4FF;
				color: white;
				transition: 0.5s;
			}
			
			.cancel:hover
			{
				background-color: red;
				color: white;
				transition: 0.5s;
			}
			
			#overlay
			{
				position: absolute;
				top: 80%;
				left: 50%;
				width: 60%;
				transform: translate(-50%, -50%);
				border: 2px solid grey;
				box-shadow: 5px 5px 10px rgba(0,0,0,0.2);
				display: none;
				z-index: 1000;
			}
			
			.wrap2
			{
				width: 90%;
				margin-left: auto;
				margin-right: auto;
				background-image: linear-gradient(180deg, #EBF2FF, snow, #FDFEFF, white);
				padding: 30px;
				box-shadow: 0 0 10px rgba(0,0,0,0.2);
			}
			
			table, th, td
			{
				border: none;
				border-collapse: collapse;
				padding: 10px;
			}
			
			table
			{
				width: 100%;
				font-size: 16px;
			}
			
			.tb_title
			{
				text-align: left;
			}
			
			.tb_image
			{
				height: 250px;
				border: solid 1px grey;
				box-shadow: 0 0 10px rgba(0,0,0,0.2);
			}
						
			.tb_publish
			{
				text-align: left;
			}
			
			.tb_content
			{
				white-space: pre-line;
				text-align: left;
				padding: 20px;
				vertical-align: top;
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
				width: 40px;
				text-align: center;
				text-decoration: none;
				font-size: 20px;
				padding: 10px;
				border: none;
				border-radius: 25%;
				box-shadow: 0 0 10px rgba(0,0,0,0.2);
			}
			
			.edit_btn:hover, .edit_btn2:hover
			{
				background-color: snow;
				color: black;
				transition: 0.5s;
			}
			
			.add_btn			
			{
				background-color: #83C2FF;
				color: white;
				text-align: center;
				text-decoration: none;
				padding: 10px;
				border: none;
				width: 200px;
				height: 50px;
				border-radius: 5px;
				opacity: 60%;
				box-shadow: 0 0 10px rgba(0,0,0,0.2);
				font-size: 20px;
				font-weight: bold;
			}
			
			.add_btn:hover
			{
				box-shadow: 5px 5px 10px rgba(0,0,0,0.2);
				opacity: 1;
				transition: 0.5s;
			}
			
			textarea
			{
				width: 100%;
				height: 200px;
				border: 2px solid #cccccc;
				padding: 5px;
				resize: none;
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
				
				<br>
				
				<div id = "Show" class = "tabcontent">	
						<button class = 'add_btn' style = "text-align:center;" onclick = "on()"><i class = 'fas fa-plus'></i> Add Post </button>
						<br><br>
					<div class = "wrap3">
					<?php
						$result = mysqli_query($connected, "select * FROM community WHERE com_status = 'Pending' order by com_published ASC");						
						$rowcount = mysqli_num_rows($result);
							
						if($rowcount == 0)
						{								
							echo "<center><h3 style = 'font-size:25px;'><b>There is no Pending Post</b></h3></center>";								
						}
						else
						{	
						
							while($row = mysqli_fetch_array($result))
							{	
					
					?>
						<div class = "in-wrap3">
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
										echo "<td class = 'tb_publish'> Published on : <br>" .$row['com_published']. "</td>";
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
						}
					?>
					</div>
				</div>

				<div id = "Insert" class = "tabcontent">
					<h1>Post List</h1>
					
					<div class = "ParentWrap">
					<?php
						$result = mysqli_query($connected,"select * FROM community WHERE com_status = 'Approved' ORDER BY com_published DESC");
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
						<div class = "layout-wrap">								
						
					<?php 							
								echo "<table>";
									echo "<tr>";
										echo "<th colspan = 2 style = 'text-align:right;'><a href = 'com_show.php?id=".$row['com_id']."'><button class = 'edit_btn2' onclick = 'on2()'><i class = 'fa fa-eye'></i></button></a>";
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
					<div class = "wrap2" style = "width:100%;">
						<form method = "post" action = "com_insert.php" enctype = "multipart/form-data">
							<h2>Create Community Post</h2>
							 
							<hr style = "border-bottom:2px solid grey;">
						
							<div class = "InputText" style = "display:none;">
							<?php
								$value = '';
								$query = "SELECT com_id from community order by com_id DESC LIMIT 1";
								$stmt = mysqli_query($connected, $query);
								if(mysqli_num_rows($stmt) > 0) 
								{
									if ($row = mysqli_fetch_assoc($stmt))
									{
										$value = $row['com_id'];
										$value = substr($value, 3, 5);
										$value = $value + 1;
										$value = sprintf('%06u', $value);
										$value2 = $value;
									}								
								} 
								else 
								{
									$value2 = "000001";
								}
							?>
							
								<input type = "text" id = "Com_id" name = "Com_id" value = "<?PHP echo $value2; ?>" required />		
							</div>
							
							<img id = "thumb" src = "icon/NoImage.png" width = "200px" />
							<br><br>
							<label>Select File to upload : </label>
							<input class = "uploadbtn" type = "file" name = "media" onchange = "preview()"/>
							
							<br><br>
							
							<div class = "InputText">
								<input class = "disabled" type = "text" value = "<?PHP echo $value2; ?>" disabled />
								<label style = "color:black;">ID (Prefixed)</label>
							</div>
							
							<br>
							
							<div class = "InputText">
								<input type = "text" name = "Com_title" id = "Com_title" required />
								<label>Title</label>
							</div>
							
							<br><br>
							
							<label class = "InputText">Content (Please put '' when there is a apostrophe) <br> For example : There''s a Apple Pen on the Pineapple.</label><br>
							<textarea name = "Com_content" id = "Com_content" onfocus = "setbg('#E7EFFF');" onblur = "setbg('white')" required placeholder = "Enter your content here..."></textarea>
						
							<br><br>
							
							<center><button type = "submit" class = "submit" name = "addPost">POST</button>
							<button type = "reset" class = "cancel" onclick = "off()">CANCEL</button></center>
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
						document.getElementById("Com_content").style.background=color
					}
					
					function on() 
					{
						document.getElementById("overlay").style.display = "block";
					}

					function off() 
					{
						document.getElementById("overlay").style.display = "none";
					}
					
					function preview()
					{
						thumb.src = URL.createObjectURL(event.target.files[0]);
					}
				</script>
			</div>
		</div>
	</body>
</html>