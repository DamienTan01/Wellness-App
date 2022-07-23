<?php
	session_start();
	
	include('connect.php');
	$object = new Connect();
	
	if($object->SettedUp())
	{
		header("location:".$object->base_url."index.php");
	}	
	
?>

<html>
	<head>
		<title>| Register |</title>
		<link rel = "shortcut icon" type = "image/png" href = "icon/Logo.png">
		<link rel = "icon" href = "icon/Logo.png">
		
		<style>
			body
			{
				background: linear-gradient(-50deg, #2B6AC3, #6998CC, #A3D7F9, #E3D9FF, #9A7BF7);
				background-size: 500% 500%;
				animation: gradient 6s ease infinite;
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
			
			h1
			{
				text-align: center;
				font-style: italic;
			}
			
			.title
			{
				text-align: left;
				font-style: italic;
				border-bottom: 2px solid grey;				
			}
			
			.wrap
			{
				text-align: right;
				margin-top: 20px;
				margin-left: auto;
				margin-right: auto;
				background: snow;
				padding: 20px;
				width: 75%;
				box-shadow: 0 0 10px rgba(0,0,0,0.2);
			}
			
			.wrap .InputText 
			{
				text-align: center;
				height: 70px;
				width: 50%;
				position: relative;				
			}
			
			.wrap .InputText input
			{
				height: 100%;
				width: 100%;
				background: snow;
				border: none;
				border-bottom: 2px solid silver;
				font-size: 20px;
				outline: none;				
			}
			
			.wrap .InputText input:focus ~ label,
			.wrap .InputText input:valid ~ label
			{	
				transform: translateY(-50px);
				transition: all 0.3s ease;
				color: black;
				outline: none;
			}
			
			.wrap .InputText label
			{
				font-size: 20px;
				position: absolute;
				bottom: 10px;
				left: 0;
				color: grey;
				pointer-events: none;
			}
			
			.wrap .InputText .underline 
			{
				position:absolute;
				bottom:0px;
				height:2px;
				width:100%;				
			}
			
			select
			{
				height:100%;
				width:100%;
				color:grey;
				background:snow;
				border:none;
				border-bottom:2px solid silver;
				font-size:20px;
				outline:none;
			}
			select:valid
			{
				color:black;
			}		
			
			.submit
			{
				background-color: white;
				color: black;
				font-family:georgia,garamond,serif;
				font-size:18px;
				text-align: center;
				text-decoration: none;
				padding: 15px 70px;
				border:none;
				box-shadow:0 0 10px rgba(0,0,0,0.2);
				border-radius:50px;
			}
			
			.submit:hover
			{
				background-color:#5199F9;
				color: white;
				transition:0.3s;
			}
			
			/* Style the select */
			input::-webkit-outer-spin-button,
			input::-webkit-inner-spin-button 
			{
				-webkit-appearance: none;
				margin: 0;
			}
			
			[type="radio"]:checked,
			[type="radio"]:not(:checked)
			{
				position: absolute;				
				visibility: hidden;
			}

			.checkbox-option:checked + label,
			.checkbox-option:not(:checked) + label
			{
				position: relative;
				display: inline-block;
				padding: 10px;
				width: 150px;
				font-size: 20px;
				line-height: 20px;
				letter-spacing: 1px;
				margin: 0 auto;
				margin-left: 5px;
				margin-right: 5px;
				margin-bottom: 10px;
				text-align: center;
				border-radius: 5px;
				overflow: hidden;
				cursor: pointer;
				text-transform: uppercase;
				color:#ffffff;	
				transition: all 0.3s linear; 
			}

			.checkbox-option:not(:checked) + label
			{
				background-color:#161B44;
				box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1);
			}
			
			.checkbox-option:checked + label
			{
				background-color: #9CC3FB;
				color:black;
				box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.5);
			}
			
			.checkbox-option:not(:checked) + label::before,
			.checkbox-option:checked + label::before
			{
				border-radius: 4px;
				background-image: linear-gradient(298deg, #D09CFB, #9CC3FB);
				z-index: -1;
				transition: all 0.5s linear; 
			}
			
			.checkbox-option:not(:checked) + label:hover
			{
				box-shadow: 0 5px 15px 0 rgba(0, 0, 0, 0.5);
			}
			/* End of style Select */
			
			.disabled ~ label
			{
				transform: translateY(-50px);
				transition: all 0.3s ease;
				color: black;
				outline: none;				
			}
		</style>
	</head>
	
	<body>
		<div class = "wrap">
			<form method = "POST" action = "register.php">
				<span id = "message"></span>
				<span>
					<?php
						if(isset($_SESSION['message']))
						{
							echo $_SESSION['message'];
						}				
						unset($_SESSION['message']);
					?>
				</span>
				
				<h1 class = "title">Admin Register</h1>
				
                <br>
				
				<div class = "InputText" style = "display:none;">
					<input type = "text" class = "disabled" name = "User_ID" id = "User_ID" value = "ADM000" />
				</div>
				
				<div class = "InputText">
					<input type = "text" class = "disabled" name = "User_ID" id = "User_ID" value = "ADM000" disabled />
					<label style = "color:black;">ID (Prefix : ADM000)</label>
				</div>
				
				<br><br>
				
				<div class = "InputText">
					<input type = "text" name = "Username" id = "Username" required />
					<label>Username</label>
				</div>
				
				<br><br>
				
				<div class = "InputText">
					<input type = "email" name = "User_email" id = "User_email" required />
					<label>Email Address</label>
				</div>
				
				<br><br>
				
				<div class = "InputText">
					<input type = "password" name = "User_pwd" id = "User_pwd" required />
					<label>Password</label>
				</div>
				
				<br><br><br>
						
				<input type = "submit" class = "submit" name = "submit" value = "REGISTER">
			</form>	
		</div>
	</body>
</html>