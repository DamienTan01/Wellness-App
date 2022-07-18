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
				width:75%;
				margin-left:auto;
				margin-right:auto;
				background: white;
				padding:30px;
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
				
			.submit
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
			
			table, th, td
			{
				border:solid 2px silver;
				border-collapse:collapse;
				padding:10px;
			}
			
			table
			{
				border:solid 2px silver;
				width:100%;
			}
			
			th
			{
				text-align:center;
			}
			
			.edit_btn			
			{
				background-color: #A99CFF;
				color: white;
				text-align: center;
				text-decoration: none;
				padding:10px;
				border:none;
				border-radius:30%;
				box-shadow:0 0 10px rgba(0,0,0,0.2);
			}
			
			.material-icons
			{
				font-size:25px;
			}
			
			.edit_btn:hover
			{
				background-color: snow;
				color: black;
				transition:0.3s;
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
				
				<div id = "Show" class = "tabcontent">
					<div class = "wrap">					
						<?php
							$result = mysqli_query($connected,"select * FROM tips");

							while($row = mysqli_fetch_array($result))
							{								
								echo $row['tip_id'];
								echo "<br>";
								echo $row['tip_title'];
								echo "<br>";
								echo $row['tip_content'];
								echo "<br>";
								echo $row['tip_media'];
								echo "<br>";
								echo $row['tip_published'];
																							
								echo "<td><center><button class = 'edit_btn'><a href = 'staff_delete.php?id=".$row['tip_id']."' onClick=\"javascript:return confirm('Are you sure you want to delete this?');\"><i class = 'material-icons'>delete</i></a></button></center></td>";
								
								echo "</tr>";
							}
							echo "</table>";
						?>
					</div>
					
					<br><br>			
				</div>

				<div id = "Insert" class = "tabcontent">
					<div class = "wrap">
						<form method = "post" action = "tip_insert.php">
							
							<h1>Tip Details</h1>
							
							<hr style = "border-bottom:2px solid grey;">
							
							<div class = "InputText" style = "display:none;">
							
							<?PHP
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
							
								<input type = "text" id = "Tip_id" name = "Tip_id" value = "<?PHP echo $value; ?>" required maxlength = "6"/>
							</div>
							
							<?php
							
							echo '<tr><td><form action="UploadFile.php" method="post" enctype="multipart/form-data">';
							echo '<h2>Select File to uploads : </h2>

								<input class = "uploadbtn" type = "file" name = "media" />
								<br><br>
								<input class = "submitbtn" type = "submit" name = "submit" value = "Upload" />
							
								</form></td></tr>';
							
							?>
							
							
							<div class = "InputText">
								<input class = "disabled" type = "text" value = "<?PHP echo $value; ?>" disabled />
								<label style = "color:black;">ID (Prefixed)</label>
							</div>
							<br><br>
						
							<div class = "InputText">
								<input type = "text" name = "Tip_title" id = "Tip_title" required />
								<label>Title</label>
							</div>
							
							<br><br>
							

								<label class = "InputText">Content</label><br>
								<textarea name = "Tip_content" id = "Tip_content" onfocus = "this.value = ''; setbg('#E7EFFF');" onblur = "setbg('white')" required >Enter your content here...</textarea>
							
							<br><br>
							
							<button type = "submit" class = "submit" name = "addTip"> Submit </button>
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
				</script>
			</div>
		</div>
	</body>
</html>