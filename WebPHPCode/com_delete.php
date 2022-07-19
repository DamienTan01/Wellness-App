<?PHP
	//com_delete.php
	
	include('connect.php');
	
	if(isset($_GET['id']))
	{
		$delete_id = $_GET['id'];
		
		$query = "DELETE FROM community WHERE com_id = '".$delete_id."'";
		
		if(mysqli_query($connected,$query))
		{
			header("location:Community.php?st=Deleted");
		} 
		else 
		{
			$_SESSION['message'] = "<script>alert('Delete failed. Try again.');</script>";
			header("location:Community.php?st=failure");
		}
	}
?>