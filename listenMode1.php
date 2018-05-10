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
	<link rel="stylesheet" href="css/styleListenMode1.css">
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
				<?php include "player.php"; ?>
				
				<br /><br />
				<div class="exercise">
					<form action="showResult.php" method="post">
						<p class="guide">Let fill the blanks:</p><br />
						<div class="fillBlanks">
							<p id="paragraph" class="transcript" readonly="readonly"></p>
						</div>
						<div class="wrapper">
							<input type="submit" class="submitBtn" value="Submit" onclick="checkWords()" />
						</div>

						<input id="totalWords" name="total-words" type="text" value="" />
						<input id="listenResult" name="listen-result" type="text" value="" />
					</form>
				</div>
			</div>
		</div>
		<div class="row">
			<?php include "footer.php"; ?>
		</div> 
	</div>
	<?php
		$audioPath = $_POST['choose-lesson'];
		$transcriptPath = substr($audioPath, 0, strlen($audioPath) - 3) . "txt";
		$transcript = "";
		
		if ($file = fopen($transcriptPath, "r"))
		{	
			$transcript .= fread($file, filesize($transcriptPath));
			fclose($file);
		}
	?>
	
	<script type="text/javascript"> 
		var audioPath = "<?php echo $audioPath ?>";
		var transcript = "<?php echo $transcript ?>";
	</script>

	<script type="text/javascript" src="js/player.js"></script>
	<script type="text/javascript" src="js/listenMode1.js"></script>

</body>
</html>