
var selectMode = document.getElementById('choose-mode');
var selectLesson = document.getElementById('choose-lesson');
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