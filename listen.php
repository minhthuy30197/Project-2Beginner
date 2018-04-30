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
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style2.css">
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
				<p><b>Listening DEMO<b></p>
				<div id="playerCont" class="first-part">	
					
					<div class="track-title-fluid"><label id="trackTitle">Track Title </label></div>		
					<input id="trackSlider" type="range" min="0" step="1" onchange="seekTrack()">
					<div>
						<div class="display current-time"><label id="currentTime">00:00</label></div>
						<div class="display duration"><label id="duration">00:00</label></div>
						<br />
					</div>   <!-- Ket thuc div chua phan tren thanh player -->
					
					<div class="controllers">
						<div class="first-part">
							<button type="button" id="playBtn" onClick="playOrPause()"/>
						</div>
						
						<div class="second-part">
							<img id="volume1" src="Image/volume-down.png" />
							<img id="volume2" src="Image/volume-up.png" />
							<input id="volumeSlider" class="volume-slider" type="range" min="0" max="1" step="0.01" onchange="adjustVolume()"  />
						</div>
					</div>
					
					<div id="nextTrackTitle" class="next-track-title">Next track: <b> The title is here ... </b></div>
				</div>
			</div>
		</div>
		<div class="row">
			<?php include "footer.php"; ?>
		</div> 
	</div>
	<script type="text/javascript" src="js/player.js"></script>
</body>
</html>