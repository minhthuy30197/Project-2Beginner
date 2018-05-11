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