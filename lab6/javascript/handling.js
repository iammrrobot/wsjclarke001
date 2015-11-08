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
	if (XMLHttpRequestObject2.readyState==4 && XMLHttpRequestObject2.status==200)
	{
		var obj = document.getElementById('galderakop');
		obj.innerHTML = XMLHttpRequestObject2.responseText;
	}
}

setInterval(function(){
	XMLHttpRequestObject2.open("GET","GalderaKopurua.php", true);
	XMLHttpRequestObject2.send();
 }, 5000);