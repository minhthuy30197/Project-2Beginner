<?php
session_start();
if (!isset($_SESSION["MaNH"])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>2Beginner</title>
    <link href="Image/hi.png" rel="icon" type="image/ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/speak.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
        .list-group {
            max-height: 300px;
            overflow: auto;
        }
    </style>
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
                    <div class="guide">
                        Hướng dẫn sử dụng phần nói
                    </div>
                    <div style="text-align:center;">
                        <button class="btn btn-primary" onclick="goto()">Go to my level</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php include "footer.php" ?>
    </div>
</div>

</body>
</html>

<script>
    window.onload = function () {
        getListLevels();
    }

    function goto() {
        window.location.href = "speak?level="+doing;
    }
</script>