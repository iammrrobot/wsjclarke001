function ikusBalioak(){
	var sAux = "";
	var frm = document.getElementById("erregistro");
	var iza = new RegExp('[A-Z]+[a-z]* {1}[A-Z]+[a-z]* {1}[A-Z]+[a-z]*');
	var pas = new RegExp('.{6,}');
	var epo = new RegExp('[a-z]+[0-9]{3}@ikasle(\.e)hu(\.e)(s|us)');
	var tel = new RegExp('[0-9]{9}');
	//2garren opzioa:
	//var iza = /[A-Z]+[a-z]* {1}[A-Z]+[a-z]* {1}[A-Z]+[a-z]*/;
	//var pas = /.{6,}/;
	//var epo = /[a-z]+[0-9]{3}@ikasle.ehu.(es|eus)/;
	//var tel = /[0-9]{9}/;
	var boo = Boolean(true);
	for(i=0;i<5;i++) {
		if (frm.elements[i].value == null || frm.elements[i].value == "" ) {
			sAux += frm.elements[i].name+" eremua betetzea derrigorrezkoa da!!!\n";
			boo = false;
		}
	}
	if (!(pas.test(frm.elements[2].value))){
		sAux += frm.elements[2].name+"k gutxienez 6 karaktere eduki behar ditu!!\n";
		boo = false;
	}
	if (!(epo.test(frm.elements[1].value))){
		sAux += frm.elements[1].name+"k EHUko e-posta formatua eduki behar du!!\n";
		boo = false;
	}
	if (!(tel.test(frm.elements[3].value))){
		sAux += frm.elements[3].name+"k 9 zenbaki eduki behar ditu!!\n";
		boo = false;
	}
	if (!(iza.test(frm.elements[0].value))){
		sAux += frm.elements[0].name+" eremuan izen bat eta 2 abizen jarri behar dira!!\n";
		boo = false;
	}
	//2garren opzioa:
	/*if (!(frm.elements[2].value.match(pas))){
		sAux += frm.elements[2].name+"k gutxienez 6 karaktere eduki behar ditu!!\n";
		boo = false;
	}
	if (!(frm.elements[1].value.match(epo))){
		sAux += frm.elements[1].name+"k EHUko e-posta formatua eduki behar du!!\n";
		boo = false;
	}
	if (!(frm.elements[3].value.match(tel))){
		sAux += frm.elements[3].name+"k 9 zenbaki eduki behar ditu!!\n";
		boo = false;
	}
	if (!(frm.elements[0].value.match(iza))){
		sAux += frm.elements[0].name+" eremuan izen bat eta 2 abizen jarri behar dira!!\n";
		boo = false;
	}*/
	if (document.getElementById("espezialitatea").value == "Besterik") {
		if (document.getElementById("dinamikoa").value == null || document.getElementById("dinamikoa").value == "") {
			sAux += "Besterik eremua betetzea derrigorrezkoa da!!!";
			boo = false;
		}
	}
	
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
	
	if (document.getElementById('egoera').innerHTML != "Erabiltzailea erregistraturik dago.") {
		sAux += "Eposta hau ez dago Web Sistemak-en erregistratua.\n";
		boo = false;
	}
	if (document.getElementById('pegoera').innerHTML != "Pasahitza egokia da.") {
		sAux += "Pasahitza ez da egokia, beste bat erabili.\n";
		boo = false;
	}
	if (document.getElementById('pid').innerHTML != "ERABILTZAILE BAIMENDUA.") {
		sAux += "BAIMENIK GABEKO ERABILTZAILEA.\n";
		boo = false;
	}
	if (boo) {
		for(i=0;i<frm.elements.length-1;i++){
			if (!(frm.elements[i].value == "Besterik")) {
				sAux += frm.elements[i].name+": ";
				sAux += frm.elements[i].value+"\n";
			}
		}
	}
	alert(sAux);
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
	XMLHttpRequestObject.open("GET", '../lana/php/soapBezEgiaztatuMatrikulaAJAX.php?Eposta='+eposta, true);
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
	XMLHttpRequestObject2.open("GET", '../lana/php/soapBezEgiaztatuPasahitzaAJAX.php?Pasahitza='+pasahitza, true);
	XMLHttpRequestObject2.send();
}