<?php
session_start();
if ($_POST["action"] == "checklogin") {
    if (isset($_SESSION["MaNH"])) {
        echo json_encode("nh");
        exit();
    }
    if (isset($_SESSION["Admin"])) {
        echo json_encode("admin");
        exit();
    }
    echo json_encode("no_login");
    exit();
}
else
if (isset($_POST["email"]) && isset($_POST["password"])) {
    require 'db_config.php';
    $sql = "select Password,quyen,kichhoat,MaNH from dangnhap,nguoihoc where dangnhap.Username = nguoihoc.Email and dangnhap.Username = '" . $_POST["email"] . "'";
    $rs = $mysqli->query($sql);
    $rows = $rs->num_rows;
    if ($rows == 0) {
        $arr = array('msg' => "This account doesn't exist in our system!");
    } else {
        $row = $rs->fetch_row();
        if ($row[0] == $_POST["password"]) {
            if ($row[1] == 1) {
                //Admin
                $arr = array('msg' => "success", 'quyen' => 1);
            } else
                if ($row[1] == 2) {
                    //Người học
                    if ($row[2] == 0) {
                        $arr = array('msg' => "Your account hasn't been actived. Please check your email to finish your registration.");
                    } else
                        if ($row[2] == 1) {
                            $_SESSION["MaNH"] = $row[3];
                            $arr = array('msg' => "success", 'quyen' => 2);
                        }
                }
        } else {
            //Sai password
            $arr = array('msg' => 'Password is incorrect!');
        }
    }
    echo json_encode($arr);
}
?>