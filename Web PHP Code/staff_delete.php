<?PHP
	//staff_delete.php
	
	include('connect.php');
	
	if(isset($_GET['id']))
	{
		$delete_id = $_GET['id'];
		
		$query = "DELETE FROM users WHERE user_id = '".$delete_id."'";
		
		if(mysqli_query($connected,$query))
		{
			header("location:Staff.php?st=Deleted");
		} 
		else 
		{
			$_SESSION['message'] = "<script>alert('Delete failed. Try again.');</script>";
			header("location:Staff.php?st=failure");
		}
	}
?>