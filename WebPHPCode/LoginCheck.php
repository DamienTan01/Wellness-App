<?PHP	
	include("connect.php");	
	session_start();
	
	$object = new Connect();
	
	if(isset($_POST["Sign"]))
	{
		$Id 		= $_POST['User_ID'];
		$password 	= $_POST['User_pwd'];
		
		$query = mysqli_query($connected,"select * from users where user_id = '$Id' && password = '$password'");
		
		if(mysqli_num_rows($query) == 0)
		{
			$_SESSION['message'] = "Login failed. Try again.";
			header("location:index.php?st=Wrong-ID-or-Password");
		}
		else
		{		
			$row = mysqli_fetch_array($query);
			$_SESSION['User_ID'] = $row['user_id'];
			header("location:Home.php");
		}
	}
?>