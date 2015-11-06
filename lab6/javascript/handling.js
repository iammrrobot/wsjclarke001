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