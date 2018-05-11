<!DOCTYPE html>

<?php
	$level = $_GET['inputLevel'];

	$connect = mysqli_connect( "localhost", "root", "" )
				or die( "Khong ket noi duoc mysql" );
	mysqli_query( $connect, "set name 'utf-8'" );
	mysqli_select_db( $connect, "hoctienganh" );
	mysqli_set_charset( $connect, "utf8" );

	$sql = "select * from bainghe where Muc='" . $level . "'";
	$result = mysqli_query($connect, $sql);

	if (mysqli_num_rows ($result) > 0 ) {
		$row = mysqli_fetch_array($result);

		$audioName = $row['TieuDe'];
		$audioLink = $row['LinkAudio'];
		$transcript = $row['Transcript'];
		$standard = $row['TieuChuan'];
		$hiddenWords = $row['HiddenWords'];
	}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Begin</title>
    <link href="Image/hi.png" rel="icon" type="image/ico">
    <!-- Bootstrap CSS + jQuery library -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/stylePlayer.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styleListenMode2.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/listen.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php include "head.php" ?>
<div class="container-fluid main-container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">List speaking levels</div>
                <div class="panel-body">
                    <div class="list-group list-group-flush" id="list-level">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php include "player.php"; ?>

                    <br/><br/>
                    <div class="exercise">
                        <form action="showResult.php" method="post" onsubmit="checkSentences()">
                            <p class="guide">Write the setences you hear:</p>
                            <div class="write-sentences">
                                <textarea id="textarea" cols="100" rows="3" class="sentences-input"></textarea>
                            </div>
                            <div class="wrapper">
                                <input type="submit" class="submitBtn" value="Submit"/>
                            </div>
                            <input hidden id="totalWords" name="total-words" type="text" value=""/>
                            <input hidden id="listenResult" name="listen-result" type="text" value=""/>
							<input hidden id="standardPass" name="standard-pass" type="text" value="<?php echo $standard; ?>" />
							<input hidden id="levelForNext" name="level-next" type="text" value="<?php echo $level; ?>" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php include "footer.php"; ?>
    </div>
</div>

	<script type="text/javascript">
		var audioLink = "<?php echo $audioLink ?>";
		var transcript = "<?php echo $transcript ?>";
		var audioName = "<?php echo $audioName ?>";
	</script>


	<script type="text/javascript" src="js/player.js"></script>
	<script type="text/javascript" src="js/listenMode2.js"></script>
</body>
</html>