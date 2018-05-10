<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Begin</title>
	<link href="Image/hi.png" rel="icon" type="image/ico">
	<!-- Bootstrap CSS + jQuery library -->
	<link href="https://plus.google.com/100585555255542998765" rel="publisher">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/style1.css">
	<link rel="stylesheet" href="css/stylePlayer.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/chooseLevelListen.css">
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
				 <div class="panel panel-default">
                <div class="panel-heading">List listening levels</div>
                <div class="panel-body">
                    <div class="list-group list-group-flush" id="list-level">

                    </div>
                </div>
            </div>
			</div>
			
			<div class="right col-md-9">
				<p id="guide">Let's choose the level for lessons </p>
				<form id="formChooseLvListen" action="chooseLesson.php" method="post" >
					<select name="levelListen">
						<?php
							echo "<option value=\"1\" selected=\"selected\">";
							echo "Level 1";
							echo "</option>";
								
							for ($i = 2; $i < 11; $i++) {
								echo "<option value=\"". $i. "\">";
								echo "Level ". $i;
								echo "</option>";
							}
						?>
					</select>
					
					<br />
					<input id="submitLevel" type="submit" value="Choose this level!" >
				</form>
			</div>
		</div>
		<div class="row">
			<?php include "footer.php"; ?>
		</div> 
	</div>
</body>
</html>