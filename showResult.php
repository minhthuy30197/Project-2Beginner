<!DOCTYPE html>
<?php
$totalWords;
$listenResult;
$level;
$point;
$isPass;
 
if (isset($_POST['total-words'])) {
	$totalWords = $_POST['total-words'];
} else {
	$totalWords = 0;
}
 
if (isset($_POST['listen-result'])) {
	$listenResult = $_POST['listen-result'];
} else {
	$listenResult = 0;
}

if (isset($_POST['standard-pass'])) {
	$standard = $_POST['standard-pass'];
} else {
	$standard = 100;
}

if (isset($_POST['level-next'])) {
	$level = $_POST['level-next'];
} else {
	$level = 0;
}

$point = $listenResult / $totalWords * 100;
$point = round(settype($point, "float"), 0);

if ($point < $standard ) {
	$isPass = "F";
} else {
	$isPass = "T";
}
?>
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
	<link rel="stylesheet" href="css/styleShowResult.css">
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
				<div class="exercise">
						<div class="div-intro">
							<p >Your result: </p>
						</div>
						<div class="div-result">
							<label id="labelTotalWord" for="totalWord">Total words: 
								<input id="totalWord" name="totalWord" type="text" value="<?php echo $totalWords ?>" />
							</label><br />
							
							<label id="labelRightAnswer" for="rightAnswers">Right answer: 
								<input id="rightAnswers" name="rightAnswers" type="text" value="<?php echo $listenResult ?>" />
							</label><br />
							
							<label id="labelPoint" for="point">Your point: 
								<input id="point" name="point" type="text" value="<?php echo $point ?>" />
							</label><br />
						</div>
					
					<form id="formResult" action="" method="get" >
						<div id="div-pass"></div>
						<div id="next-choice">
							<div id="next-guide"></div>
							<input id="retryBtn" name="retryBtn" type="submit" value="Retry" onclick="retryFunction()" />
							<input id="nextBtn" name="nextBtn" type="submit" value="Next level" onclick="nextFunction()" />
							<input id="exitBtn" name="exitBtn" type="submit" value="Exit" onclick="exitFunction()" />
							<input hidden id="levelForNext" name="levelListen" type="text" value="" />
						</div>	
					</form>
				</div>
			</div>
		</div>
		<div class="row">
			<?php include "footer.php"; ?>
		</div> 
	</div>
	
	<script type="text/javascript"> 
		var isPassed = "<?php echo $isPass ?>";
		var updateLevel = "<?php echo $level ?>";
	</script>
	
	<script type="text/javascript" src="js/showResult.js"></script>
	
	<?php
		$MaBai = "";
		$connect = mysqli_connect( "localhost", "root", "" ) 
			or die( "Khong ket noi duoc mysql" );
		mysqli_query( $connect, "set name 'utf-8'" );
		mysqli_select_db( $connect, "hoctienganh" );
		mysqli_set_charset( $connect, "utf8" );
			
		/*Lay ma bai cua bai nghe vua thuc hien qua level */
		$sql = "select * from bainghe where Muc='" . $level . "'";
		$result = mysqli_query($connect, $sql);
		
		if (mysqli_affected_rows($connect) > 0) {
			$row = mysqli_fetch_array($result);
			$MaBai = $row['MaBai'];
		} else {
			mysqli_error($connect);
		}
		
		/*Lay thoi gian hien tai*/
		date_default_timezone_set('Asia/Calcutta');
		$date1 = date("Y-m-d H:i:s"); 
		
		/*Ghi lai ket qua lam bai vao CSDL voi MaNH = 1 */
		$sql = "insert into lichsunghe (MaNH, MaBai, Diem, ThoiGian, isPassed) ";
		$sql .= "values(1, '". $MaBai . "', '". $point . "','". $date1 . "', '". $isPass . "')";
		mysqli_query($connect, $sql);
		
		//ha level xuong muc duoi level chua hoan thanh
		if ($isPass == "F") {
			$level--;
		}
		
		$MaNH = 1;
		/*Thay doi level nghe cua nguoi hoc dua theo ket qua lam bai */
		$sql = "update nguoihoc set LevelListen='". $level. "' where MaNH='" .$MaNH."'";
		$result = mysqli_query($connect, $sql);
		if (mysqli_affected_rows($connect) <= 0) {
			mysqli_error($connect);
		}
	?>

</body>
</html>