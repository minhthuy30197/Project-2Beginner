<!DOCTYPE html>
<html lang="en">

<?php
	$level = $_POST['level'];
	$path = "Audio" . $level;
	
	$tracks = array();
	if ($handle = opendir($path)) 
	{
		while (($file = readdir($handle)) !==  false) 
		{
			array_push($tracks, $file);
		}
    closedir($handle);
	}
	array_splice($tracks, 0, 2);		//co 2 gia tri dau la '.' va '..' (li do chua ro) can bi loai bo
?>
<head>
	<meta charset="UTF-8">
	<title>Begin</title>
	<link href="Image/hi.png" rel="icon" type="image/ico">
	<!-- Bootstrap CSS + jQuery library -->
	<link href="https://plus.google.com/100585555255542998765" rel="publisher">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/style1.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/chooseLevel.css">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="container">
		<div class="row">
			<?php include "head.php"; ?>
		</div>
		<div class="row">
			<div class="topnav" id="myTopnav">
				<a href="#home" class="active"><img src="Image/home.png" class="img-responsive" alt=""></a>
				<a href="#news">News</a>
				<a href="#contact">Contact</a>
				<a href="#about">About</a>
				<a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
			</div>
		</div>
		<div class="row content">
			<div class="left col-md-3">
				<!-- Lo trinh hoc -->
			</div>
			
			<div class="right col-md-9">
				<h3>List of lessons: </h3><br />
				<!-- doi hoan thanh cac mode thi xu ly tiep -->
			</div>
		</div>
		<div class="row">
			<?php include "footer.php"; ?>
		</div> 
	</div>
</body>
</html>