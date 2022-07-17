<?PHP
	//connect.php
	
	$host 	= "localhost";
	$user	= "root";
	$pass	= "";
	$db 	= "tween_db";
	
	$connected = mysqli_connect($host,$user,$pass,$db);
	
	if(mysqli_connect_errno())
	{
		echo "<script> alert('Connection error') </script>".mysqli_connect_error();
	}
	
	class Connect
	{
		public $base_url = 'http://localhost:8080/TweenWeb/Gitphp/Wellness-App/WebPHPCode/';
		public $connect;
		public $query;
		public $statement;
						
		function SettedUp()
		{
			$connected = mysqli_connect("localhost","root","","tween_db");
			
			$query = mysqli_query($connected, "SELECT * FROM users WHERE user_type = 'Admin'");
			
			$rowcount = mysqli_num_rows($query);
			
			if($rowcount == 0)
			{
				return false;
			}
			else
			{
				return true;
			}
		}
		
		//Check id
		function isLogin()
		{
			if(isset($_SESSION['User_ID']))
			{
				return true;
			}
			return false;
		}
	}
?>