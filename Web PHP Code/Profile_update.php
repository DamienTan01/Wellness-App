<?PHP
	//Profile_update.php
	
	include("connect.php");	
	session_start();
	
	$object = new Connect();
	
	if(isset($_SESSION['User_ID']))
	{		
		$ID 		= $_SESSION['User_ID'];
		$USERNAME	= $_POST['Username'];
		$NAME		= $_POST['User_name'];
		$EMAIL		= $_POST['User_email'];
		$PASSWORD	= $_POST['User_pwd'];
		$BIRTHDAY	= $_POST['User_birthday'];
		$GENDER		= $_POST['User_gender'];
		
		$query = "
			UPDATE `users` SET 
			`username` = '$USERNAME',
			`name` = '$NAME',
			`email` = '$EMAIL',
			`password` = '$PASSWORD',
			`dob` = '$BIRTHDAY',
			`gender` = '$GENDER' 
			WHERE user_id = '$ID'
			";
				
		if(mysqli_query($connected,$query))
		{
			header("location:Profile.php?st=success");
			$_SESSION['message'] = "<script>alert('Updated !');</script>";
		}
		else
		{
			$_SESSION['message'] = "<script>alert('Update failed. Try again.');</script>";
			header("location:Profile.php?st=failure");
		}
	}
	else
	{
		$_SESSION['message'] = "<script>alert('Connect failed. Try again.');</script>";
		header("location:Profile.php?st=failure");
	}
?>