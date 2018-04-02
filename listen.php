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
	<link rel="stylesheet" href="css/style2.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
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
				<p>Listening DEMO</p>
				<div id="player-cont">
					<div class="logo">
						<img src="Image/player.png"></img>
					</div>
					<div class="player">
						<div id="trackTitle" class="track-title">Title is here</div>
						<input id="trackSlider" class="track-slider" type="range" min="0" step="1" onchange="seekTrack()" />
						<div>
							<div id="currentTime" class="current-time">00:00</div>
							<div id="duration" class="duration">00:00</div>
						</div>
						<div class="controllers">
							<img src="Image/previous.png" width="50px" onClick="previous()" />
							<img src="Image/backward.png" width="50px" onClick="decreasePlaybackRate()" />
							<img src="Image/pause.png" width="80px" onClick="playOrPause(this)" />
							<img src="Image/forward.png" width="50px" onClick="increasePlaybackRate() " />
							<img src="Image/next.png" width="50px" onClick="next()" />
							<img src="Image/volume-down.png" width="20px" />
							<input id="volumeSlider" class="volume-slider" type="range"
									min="0" max="1" step="0.01"  onchange="adjustVolume()"  />
							<img src="Image/volume-up.png" width="20px" />
						</div>
						<div id="nextTrackTitle" class="next-track">Next track: <b> The title is here ... </b></div>
					</div>
				</div>
				<script type="text/javascript" src="js/player.js"></script>
			</div>
		</div>
		<div class="row">
			<?php include "footer.php"; ?>
		</div> 
	</div>
</body>
</html>