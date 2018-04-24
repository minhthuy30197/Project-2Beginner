var str = 'a';

var output = isLetter(str);
if (output == null)
	alert("No");
else
	alert(output);


function isLetter(str) {
  return  str.match(/[0-9]/i);
}