<?php
session_start();
if (!isset($_SESSION["MaNH"])) {
    header('Location: index.php');
    exit;
}
?>
<?php
require 'db_config.php';
$sql = "Update nguoihoc set DangXuatCuoi = now() where MaNH =".$_SESSION['MaNH'];
$rs = $mysqli->query($sql);
if ($rs) {
    session_destroy();
    header('Location: index.php');
}
else header('Location: home.php');;
?>