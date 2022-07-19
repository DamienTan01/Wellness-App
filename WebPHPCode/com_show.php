<?PHP
	//com_show.php
	
	session_start();
	
	if(isset($_GET['id']))
	{
		include('connect.php');
	
		$COM_ID 	= $_GET['id'];
		
		$query = "SELECT * FROM community WHERE com_id = '$COM_ID'";
		
		$result = mysqli_query($connected, $query);
		
		$row = mysqli_fetch_array($result);
		
		$ID 		= $row['com_id'];
		$TITLE 		= $row['com_title'];
		$CONTENT 	= $row['com_content'];
		$MEDIA 		= $row['com_media'];
		$PUBLISH 	= $row['com_published'];
		$LIKE 		= $row['com_like'];
		$USER_ID 	= $row['user_id'];		
	}
?>

<html>
	<head>
		<title>- Community Details Page -</title>	
		
		<meta charset = "UTF-8">
        <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
        <meta http-equiv = "X-UA-Compatible" content = "ie = edge">		
		
		<link rel = "shortcut icon" type = "image/png" href = "icon/Logo.png">
		<link rel = "icon" href = "icon/Logo.png">
		
		<link rel = "stylesheet" href = "https://www.w3schools.com/w3css/4/w3.css">
		<link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons">
		<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
		
		<style>
			.content
			{				
				margin:0;
				background-color:#B2D2FC;
				padding:20px;
				font-size:20px;				
				font-family:georgia,garamond,serif;
				height:100%;				
			}
			
			h1
			{
				text-align:center;
				font-style:italic;
				font-weight:bold;
			}
			
			h3
			{
				margin-left:20px;
				text-align:center;
				width: 150px;
				padding:10px;
				font-family:Times New Roman;
				font-size:25px;
				background-color: #85BAFF;
				color:white;
				border-radius:10px 0 20px;
				border:none;
				font-weight:bold;
			}
			
			table, th, td
			{
				border:solid 2px silver;
				border-collapse:collapse;
				padding:5px;
				text-align:center;
			}
			
			table
			{
				border:solid 2px silver;
				width:100%;
				font-size:20px;
			}
			
			th
			{
				text-align:center;
			}
			
			.tb_image
			{
				height:250px;
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
			
			.wrap
			{				
				margin-left:auto;
				margin-right:auto;
				background:snow;
				padding:20px;							
				box-shadow:0 0 10px rgba(0,0,0,0.2);				
			}
			
			.wrap .InputText 
			{
				height:70px;
				width:50%;
				position:relative;
				margin-left:auto;
				margin-right:auto;
			}
			
			.wrap .InputText input
			{
				height:100%;
				width:100%;
				background:snow;
				border:none;
				border-bottom:2px solid silver;
				font-size:20px;
				outline:none;
				text-align:center;
			}
			
			.wrap .InputText input:focus ~ label,
			.wrap .InputText input:valid ~ label
			{	
				transform: translateY(-40px);
				transition:all 0.3s ease;
				color:black;
				outline:none;
			}
			
			.wrap .InputText label
			{
				font-size:20px;
				position:absolute;
				bottom:10px;
				left:0;
				color:grey;
				pointer-events:none;
			}
			
			.wrap .InputText .underline 
			{
				position:absolute;
				bottom:0px;
				height:2px;
				width:100%;				
			}
			
			input::-webkit-outer-spin-button,
			input::-webkit-inner-spin-button 
			{
				display: none;
			}
			
			.back_btn
			{
				background-color: #5199F9;
				color: white;
				text-align: center;
				text-decoration: none;
				padding:10px;
				border:none;
				border-radius:50%;
				box-shadow:0 0 10px rgba(0,0,0,0.2);
			}
			
			.back_btn:hover
			{
				background-color:white;
				color: black;
				transition:0.3s;
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
			
			.edit_btn:hover
			{
				background-color: snow;
				color: black;
				transition:0.5s;
			}
		</style>
	</head>
	
	<body>
		<div class = "content">
			<div class = "wrap">
			
			<span>
			<?PHP
				if(isset($_SESSION['message']))
				{
					echo $_SESSION['message'];
				}				
				unset($_SESSION['message']);
			?>
			</span>
			
			<a href = "Community.php">
				<button class = "back_btn"><i class = 'material-icons'>arrow_back</i></button>
			</a>			
			
			<center><h1><?=$TITLE;?><br></h1></center>
			
			
			<br>
			
			<div class = "in-wrap">						
			<?php 							
				echo "<table>";
							
					echo "<tr>";
						echo "<th style = 'text-align:right;' colspan = 2><a href = 'com_delete.php?id=".$row['com_id']."' onClick=\"javascript:return confirm('Are you sure you want to delete this?');\"><button class = 'edit_btn'><i class = 'fa fa-trash'></i></button></a></th>";
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
		
	<script>		
		function on() 
		{
			document.getElementById("overlay").style.display = "block";
		}

		function off() 
		{
			document.getElementById("overlay").style.display = "none";
		}
	</script>
	</body>
</html>			