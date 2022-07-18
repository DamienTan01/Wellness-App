<?PHP
	//tip_delete.php
	
	include('connect.php');
	
	if(isset($_GET['id']))
	{
		$delete_id = $_GET['id'];
		
		$query = "DELETE FROM tips WHERE tip_id = '".$delete_id."'";
		
		if(mysqli_query($connected,$query))
		{
			header("location:Tips.php?st=Deleted");
		} 
		else 
		{
			$_SESSION['message'] = "<script>alert('Delete failed. Try again.');</script>";
			header("location:Tips.php?st=failure");
		}
	}
?>