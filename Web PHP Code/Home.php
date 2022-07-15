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
			
			h3
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
				width: 15%;
				float:right;
				text-align:center;
				padding:5px;
				font-family:Times New Roman;
				font-size:18px;
				font-weight:italic;
				border-radius:20px 0 10px;
				border:none;	
				box-shadow:0 5px 10px rgba(0,0,0,0.5);
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
			}
			
		</style>
	</head>
	
	<body>
		<div class = "content">
			<div class = "wrap">
				<?PHP
					$DATETIME = date("Y-m-d");
					$TodayTotal = 0;
					$YesterdayTotal = 0;
					$LastWeekTotal = 0;
					$AllTotal = 0;
					
					echo "<div class = 'dttm'>";
						echo "<span>Date : " .$DATETIME. "</span>";
					echo "</div>";
				?>
				
				<br>				
				
				<h3>Pending Community Post</h3>
			<?php
				$result = mysqli_query($connected,"select * FROM community WHERE com_status = 'Pending'");
				$rowcount = mysqli_num_rows($result);
				
				echo "<a href = 'Approval.php'><button class = 'rpt_btn' style = 'width: 300px;'><i class = '	fas fa-upload'></i>&nbsp;&nbsp;<b>".$rowcount." <br> Submissions</b></button></a>";
			?>
				<hr style = "border:2px solid silver;">
						
				<?PHP						
					echo "<a href = 'AddTip.php'><button class = 'rpt_btn' style = 'width: 300px;'><i class = 'far fa-hand-point-right'></i>&nbsp;&nbsp;<b>Add Tips</b></button></a>";
				?>
			</div>
		</div>
	</body>
	
</html>