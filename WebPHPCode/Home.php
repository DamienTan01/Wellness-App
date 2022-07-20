<?PHP
	//Dashboard.php
	
	
    include('header.php');
	
	$object = new Connect();
	
	if(!$object->isLogin())
	{
		header("location:".$object->base_url."index.php");
	}
	
	
?>
<html>
	<head>
		<title>- Home -</title>

		<style>			
			.wrap
			{
				margin-left:auto;
				margin-right:auto;
				background:snow;
				padding:20px;
				width:95%;
				box-shadow:0 0 10px rgba(0,0,0,0.2);
				border-radius:10px;
			}
			
			h1
			{				
				font-style:italic;
				font-weight:bold;
			}
			
			h2
			{
				text-align:left;
				font-style:italic;
				font-weight:bold;				
			}
			
			.span
			{
				width: 40%;
				text-align:center;
				padding:10px;
				font-family:georgia,garamond,serif;
				font-size:30px;
				font-weight:bold;
				color:snow;
				border-radius:20px 0 10px;
				border:none;	
				box-shadow:0 5px 10px rgba(0,0,0,0.5);
			}
			
			.dttm
			{
				background-color: #85BAFF;
				color:snow;
				width: 15%;
				float:right;
				text-align:center;
				padding:5px;
				font-family:Times New Roman;
				font-size:18px;
				font-weight:bold;
				border-radius:10px 0 0 10px;
				border:none;
				box-shadow:0 5px 15px rgba(0,0,0,0.5);
			}
			
			.rpt_btn
			{
				margin-left:20px;
				margin-top:20px;
				width: 260px;
				padding:10px;
				font-family:Times New Roman;
				font-size:25px;
				background-color: #85BAFF;
				color:snow;
				outline:none;
				border-radius:10px 0 20px;
				border:none;	
				box-shadow:0 5px 10px rgba(0,0,0,0.5);
			}
			
			.rpt_btn:hover
			{
				background-color:#5199F9;
				color: white;
				transition:0.3s;
				box-shadow:0 5px 10px #0080FF;
				text-shadow:-0.5px 3px 10px black;
			}
			
			.analysis
			{
				width: 35%;
				height: 200px;
				font-family:Arial;
				font-size:25px;
				background-color: #A2BCF2;
				border-radius:30px;
				color:snow;
				outline:none;
				border:none;	
				box-shadow:0 5px 10px rgba(0,0,0,0.5);
				text-shadow:-0.5px 3px 5px black;
			}
			
		</style>
	</head>
	
	<body>
		<div class = "content">
			<div class = "wrap">
				<?PHP
					$DATETIME = date("Y-m-d");
					
					echo "<div class = 'dttm'>";
						echo "<span>Date : " .$DATETIME. "</span>";
					echo "</div>";
				?>	
				
				<h2>Pending Community Post</h2>
				<br>
				
				<?php
					$result = mysqli_query($connected,"select * FROM community WHERE com_status = 'Pending'");
					$rowcount = mysqli_num_rows($result);
					
					echo "<a href = 'Community.php'><button class = 'rpt_btn' style = 'width: 300px;'><i class = '	fas fa-upload'></i>&nbsp;&nbsp;<b>".$rowcount." &nbsp; Submissions</b></button></a>";
					echo "<a href = 'Tips.php'><button class = 'rpt_btn' style = 'width: 300px;'><i class = 'far fa-hand-point-right'></i>&nbsp;&nbsp;<b>Add Tips</b></button></a>";
				?>
				
				<hr style = "border:2px solid silver;">
				
				<div style = "text-align:center;">
				<?php
					$result = mysqli_query($connected,"select * FROM community WHERE com_status = 'Approved'");
					$rowcount = mysqli_num_rows($result);
					
					echo "<button class = 'analysis'><b>Community Post<br>".$rowcount."</b></button>";
					
					$result2 = mysqli_query($connected,"select * FROM tips ");
					$rowcount2 = mysqli_num_rows($result2);
					
					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class = 'analysis'><b>Tips Posted<br>".$rowcount2."</b></button>";
				?>
				</div>
			</div>
		</div>
	</body>
	
</html>