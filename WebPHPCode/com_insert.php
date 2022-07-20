<?php
	//com_insert.php
	
	include('connect.php');
	session_start();
	
	$object = new Connect();
		
	if (isset($_POST['addPost']))
	{		
		$filename 	= $_FILES['media']['name'];
		$status 	= 'Approved';
		
		if($filename != '')
		{
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			$allowed = ['mp4', 'wmv', 'avi', 'mov', 'png', 'jpg', 'jpeg', 'gif'];
			
			if(in_array($ext, $allowed))
			{
				$path = 'upload/';
				
				move_uploaded_file($_FILES['media']['tmp_name'],($path.$filename));
				
				$ID 		= $_POST['Com_id'];
				$Title 		= $_POST['Com_title'];
				$Content 	= $_POST['Com_content'];
				
				
				$query = "INSERT INTO `community`(`com_id`, `com_title`, `com_content`, `com_media`, `com_status`) VALUES ('$ID', '$Title', '$Content', '$filename', '$status')";			
				
				if(mysqli_query($connected, $query))
				{
					$_SESSION['message'] = "<script> alert('Successful! :D'); </script>";
					header("location:Community.php?st=success");
				}
				else
				{
					$_SESSION['message'] = "<script> alert('Failed! :O '); </script>";
					header("location:Community.php?st=insertfailure");
				}				
			}
			else
			{
				$_SESSION['message'] = "<script>alert('Invalid File Type ! ')</script>";
				header("location:Community.php?st=invalidfile");
			}			
		}
		else
		{
			$_SESSION['message'] = "<script>alert('Could not find the file ! ')</script>";
			header("location:Community.php?st=failure");
		}
	}
	else
	{
		$_SESSION['message'] = "<script>alert('File submit Failed')</script>";
		header("location:Community.php?st=allfailure");
	}
?>