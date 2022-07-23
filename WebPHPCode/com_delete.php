<?PHP
	//com_delete.php
	
	include('connect.php');
	session_start();
	
	if(isset($_GET['id']))
	{
		$delete_id = $_GET['id'];
		
		$query = "
		DELETE FROM community WHERE com_id = '".$delete_id."';
		
		DELETE FROM comment WHERE com_id = '".$delete_id."';
		";
		
		if(mysqli_multi_query($connected,$query))
		{
			$_SESSION['message'] = "<script>alert('Deleted. :)');</script>";
			header("location:Community.php?st=Deleted");
		} 
		else 
		{
			$_SESSION['message'] = "<script>alert('Delete failed. Try again.');</script>";
			header("location:Community.php?st=failure");
		}
	}
?>