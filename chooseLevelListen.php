<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Begin</title>
    <link href="Image/hi.png" rel="icon" type="image/ico">
    <!-- Bootstrap CSS + jQuery library -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/listen.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/stylePlayer.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/chooseLevelListen.css">
    <style>
        #list-level {
            min-height: 150px;
        }
    </style>
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
                        Hướng dẫn sử dụng phần nghe
                    </div>
                    <div style="text-align:center;">
                        <button class="btn btn-primary" onclick="goto()">Go to my level</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php include "footer.php"; ?>
    </div>
</div>
</body>
</html>

<script>
    window.onload = function () {
        getListLevels();
    }

    function goto() {
        window.location.href = "chooseMode.php?level="+doing;
    }
</script>