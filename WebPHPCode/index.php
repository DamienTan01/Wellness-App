<?php
	//index.php
	
	include("connect.php");
	
	session_start();
	
	$object = new Connect();
		
	if(!$object->SettedUp())
	{
		header("location:".$object->base_url."RegisterForm.php");
	}
?>

<!DOCTYPE html>
<html>
	<head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
        <meta http-equiv = "X-UA-Compatible" content = "ie = edge">
		
        <title>| Tween Wellness - Login |</title>
		
        <link rel = "stylesheet" type = "text/css" href = "css/login.css">
        <link rel = "shortcut icon" type = "image/png" href = "icon/Logo.png">
		
        <style>
            body 
			{
                background: linear-gradient(-30deg, #2B6AC3, #6998CC, #A3D7F9, #D3F3FF, #FEFE75, #F6DD40);
				background-size: 500% 500%;
				animation: gradient 8s ease infinite;
				font-family: Gill Sans MT;
            }
			
			@keyframes gradient 
			{
				0% 
				{
					background-position: 0% 50%;
				}
				50%
				{
					background-position: 100% 50%;
				}
				100%
				{
					background-position: 0% 50%;
				}
			}
			
			.biglogin
			{
				margin-top: 7%;
				margin-bottom: auto;
				margin-left: 18vw;
				margin-right: 18vw;
				border: 0.3vw solid white;
				border-radius: 6px;
				background-image: url(icon/bg.png);
				background-repeat: no-repeat;
				background-size: cover;
				text-align: center;
			}
			
			.icon
			{
				text-align: center;
			}
			
			.inline
			{
				display: inline-block;
				padding: 5vw;
				font-size: 1.3vw;
			}
			
			select
			{
				background-color: #FFFEF6;
				border: none;
				border-radius: 4px;
				padding: 0.2vw;
				font-size: 1.2vw;
				font-family: Gill Sans MT;
			}
			
			.wrap
			{
				padding-left:auto;
				padding-right:auto;
			}		
			
			.wrap .InputText 
			{
				background:transparent;
				text-align:center;				
				height:50px;
				width:100%;
				position:relative;
			}
			
			.wrap .InputText input
			{
				height:100%;
				width:100%;
				background:transparent;
				border:none;
				padding-bottom:0px;
				border-bottom:2px solid silver;
				font-size:20px;
				outline:none;
			}
			
			.wrap .InputText input:focus ~ label,
			.wrap .InputText input:valid ~ label
			{	
				transform: translateY(-50px);
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
			
			.submit
			{
				outline: none;
				padding: 0.2vw;
				border-radius: 100px;
				border: none;
				background-color: #1E6CA2;
				color: #FFFEF0;
				box-shadow:0 0 10px rgba(0,0,0,0.2);
				text-align: center;
				font-family: Gill Sans MT;
				font-size: 20px;
				padding: 10px 40px;
				width: 75%;
				text-align: center; 
				text-transform: uppercase;
				font-weight: bold;
				-webkit-transition: all 0.2s;
				   -moz-transition: all 0.2s;
						transition: all 0.2s;						
			}
			
			.submit:hover 
			{
				border-color: #FFFEF0;
				background-color: #5FA7D8;
				font-family: Gill Sans MT;
			}		
			
        </style>
    </head>
	
	<body>
	
		<?PHP
			if(isset($_SESSION['status']))
			{
				echo "<h5 class = 'alert alert-success'>".$_SESSION['status']."</h5>";
				unset($_SESSION['status']);
			}
		?>
	
		<form method = "post" action = "LoginCheck.php" class = "biglogin">
			<div class = "inline">				
				<h1 style = "text-align: center; text-transform: uppercase;">Admin Login</h1>
			</div>		

			<div class = "inline">
				<div class = "wrap">
					<form>
						<div class = "InputText">
							<input type = "text" name = "User_ID" id = "User_ID" required>
							<label>ID</label>
						</div>
							
						<br><br><br>
							
						<div class = "InputText">
							<input type = "password" name = "User_pwd" id = "User_pwd" required>
							<label>Password</label>
						</div>
							
							
						<br><br><br>
							
						<input type = "submit" name = "Sign" id = "Sign" value = "Log In" class = "submit">
						<br>						
					</form>
				</div>
			</div>			
		</form>
		
		<span>
			<?php
				if(isset($_SESSION['message']))
				{
					echo "<script>alert('".$_SESSION['message']."');</script>";
				}				
				unset($_SESSION['message']);
			?>
		</span>
	</body>
</html>