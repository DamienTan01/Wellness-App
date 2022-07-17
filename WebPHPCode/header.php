<?PHP
	//header.php

	session_start();
	include('connect.php');
	
	$ID = $_SESSION['User_ID'];
							
	$query = "SELECT * FROM users WHERE user_id = '$ID'";
	$result = mysqli_query($connected, $query);
	$row = mysqli_fetch_assoc($result);
	
	$name 		= $row['username'];
	
?>
<html>
	<head>
		<meta charset = "UTF-8">
        <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
        <meta http-equiv = "X-UA-Compatible" content = "ie = edge">
		
		
		<link rel = "shortcut icon" type = "image/png" href = "icon/Logo.png">
		<link rel = "icon" href = "icon/Logo.png">
		<link rel = "stylesheet" href = "https://www.w3schools.com/w3css/4/w3.css">
		<link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons">
		<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
		
		<style>
			body
			{
				background-color:#EFFCFF;
			}
			
			.content
			{
				padding:5px;				
				height:100%;
				padding-top:6%;
				font-size:20px;
				font-family:georgia,garamond,serif;
				
				background-image: url(icon/background.png);
				background-repeat: no-repeat;
				background-size: cover;
			}
			
			.Scrollbtn
			{
				opacity:0;
				display:float;
				position: fixed;
				bottom: 20px;
				right: 30px;
				z-index: 99;
				font-size: 18px;
				border: none;
				outline: none;
				background-color: black;
				color: white;
				cursor: pointer;
				padding: 15px;
				border-radius: 100%;				
			}
			
			.Scrollbtn:hover
			{
				background-color: white;
				color: black;				
				opacity:80%;
				box-shadow: 0 0 10px rgba(0,0,0,0.5);
			}		
			
			.navbar
			{				
				font-family:georgia,garamond,serif;
				text-align:left;
				background-color:#85FFFF;
				background-image: linear-gradient(-35deg, #C6BFFF, snow);
				position:fixed;
				height:10%;
				width:100%;
				font-size:20px;
				padding:10px;
				box-shadow: 0 0 10px rgba(0,0,0,0.5);
				
				z-index:999;
			}

			.navbar a 
			{
				font-weight:bold;
				text-decoration:none;				
				color:grey;
				text-align:left;
				padding:20px;
			}

			.navbar a:hover
			{
				box-shadow: 0 0 50px #CCC5FF;
				text-shadow:-0.5px 1px black;
				background-color:snow;
				transition: 0.3s;
				border-radius:20px;
			}		
		</style>
	</head>

	<body>	
		<div class = "navbar">
			<a href = "Home.php"><img class = "logo" src = "icon/Logo.png" width = "50"></a>
			<a href = "Profile.php"><i class="far fa-meh-blank"></i> &nbsp;&nbsp;<?PHP echo $name; ?>
			</a>
			
			<a href = "Staff.php"><i class = "far fa-grimace"></i>&nbsp;&nbsp;Admin</a>
			<a href = "Tips.php"><i class = "fa fa-bookmark"></i>&nbsp;&nbsp;Tips</a>
			<a href = "Community.php"><i class = "fas fa-bullhorn"></i>&nbsp;&nbsp;Community</a>
			<a href = "Achievement.php"><i class = "fas fa-certificate"></i>&nbsp;&nbsp;Achievement</a>
			
			<a href = "index.php" onclick = "return confirm('Are you sure you want to logout ?')">Log Out &nbsp;&nbsp;<i class = "fas fa-sign-out-alt"></i></a>
		
		</div>
			
			<a class = "Scrollbtn" id = "Scrollbtn" onclick = "window.scrollTo({top: 0, behavior: 'smooth'});">
				<i class = "material-icons">		publish</i>
			</a>
			
	
		<script>
			var Scrollbtn = document.getElementById("Scrollbtn");
			window.onscroll = function()
			{
				scrollFunction()
			};

			function scrollFunction() 
			{
				if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) 
				{
					Scrollbtn.style.opacity = "1";
					Scrollbtn.style.transition = "0.5s";
				} 
				else
				{
					Scrollbtn.style.opacity = "0";					
				}
			}
		</script>	
	</body>
</html>