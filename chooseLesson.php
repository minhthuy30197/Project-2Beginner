<!DOCTYPE html>

<?php
	$level = -1;
	if (isset( $_POST['levelListen'] )) {
		$level = $_POST['levelListen'];
	}
	
	$connect = mysqli_connect( "localhost", "root", "" ) 
				or die( "Khong ket noi duoc mysql" );
	mysqli_query( $connect, "set name 'utf-8'" );
	mysqli_select_db( $connect, "hoctienganh" );
	mysqli_set_charset( $connect, "utf8" );
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
	<link rel="stylesheet" href="css/stylePlayer.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/chooseLesson.css">
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
				<div class="list-lesson">
					<table>
						<tr>
							<th>Index </th>
							<th>Lesson</th>
						</tr>
						<?php
							$result = mysqli_query( $connect, "select * from bainghe where Muc='".$level."'");
							if ( mysqli_num_rows( $result ) > 0 ) {
								$i = 1;
								while ( $row = mysqli_fetch_array ( $result ) ) {
									echo "<tr>";
									echo "<td>".$i."</td>";
									echo "<td>".$row['TieuDe']."</row>";
									echo "</tr>";
									
									$i++;
								}
							}
						?>
					</table>
				</div>
				<p id="guide">Let's choose listen mode and lesson!
				<div >
					<form id="formChooseLesson" action="" method="post" onsubmit="editAction()">
						<p>Choose listen mode: </p>
						<select id="choose-mode" name="choose-mode">
							<option value="Mode1" selected="selected">Mode 1 (Default): Fill blanks</option>
							<option value="Mode2">Mode 2: Write what you hear</option>
						</select>
						
						<br />
						<p>Choose lesson: </p>
						<select id="choose-lesson" name="choose-lesson">
						<?php
							$result = mysqli_query( $connect, "select * from bainghe where Muc='".$level."'");
							if ( mysqli_num_rows( $result ) > 0 ) {
								$i = 1;
								while ( $row = mysqli_fetch_array ( $result ) ) {
									echo "<option value=\"".$row['LinkAudio']."\">";
									echo $row['TieuDe'];
									echo "</option>";
								}
							}
							mysqli_close($connect);
						?>
						</select>
						
						<br />
						<input id="submitLesson" type="submit" value="Choose this lesson!" >
					</form>
				</div>
			</div>
		</div>
		<div class="row">
			<?php include "footer.php"; ?>
		</div> 
	</div>
	<script type="text/javascript" src="js/chooseLesson.js"></script>
</body>
</html>