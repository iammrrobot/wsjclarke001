function egiaztatu() {
	var boo = Boolean(true);
	var mezua = "";

	XMLHttpRequestObject = new XMLHttpRequest();
	XMLHttpRequestObject.onreadystatechange = function(){
		if (XMLHttpRequestObject.readyState==4)
		{
			var obj = document.getElementById('egoera');
			obj.innerHTML = XMLHttpRequestObject.responseText;
		}
	}

	var eposta = document.getElementById('eposta').value;
	XMLHttpRequestObject.open("GET", '../php/soapBezEgiaztatuMatrikulaAJAX.php?Eposta='+eposta, true);
	XMLHttpRequestObject.send();

	XMLHttpRequestObject2 = new XMLHttpRequest();
	XMLHttpRequestObject2.onreadystatechange = function(){
		if (XMLHttpRequestObject2.readyState==4)
		{
			var obj = document.getElementById('pegoera');
			obj.innerHTML = XMLHttpRequestObject2.responseText;
		}
	}

	var pasahitza = document.getElementById('pasahitza').value;
	XMLHttpRequestObject2.open("GET", '../php/soapBezEgiaztatuPasahitzaAJAX.php?Pasahitza='+pasahitza, true);
	XMLHttpRequestObject2.send();

	XMLHttpRequestObject3 = new XMLHttpRequest();
	XMLHttpRequestObject3.onreadystatechange = function(){
		if (XMLHttpRequestObject3.readyState==4)
		{
			var obj = document.getElementById('pid');
			obj.innerHTML = XMLHttpRequestObject3.responseText;
		}
	}
	
	var id = document.getElementById('id').value;
	XMLHttpRequestObject3.open("GET", '../php/soapBezEgiaztatuIdAJAX.php?Id='+id, true);
	XMLHttpRequestObject3.send();
	
	if (document.getElementById('egoera').innerHTML != "Erabiltzailea erregistraturik dago.") {
		mezua += "Erabiltzailea ez dago erregistratuta.\n";
		boo = false;
	}
	if (document.getElementById('pegoera').innerHTML != "Pasahitza egokia da.") {
		mezua += "Pasahitza ez da egokia, beste bat erabili.\n";
		boo = false;
	}
	if (document.getElementById('pid').innerHTML != "ERABILTZAILE BAIMENDUA.") {
		mezua += "BAIMENIK GABEKO ERABILTZAILEA.\n";
		boo = false;
	}

	if(!boo) {
		alert(mezua);
	}
	return boo;
}

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
	XMLHttpRequestObject.open("GET", '../php/soapBezEgiaztatuMatrikulaAJAX.php?Eposta='+eposta, true);
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
	XMLHttpRequestObject2.open("GET", '../php/soapBezEgiaztatuPasahitzaAJAX.php?Pasahitza='+pasahitza, true);
	XMLHttpRequestObject2.send();
}

XMLHttpRequestObject3 = new XMLHttpRequest();
XMLHttpRequestObject3.onreadystatechange = function(){
	if (XMLHttpRequestObject3.readyState==4)
	{
		var obj = document.getElementById('pid');
		obj.innerHTML = XMLHttpRequestObject3.responseText;
	}
}

function egiaztatuId() {
	var id = document.getElementById('id').value;
	XMLHttpRequestObject3.open("GET", '../php/soapBezEgiaztatuIdAJAX.php?Id='+id, true);
	XMLHttpRequestObject3.send();
}