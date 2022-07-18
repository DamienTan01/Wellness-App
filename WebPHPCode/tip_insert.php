<?php
	//tip_insert.php
	
	include('connect.php');
	session_start();
	
	$object = new Connect();
		
	if (isset($_POST['addTip']))
	{		
		$filename 	= $_FILES['media']['name'];
		
		if($filename != '')
		{
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			$allowed = ['mp4', 'wmv', 'avi', 'mov', 'png', 'jpg', 'jpeg', 'gif'];
			
			if(in_array($ext, $allowed))
			{
				$path = 'upload/';
				
				move_uploaded_file($_FILES['media']['tmp_name'],($path . $filename));
				
				$ID 		= $_POST['Tip_id'];
				$Title 		= $_POST['Tip_title'];
				$Content 	= $_POST['Tip_content'];
				
				$query = "
				INSERT INTO `tips`
				(`tip_id`, `tip_title`, `tip_content`, `tip_media`) 
				VALUES ('$ID', '$Title', '$Content', '$filename')
				";			
				
				if(mysqli_query($connected, $query))
				{
					$_SESSION['message'] = "<script> alert('Successful! :D'); </script>";
					header("location:Tips.php?st=success");
				}
				else
				{
					$_SESSION['message'] = "<script> alert('Failed! :O '); </script>";
					header("location:Tips.php?st=insertfailure");
				}				
			}
			else
			{
				$_SESSION['message'] = "<script>alert('Invalid File Type ! ')</script>";
				header("location:Tips.php?st=invalidfile");
			}			
		}
		else
		{
			$_SESSION['message'] = "<script>alert('Could not find the file ! ')</script>";
			header("location:Tips.php?st=failure");
		}
	}
	else
	{
		$_SESSION['message'] = "<script>alert('File submit Failed')</script>";
		header("location:Tips.php?st=allfailure");
	}
?>