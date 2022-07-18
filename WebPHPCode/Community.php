<?PHP
	//Community.php
	
	include('header.php');
	
	$object = new Connect();
	
	if(!$object->isLogin())
	{
		header("location:".$object->base_url."index.php");
	}
?>

<html>
	<head>
		<title> - Community Management - </title>		
		
		<style>
			.con
			{
				padding:5%;
				padding-top:5px;
				margin-top:5px;
				margin-left:auto;
				margin-right:auto;
			}
			
			.tablink 
			{
				background-color: #CCC5FF;
				color: black;
				float: left;
				border: none;
				outline: none;
				padding: 10px;
				width: 50%;
			}

			.tablink:hover 
			{
				background-color: #E6E3FF;
				transition:0.3s;
			}		

			/* Style the tab content */
			.tabcontent 
			{				
				display: none;
				background-color: snow;
				padding:20px;
				padding-top: 70px;
				box-shadow: 5px 5px 10px rgba(0,0,0,0.5);				
			}
			
			h1
			{
				text-align:center;
				font-style:italic;
				font-weight:bold;
			}
			
			/* Style the input */
			.wrap
			{
				width:75%;
				margin-left:auto;
				margin-right:auto;
				background: white;
				padding:30px;
				box-shadow:0 0 10px rgba(0,0,0,0.2);
				border-radius:10px;
			}
			
			.wrap .InputText 
			{				
				height:75px;
				width:100%;
				position:relative;
			}
			
			.wrap .InputText input
			{
				height:100%;
				width:100%;
				border:none;
				background-color:white;
				border-bottom:2px solid silver;
				font-size:20px;
				outline:none;
			}
			
			.wrap .InputText input:focus ~ label,
			.wrap .InputText input:valid ~ label
			{				
				transform: translateY(-40px);
				transition:all 0.3s ease;
				color:black;
			}
			
			.wrap .InputText label
			{
				font-size:20px;
				position:absolute;
				bottom:10px;
				left:0;
				color:grey;
			}
			
			.disabled ~ label
			{
				transform: translateY(-40px);
				transition:all 0.3s ease;
				color:black;
				outline:none;				
			}
			
			.wrap .InputText .underline
			{
				position:absolute;
				bottom:0px;
				height:2px;
				width:100%;				
			}				
				
			.submit
			{
				background-color: white;
				color: black;
				font-family:georgia,garamond,serif;
				font-size:20px;
				text-align: center;
				text-decoration: none;
				padding: 10px 120px;
				border:none;
				box-shadow:0 0 10px rgba(0,0,0,0.2);
			}
			
			.submit:hover
			{
				background-color:#5199F9;
				color: white;
				transition:0.3s;
			}
			
			table, th, td
			{
				border:solid 2px silver;
				border-collapse:collapse;
				padding:10px;
			}
			
			table
			{
				border:solid 2px silver;
				width:100%;
			}
			
			th
			{
				text-align:center;
			}
			
			.edit_btn			
			{
				background-color: #A99CFF;
				color: white;
				width: 40px;
				margin-right: 20px;
				text-align: center;
				text-decoration: none;
				font-size: 20px;
				padding: 10px;
				border: none;
				border-radius: 25%;
				box-shadow: 0 0 10px rgba(0,0,0,0.2);
			}
			
			.edit_btn:hover
			{
				background-color: snow;
				color: black;
				transition:0.5s;
			}
			
			.approve
			{
				width: 75%;
				margin-left: auto;
				margin-right: auto;
				background: white;
				padding: 30px;
				box-shadow: 0 0 0.8vw 0 rgba(0,0,0,0.2);
				border-radius: 20px;
			}
			
			.edit_btn2			
			{
				background-color: #A99CFF;
				color: white;
				float: right;
				text-align: center;
				text-decoration: none;
				font-size: 20px;
				padding: 10px;
				border: none;
				border-radius: 30%;
				box-shadow: 0 0 10px rgba(0,0,0,0.2);
			}
			
			.edit_btn2:hover
			{
				background-color: snow;
				color: black;
				transition:0.5s;
			}
		</style>
	</head>
	
	<body>		
		<div class = "content">
			<div class = "con">
				<button class = "tablink" onclick = "openPage('Show', this, 'snow')" id = "defaultOpen">Pending Approval</button>
				<button class = "tablink" onclick = "openPage('Insert', this, 'snow')">Community</button>			

				<span>
					<?PHP
						if(isset($_SESSION['message']))
						{
							echo $_SESSION['message'];
						}				
						unset($_SESSION['message']);
					?>
				</span>
				
				<div id = "Show" class = "tabcontent">					
					<?php
						$result = mysqli_query($connected,"select * FROM community WHERE com_status = 'Pending'");

						while($row = mysqli_fetch_array($result))
						{	
							echo "<ul style = 'list-style-type:none;'>";
							echo "<li class = 'approve'>";
							echo $row['com_id'];
							echo "<br>";
							echo $row['com_title'];
							echo "<br>";
							echo $row['com_content'];
							echo "<br>";
							echo $row['com_media'];
							echo "<br>";
							echo $row['com_published'];
							
							echo "<br><br>";
							
							echo "<center><button class = 'edit_btn' id = 'com_app'><a href = 'Community_approve.php?id=".$row['com_id']."' onClick=\"javascript:return confirm('Are you sure you want to approve this?');\"><i class = 'fas fa-check'></i></a></button>";
							echo "<button class = 'edit_btn'><a href = 'staff_delete.php?id=".$row['com_id']."' onClick=\"javascript:return confirm('Are you sure you want to delete this?');\"><i class = 'fas fa-times'></i></a></button></center>";

							echo "</li></ul>";
						}
					?>
				</div>

				<div id = "Insert" class = "tabcontent">
					<h1>Post List</h1>
					
					<?php
						$result = mysqli_query($connected,"select * FROM community WHERE com_status = 'Approved'");
						
						$rowcount = mysqli_num_rows($result);
							
						if($rowcount == 0)
						{								
							echo "<center><h3 style = 'font-size:25px;'><b>There is no Community Post Record</b></h3></center>";								
						}
						else
						{						
							while($row = mysqli_fetch_array($result))
							{	
								echo "<ul style = 'list-style-type:none;'>";
								echo "<li class = 'approve'>";
								echo $row['com_id'];
								echo "<br>";
								echo $row['com_title'];
								
								echo "<br><br>";
								
								echo $row['com_published'];
								echo "<br>";
								echo $row['com_status'];
								echo "<button class = 'edit_btn2'><a href = 'staff_delete.php?id=".$row['com_id']."' onClick=\"javascript:return confirm('Are you sure you want to delete this?');\"><i class = 'material-icons'>delete</i></a></button>";

								echo "</li></ul>";
							}
						}
					?>
				</div>
				
				<script>
					function openPage(pageName,elmnt,color) 
					{
						var i, tabcontent, tablinks;
						tabcontent = document.getElementsByClassName("tabcontent");
						
						for (i = 0; i < tabcontent.length; i++) 
						{
							tabcontent[i].style.display = "none";
						}
						
						tablinks = document.getElementsByClassName("tablink");
						
						for (i = 0; i < tablinks.length; i++) 
						{
							tablinks[i].style.backgroundColor = "";
						}
						
						document.getElementById(pageName).style.display = "block";
						elmnt.style.backgroundColor = color;
					}

					document.getElementById("defaultOpen").click();
					
					function setbg(color)
					{
						document.getElementById("Tip_content").style.background=color
					}
				</script>
			</div>
		</div>
	</body>
</html>