<?php
session_start();
require 'db_config.php';
if ($_POST["action"] == "getlist") {
    $arr = [];
    $count = 0;
    $sql = 'select Muc, isPassed from lichsunghe,bainghe where bainghe.MaBai = lichsunghe.MaBai and  ThoiGian in (select max(ThoiGian) from lichsunghe where MaNH = '.$_SESSION["MaNH"].' group by MaNH, MaBai)';
    $rs = $mysqli->query($sql);
    if ($rs->num_rows != 0) {
        while ($row = $rs->fetch_row()) {
            $arr[$row[0]] = $row[1];
            $count++;
        }
    }
    $highlevel = $count;
    $sql = 'select Muc from bainghe where Muc > ' . $highlevel;
    $rs = $mysqli->query($sql);
    if ($rs->num_rows > 0)
        while ($row = $rs->fetch_row()) {
            $arr[$row[0]] = 'F';
            $count++;
        }
    $sql = 'select levellisten from nguoihoc where MaNH = '.$_SESSION["MaNH"];
    $rs = $mysqli->query($sql);
    $row = $rs->fetch_row();
    $level = $row[0];
    if (!isset($_POST["level"])) $result->type = 1;
    else {
        $sql = 'select MaBai from bainghe where Muc = ' . $_POST["level"];
        $rs = $mysqli->query($sql);
        $row = $rs->num_rows;
        if ($row == 0) $result->type = 1;
        else {
            if ($level < $_POST["level"]) $result->type = 2;
            else
                if ($level > $_POST["level"]) $result->type = 3;
                else $result->type = 4;
        }
    }
    $result->levellisten = $level;
    $result->levels = $arr;
    $result->count = $count;
    echo json_encode($result);
}
?>