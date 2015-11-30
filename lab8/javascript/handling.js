XMLHttpRequestObject = new XMLHttpRequest();
XMLHttpRequestObject.onreadystatechange = function(){
if (XMLHttpRequestObject.readyState==4)
{var obj = document.getElementById('emaitza');
obj.innerHTML = XMLHttpRequestObject.responseText;}
}

function nireGalderakIkusi() {
	XMLHttpRequestObject.open("GET", '../php/IkusiNireGalderak.php', true);
	XMLHttpRequestObject.send();
}

function galderaGehitu() {
	var galdera=document.getElementById('galdera').value;
	var erantzuna=document.getElementById('erantzuna').value;
	var zailtasuna=document.getElementById('zailtasuna').value;
	XMLHttpRequestObject.open("GET",'../php/GehituGaldera.php?Galdera='+galdera+"&Erantzuna="+erantzuna+"&Zailtasuna="+zailtasuna, true);
	XMLHttpRequestObject.send();
}

XMLHttpRequestObject2 = new XMLHttpRequest();
XMLHttpRequestObject2.onreadystatechange = function(){
	if (XMLHttpRequestObject2.readyState==4)
	{
		var obj = document.getElementById('galderakop');
		obj.innerHTML = XMLHttpRequestObject2.responseText;
	}
}

setInterval(function(){
	XMLHttpRequestObject2.open("GET","GalderaKopurua.php", true);
	XMLHttpRequestObject2.send();
 }, 5000);
 
 
 function GalderakIkusi2() {
	XMLHttpRequestObject.open("GET", '../php/ikusiGalderakEdit.php', true);
	XMLHttpRequestObject.send();
}

function galderaEditatu() {
	var galdera=document.getElementById('galdera').value;
	var erantzuna=document.getElementById('erantzuna').value;
	var zailtasuna=document.getElementById('zailtasuna').value;
	var aukera=document.getElementById('aukera').value;
	var ID=document.getElementById('ID').value;
	XMLHttpRequestObject.open("GET",'../php/Editatu.php?Galdera='+galdera+"&Erantzuna="+erantzuna+"&Zailtasuna="+zailtasuna+"&Aukera="+aukera+"&ID="+ID, true);
	XMLHttpRequestObject.send();
}