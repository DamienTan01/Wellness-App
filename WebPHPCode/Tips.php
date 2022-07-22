<?PHP
	//Tips.php
	
	include('header.php');
	
	$object = new Connect();
	
	if(!$object->isLogin())
	{
		header("location:".$object->base_url."index.php");
	}
?>

<html>
	<head>
		<title> - Admin Management - </title>		
		
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
			}
			
			h1
			{
				text-align: center;
				font-style: italic;
				font-weight: bold;
			}
			
			/* Style the input */
			.wrap
			{
				width: 90%;
				margin-left: auto;
				margin-right: auto;
				background: white;
				padding: 30px;
				box-shadow: 0 0 10px rgba(0,0,0,0.2);
				border-radius: 6px;
			}
			
			.in-wrap
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
			
			.wrap .InputText 
			{				
				height: 60px;
				width: 100%;
				position: relative;
			}
			
			.wrap .InputText input
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
			.wrap .InputText input:valid ~ label
			{				
				transform: translateY(-40px);
				transition: all 0.3s ease;
				color: black;
			}
			
			.wrap .InputText label
			{
				font-size: 18px;
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
			
			.wrap .InputText .underline
			{
				position: absolute;
				bottom: 0px;
				height: 2px;
				width: 100%;				
			}				
				
			.submit
			{
				background-color: white;
				color: black;
				font-family: georgia,garamond,serif;
				font-size: 16px;
				text-align: center;
				text-decoration: none;
				padding: 10px 100px;
				border: none;
				box-shadow: 0 0 10px rgba(0,0,0,0.2);
			}
			
			.submit:hover
			{
				background-color: #5199F9;
				color: white;
				transition: 0.3s;
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
			}
			
			.tb_title
			{
				text-align: left;
			}
			
			.tb_image
			{
				width: 250px;
				border: solid 1px grey;
				box-shadow: 0 0 10px rgba(0,0,0,0.2);
			}
			
			.tb_publish
			{
				text-align: right;
			}
			
			.tb_content
			{
				white-space: pre-line;
			}
			
			.edit_btn			
			{
				background-color: #A99CFF;
				color: white;
				text-align: center;
				text-decoration: none;
				padding: 10px;
				border: none;
				border-radius: 30%;
				box-shadow: 0 0 10px rgba(0,0,0,0.2);
			}
			
			.material-icons
			{
				font-size: 25px;
			}
			
			.edit_btn:hover
			{
				background-color: snow;
				color: black;
				transition: 0.3s;
			}
			
			textarea
			{
				width: 100%;
				height: 200px;
				border: 2px solid #cccccc;
				padding: 5px;
				resize: none;
			}
			
			.uploadbtn
			{
				border: dashed grey 3px;
				text-align: center;
				text-decoration: none;
				padding: 10px;
				border-radius: 10px;
				box-shadow: 0 0 10px rgba(0,0,0,0.2);
			}
			
			.uploadbtn:hover
			{
				background-color: #cccccc;
				color: black;
				transition: 0.3s;
			}
		</style>
	</head>
	
	<body>		
		<div class = "content">
			<div class = "con">
				<button class = "tablink" onclick = "openPage('Show', this, 'snow')" id = "defaultOpen">Tips</button>
				<button class = "tablink" onclick = "openPage('Insert', this, 'snow')">Add Tips</button>			

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
					<div class = "wrap">					
						<?php
							$result = mysqli_query($connected,"select * FROM tips order by tip_published DESC");
							
							$rowcount = mysqli_num_rows($result);
							
							if($rowcount == 0)
							{								
								echo "<center><h3 style = 'font-size:25px;'><b>There is no Tip added</b></h3></center>";								
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
											echo "<th colspan = 2 style = 'text-align:right;'><a href = 'tip_delete.php?id=".$row['tip_id']."' onClick=\"javascript:return confirm('Are you sure you want to delete this?');\"><button class = 'edit_btn'><i class = 'material-icons'>delete</i></button></a></th>";
										echo "</tr>";
									
										echo "<tr>";									
											echo "<th class = 'tb_title'  colspan = 2>" .$row['tip_title']. "</th>";
										echo "</tr>";
										
										echo "<tr>";
											echo '<td><img class = "tb_image" src = "upload/'.$row["tip_media"].'"></td>';
											echo '<td class = "tb_content" width = "80%">' .$row['tip_content']. '</td>';
										echo "</tr>";						
											
										echo "<tr>";
											echo "<td class = 'tb_publish' colspan = 2> Published on : " .$row['tip_published']. "</td>";
										echo "</tr>";
									echo "</table>";																
						?>
						
						</div>
						
						<?php
								}
							}
						?>
					</div>
					<br><br>			
				</div>

				<div id = "Insert" class = "tabcontent">
					<div class = "wrap">
						<form method = "POST" action = "tip_insert.php"  enctype = "multipart/form-data">
							
							<h1>Tip Details</h1>
							
							<hr style = "border-bottom:2px solid grey;">
							
							<div class = "InputText" style = "display:none;">
							
							<?php
								$value2 = '';
								$query = "SELECT tip_id from tips order by tip_id DESC LIMIT 1";
								$stmt = mysqli_query($connected, $query);
								if(mysqli_num_rows($stmt) > 0) 
								{
									if ($row = mysqli_fetch_assoc($stmt)) 
									{
										$value2 = $row['tip_id'];
										$value2 = substr($value2, 3, 5);
										$value2 = $value2 + 1;
										$value2 = sprintf('TIP%03u', $value2);
										$value = $value2; 
									}								
								} 
								else 
								{
									$value = "TIP001";
								}
							?>
							
								<input type = "text" id = "Tip_id" name = "Tip_id" value = "<?PHP echo $value; ?>" required />		
							</div>
							
							<img id = "thumb" src = "icon/NoImage.png" width = "200px" />
							<br>
							<label>Select File to upload : </label>
							<input class = "uploadbtn" type = "file" name = "media" onchange = "preview()" required />												
							
							<br>
							
							<div class = "InputText">
								<input class = "disabled" type = "text" value = "<?PHP echo $value; ?>" disabled />
								<label style = "color:black;">ID (Prefixed)</label>
							</div>
							
							<br>
						
							<div class = "InputText">
								<input type = "text" name = "Tip_title" id = "Tip_title" required />
								<label>Title</label>
							</div>
							
							<br><br>
							
							<label class = "InputText">Content (Please put '' when there is a apostrophe) <br> For example : There''s a Apple Pen on the Pineapple.</label><br>
							<textarea name = "Tip_content" id = "Tip_content" onfocus = "setbg('#E7EFFF');" onblur = "setbg('white')" required placeholder = "Enter your content here..."></textarea>
							
							<br><br>
							
							<button type = "submit" class = "submit" name = "addTip">SUBMIT</button>
						</div>
					</form>
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
					
					function preview()
					{
						thumb.src = URL.createObjectURL(event.target.files[0]);
					}
				</script>
			</div>
		</div>
	</body>
</html>