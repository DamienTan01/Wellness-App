<?PHP
	//comment_delete.php
	
	include('connect.php');
	
	if(isset($_GET['id']))
	{
		$delete_id = $_GET['id'];
		
		$query = "DELETE FROM comment WHERE commentID = '".$delete_id."'";
		
		if(mysqli_query($connected,$query))
		{
			header("location:com_show.php?st=Deleted");
		} 
		else 
		{
			$_SESSION['message'] = "<script>alert('Delete failed. Try again.');</script>";
			header("location:com_show.php?st=failure");
		}
	}
?>