<?php
	include('connect.php');
	session_start();
	
	$object = new Connect();
	
	if(isset($_POST["User_ID"]))
	{
		$USER_ID = $_POST['User_ID'];
		
		$query = mysqli_query($connected, "SELECT * FROM users WHERE user_id = '$USER_ID' && user_type = 'Admin'");
				
		if(mysqli_num_rows($query) == 1)
		{
			header("location:RegisterForm.php?st=failure");
			
			$_SESSION['message'] = "<script>alert('ID already exists!Please use another ID.')</script>";			
		}
		else
		{			
			$USER_id		= $_POST['User_ID'];
			$USER_type		= "Admin";
			$USERNAME		= $_POST['Username'];
			$EMAIL			= $_POST['User_email'];
			$PASSWORD		= $_POST['User_pwd'];			
			
			$query = "INSERT INTO `users`(`user_id`, `user_type`, `username`, `email`, `password`) VALUES ('$USER_id', '$USER_type', '$USERNAME', '$EMAIL', '$PASSWORD');";
			
			if(mysqli_multi_query($connected,$query))
			{
				header("location:index.php?st=success");
				$_SESSION['message'] = "<script>alert('Registered successful. You may login now.');</script>";
				$_SESSION['message'] = "Registered successful. You may login now.";
			}
			else
			{
				$_SESSION['message'] = "<script>alert('Login failed. Try again.');</script>";
				header("location:RegisterForm.php?st=failure");
			}			
		}
	}
	else
	{
		echo "<script>alert('Connect failed. Try again.')</script>";
		header("location:RegisterForm.php?st=allfailure");
	}
?>