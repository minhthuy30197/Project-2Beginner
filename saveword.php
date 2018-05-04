<?php
require 'db_config.php';
if (isset($_POST["word"])) {
    $sql = "Insert into tuvung(MaNH, Tu, NgayLuu) values (1,'".$_POST["word"]."',now())";
    $rs = $mysqli->query($sql);
    if ($rs) echo json_encode("Save successfully!");
    else echo json_encode("Can not save this word!");
}
?>