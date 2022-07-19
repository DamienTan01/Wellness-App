<?PHP
	//comment_delete.php
	
	include('connect.php');
	
	if(isset($_GET['id']))
	{
		$delete_id = $_GET['id'];
		
		$query = "SELECT com_id FROM comment WHERE commentID = '".$delete_id."'";
		$result = mysqli_query($connected, $query);
		$row = mysqli_fetch_array($result);
		
		$COM_ID = $row['com_id'];
		
		$query2 = "DELETE FROM comment WHERE commentID = '".$delete_id."'";
		
		if(mysqli_query($connected,$query2))
		{
			header("location:com_show.php?id=$COM_ID");
		} 
		else 
		{
			$_SESSION['message'] = "<script>alert('Delete failed. Try again.');</script>";
			header("location:com_show.php?st=failure");
		}
	}
?>