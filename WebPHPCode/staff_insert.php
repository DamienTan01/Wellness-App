<?PHP
	//staff_insert.php
	
	include('connect.php');
	session_start();
	
	$object = new Connect();
	
	if(isset($_POST["insertAdmin"]))
	{
		$USER_ID = $_POST['User_ID'];
		
		$query = mysqli_query($connected, "SELECT * FROM users WHERE user_id = '$USER_ID'");
				
		if(mysqli_num_rows($query) == 1)
		{
			header("location:Staff.php?st=failure");
			
			$_SESSION['message'] = "<script>alert('ID already exists!Please use another ID.')</script>";
		}
		else
		{			
			$USER_id		= $_POST['User_ID'];
			$USER_type		= "Admin";
			$USERNAME		= $_POST['Username'];
			$EMAIL			= $_POST['User_email'];
			$PASSWORD		= $_POST['User_pwd'];
			
			$query = "
			INSERT INTO `users`
			(`user_id`, `user_type`, `username`, `email`, `password`) 
			VALUES ('$USER_id', '$USER_type', '$USERNAME', '$EMAIL', '$PASSWORD');
			";
			
			if(mysqli_query($connected,$query))
			{
				header("location:Staff.php?st=success");
				$_SESSION['message'] = "<script>alert('Registered successful. You may ask the admin to login now.');</script>";
			}
			else
			{
				$_SESSION['message'] = "<script>alert('Register failed. Please try again.');</script>";
				header("location:Staff.php?st=failure");
			}			
		}
	}
	else
	{
		echo "<script>alert('Connect failed. Try again.')</script>";
		header("location:Staff.php?st=allfailure");
	}
?>