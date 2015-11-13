XMLHttpRequestObject = new XMLHttpRequest();
XMLHttpRequestObject.onreadystatechange = function(){
	if (XMLHttpRequestObject.readyState==4)
	{
		var obj = document.getElementById('egoera');
		obj.innerHTML = XMLHttpRequestObject.responseText;
	}
}

function egiaztatuMatrikula() {
	var eposta = document.getElementById('eposta').value;
	XMLHttpRequestObject.open("GET", '../lab7/php/soapBezEgiaztatuMatrikulaAJAX.php?Eposta='+eposta, true);
	XMLHttpRequestObject.send();
}

XMLHttpRequestObject2 = new XMLHttpRequest();
XMLHttpRequestObject2.onreadystatechange = function(){
	if (XMLHttpRequestObject2.readyState==4)
	{
		var obj = document.getElementById('pegoera');
		obj.innerHTML = XMLHttpRequestObject2.responseText;
	}
}

function egiaztatuPasahitza() {
	var pasahitza = document.getElementById('pasahitza').value;
	XMLHttpRequestObject2.open("GET", '../lab7/php/soapBezEgiaztatuPasahitzaAJAX.php?Pasahitza='+pasahitza, true);
	XMLHttpRequestObject2.send();
}