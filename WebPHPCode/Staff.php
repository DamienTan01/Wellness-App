<?PHP
	//Staff.php
	
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
				font-weight:bold;
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
				text-shadow:-0.5px 1px black;
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
			
			h2
			{
				font-style:italic;
				font-weight:bold;
			}
			
			/* Style the input */
			.wrap
			{
				width:95%;
				margin-left:auto;
				margin-right:auto;
				background: white;
				padding:30px;
				box-shadow:0 0 10px rgba(0,0,0,0.2);
				border-radius:6px;
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
				font-size:16px;
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
				font-size:16px;
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
				background-color: #F1F6FF;
				color: black;
				font-family:georgia,garamond,serif;
				font-size:16px;
				text-align: center;
				text-decoration: none;
				padding: 10px 100px;
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
			
			
		</style>
	</head>
	
	<body>		
		<div class = "content">
			<div class = "con">
				<button class = "tablink" onclick = "openPage('Show', this, 'snow')" id = "defaultOpen">Admin List</button>
				<button class = "tablink" onclick = "openPage('Insert', this, 'snow')">Register Admin</button>			
				<br>
				
				<span>
					<?PHP
						if(isset($_SESSION['message']))
						{
							echo $_SESSION['message'];
						}				
						unset($_SESSION['message']);
					?>
				</span>
				
				<div id="Show" class="tabcontent">
					<div class = "wrap">
					
					<h2>Admins</h2>
					
						<?php
							$result = mysqli_query($connected,"select * FROM users WHERE user_type = 'Admin'");

							echo "<table class = 'shown'>
							<tr>
								<th width='5%'>ID</th>
								<th width='15%'>Username</th>
								<th width='15%'>Email</th>
								<th width='15%'>Name</th>
								<th width='10%'>Date of Birth</th>
								<th width='10%'>Gender</th>
								<th width='5%' colspan = '2'>Action</th>
							</tr>";

							while($row = mysqli_fetch_array($result))
							{
								echo "<tr>";
								echo "<td width='20px'>" . $row['user_id'] . "</td>";
								echo "<td>" . $row['username'] . "</td>";
								echo "<td>" . $row['email'] . "</td>";
								echo "<td>" . $row['name'] . "</td>";
								echo "<td>" . $row['dob'] . "</td>";
								echo "<td>" . $row['gender'] . "</td>";
																							
								echo "<td><center><button class = 'edit_btn'><a href = 'staff_delete.php?id=".$row['user_id']."' onClick=\"javascript:return confirm('Are you sure you want to delete this?');\"><i class = 'material-icons'>delete</i></a></button></center></td>";
								
								echo "</tr>";
							}
							echo "</table>";
					  
						?>
					</div>
					
					<br><br>			
				</div>

				<div id = "Insert" class = "tabcontent">
					<div class = "wrap">
						<form method = "post" action = "staff_insert.php">
							
							<h1>Admin Details</h1>
							
							<hr style = "border-bottom:2px solid grey;">
							
							<div class = "InputText" style = "display:none;">
							
							<?PHP
								$value2 = '';
								$query = "SELECT user_id from users WHERE user_type = 'Admin' order by user_id DESC LIMIT 1";
								$stmt = mysqli_query($connected, $query);
								if(mysqli_num_rows($stmt) > 0) 
								{
									if ($row = mysqli_fetch_assoc($stmt)) 
									{
										$value2 = $row['user_id'];
										$value2 = substr($value2, 3, 5);
										$value2 = $value2 + 1;
										$value2 = sprintf('ADM%03u', $value2);
										$value = $value2; 
									}
								} 
								else 
								{
									$value2 = "ADM001";
									$value = $value2;
								}
							?>
							
								<input type = "text" id = "User_ID" name = "User_ID" value = "<?PHP echo $value; ?>" required maxlength = "6"/>
							</div>
							
							<div class = "InputText">
								<input class = "disabled" type = "text" value = "<?PHP echo $value; ?>" disabled />
								<label style = "color:black;">ID (Prefixed)</label>
							</div>
							<br>
						
							<div class = "InputText">
								<input type = "text" name = "Username" id = "Username" required />
								<label>Username</label>
							</div>
							
							<br>
							
							<div class = "InputText">
								<input type = "text" name = "User_email" id = "User_email" required />
								<label>Email Address</label>
							</div>
							
							<br>
							
							<div class = "InputText">
								<input type = "password" name = "User_pwd" id = "User_pwd" required />
								<label>Password</label>
							</div>
							
							<br><br>
							
							<button type = "submit" class = "submit" name = "insertAdmin">ADD</button>
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
				</script>
			</div>
		</div>
	</body>
</html>