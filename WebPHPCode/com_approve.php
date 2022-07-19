<?PHP
	//com_approve.php
	
	include("connect.php");	
	session_start();
	
	$object = new Connect();
	
	if(isset($_GET['id']))
	{
		$ID 		= $_GET['id'];
		$COMSTATUS 	= "Approved";
		
		$query = "UPDATE `community` SET `com_status` = '$COMSTATUS' WHERE com_id = '$ID'";
		
		if(mysqli_query($connected,$query))
		{
			header("location:Community.php?st=success");
			$_SESSION['message'] = "<script>alert('Succesfully Approved !');</script>";
		}
		else
		{
			$_SESSION['message'] = "<script>alert('Failed to approve. Try again.');</script>";
			header("location:Community.php?st=failure");
		}
	}
?>