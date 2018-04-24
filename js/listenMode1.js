/* Quy uoc: cac tu duoc chon an di se luon la tu dau tien xuat hien
			trong list word, cac tu duoc phan cach nhau bang dau phay
*/

var paragraph = document.getElementById('paragraph');
var specialIndex = transcript.indexOf("--->");				//"--->" la doan ki tu dac biet thong bao da den phan cac tu can an
var editTranscript = "";
var listWord = [];

splitTranscipt();

//alert(listWord[2].length);
var editParagraph = makeParagraph();

paragraph.innerHTML = editParagraph;


//Function phan tach doan transcript thanh editTranscript (transcript thuc su) va listWord (chua cac tu)
function splitTranscipt(){
	editTranscript = transcript.substring(0, specialIndex);
	specialIndex += 3;
	
	//quet qua cac ki tu sai sot (neu co) de duyet den tu dau tien
	while(1)
	{
		var letter = transcript.charAt(specialIndex);
		if (letter.match(/[a-z]/i) || letter.match(/[A-Z]/i) || letter.match(/[0-9]/i))
			break;
		
		specialIndex ++;
	}
	
	//tach lay list word va phan chia cac tu vao mang listWord
	var list = transcript.substring(specialIndex, transcript.length);
	listWord = list.split(",");
}

//Function tao doan van ban co cac input nhan ki tu nhap vao
function makeParagraph(){
	var paragraph = "";
	var rawParagraph = "";
	var firstIndex = 0;
	var lastIndex = 0;
	
	//Cat doan transcript thanh 2 doan nho : doan truoc tu va doan sau tu
	//roi ghep cac doan lai voi 1 input o giua
	for (var i = 0; i < listWord.length; i++)
	{
		//Cat lay doan truoc tu
		lastIndex = editTranscript.indexOf(listWord[i]);
		paragraph += editTranscript.substring(firstIndex, lastIndex);
		
		//Chen phan tu input
		paragraph += "<input id=\"input" + i +"\" type=\"text\" style=\"width: 100px;\" >";
		
		//Cat lay doan sau tu
		firstIndex = lastIndex + listWord[i].length;
		rawParagraph = editTranscript.substring(firstIndex);
	}
	
	paragraph += rawParagraph;
	return paragraph;
}