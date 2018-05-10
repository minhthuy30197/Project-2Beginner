<!DOCTYPE html>
<?php
$level = -1;
if (isset($_GET['level'])) {
    $level = $_GET['level'];
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Begin</title>
    <link href="Image/hi.png" rel="icon" type="image/ico">
    <!-- Bootstrap CSS + jQuery library -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/listen.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                    <div class="content">
                        <p id="guide">Let's choose listen mode and lesson!</p>
                        <form id="formChooseLesson" action="" method="get" onsubmit="editAction()">
                            <p>Choose listen mode: </p>
                            <select id="choose-mode" name="mode">
                                <option value="Mode1" selected="selected">Mode 1 (Default): Fill blanks</option>
                                <option value="Mode2">Mode 2: Write what you hear</option>
                            </select>

                            <br/>
                            <input id="submitLesson" type="submit" value="Choose this mode!"/>
                            <input hidden name="inputLevel" id="inputLevel" type="text" value="<?php echo $level ?>"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php include "footer.php"; ?>
    </div>
</div>
<script type="text/javascript">
    var selectMode = document.getElementById('choose-mode');
    var selectForm = document.getElementById('formChooseLesson');

    /*
     * Funtion xac dinh action cua form dua theo mode
     */
    function editAction() {
        if (selectMode.value == "Mode1") {
            selectForm.action = "listenMode1.php";
        } else {
            selectForm.action = "listenMode2.php";
        }
    }

    window.onload = function () {
        getListLevels();
    }
</script>
</body>
</html>


