//file nhan 2 bien dau vao la rightAnswers va totalWords

var point = document.getElementById('point');
var isPass = document.getElementById('div-pass');

point.value = calculateRightAnswer(rightAnswers, totalWords).toString();

//Function tinh so diem theo thang 100
function calculateRightAnswer(rightAnswers, totalWords){
	var answers = Number (rightAnswers);
	var total = Number (totalWords);
	
	var percentage = answers / total * 100;
	return (Math.round(percentage));
}

/*
 * Funtion xep loai ket qua bai nghe
 */
function isLessonPassed ( point ) {
	if ( point < standard ) {
		isPass.textContent = "Better luck next time!!";
		return false;
	} else {
		if ( point == 100 ) {
			isPass.textContent = "Awesome!! Absolute point!!";
		} else {
			isPass.textContent = "Congratulations! You pass this level!";
		}
		
		return false;
		
	}
}