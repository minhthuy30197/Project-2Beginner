<?php
session_start();
if (!isset($_SESSION["MaNH"])) {
    header("Location: index.php");
    exit();
}
require 'db_config.php';
if (isset($_POST["old"]) && isset($_POST["new"])) {
    $sql = 'select Password,Username from dangnhap,nguoihoc where dangnhap.Username = nguoihoc.Email and MaNH = '.$_SESSION["MaNH"];
    $rs = $mysqli->query($sql);
    $tmp = $rs->fetch_row();
    if ($tmp[0] != $_POST["old"]) $result = "Your old password is incorrect!";
    else {
        $user = $tmp[1];
        $sql = "update dangnhap set Password = '".$_POST["new"]."' where Username = '".$user."'";
        $rs = $mysqli->query($sql);
        if ($rs) $result = "success";
        else $result = "Can't change password. Try again!";
    }
    echo json_encode($result);
}
?>