<?php
require 'db_config.php';

$TieuDe = $_POST["TieuDe"];
$Transcript = $_POST["Transcript"];
$TieuChuan = $_POST["TieuChuan"];
$NoiDung = $_POST["NoiDung"];
$sql = "INSERT INTO bainoi SELECT NULL, '$TieuDe',MAX(Muc)+1, '$Transcript', '$TieuChuan','$NoiDung'
FROM bainoi";
$result = $mysqli->query($sql) or die($conn->error);
//echo json_encode([$result]);
?>
