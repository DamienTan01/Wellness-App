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
				background-color:snow;				
			}
			
			.content
			{
				padding:5px;
				background-color:#B2D2FC;
				height:100%;
				padding-top:6%;
				font-size:20px;
				font-family:georgia,garamond,serif;
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
				background-image: linear-gradient(0deg, #85FFFF, snow);
				position:fixed;
				height:10%;
				width:100%;
				font-size:20px;
				padding:10px;
				box-shadow: 0 0 10px rgba(0,0,0,0.5);
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
			<a href = "Profile.php"><i class="material-icons">insert_emoticon</i> 
			<?PHP
				if($name != null)
				{
					$user_name = $name;
				}
				else
				{
					$user_name = $ID;
				}
				echo $user_name;
			?>
			</a>
			
			<a href = "Staff.php"><i class = "material-icons">	people</i>  Admin</a>
			<a href = "Tips.php"><i class = "material-icons">		airline_seat_legroom_normal</i>  Tips</a>
			<a href = "Community.php"><i class = "material-icons">	category</i>  Community</a>
			
			<a href = 'index.php' onClick=\"javascript:return confirm('Are you sure you want to logout ?');\"><i class='material-icons'>logout</i>  Log Out</a>
		
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