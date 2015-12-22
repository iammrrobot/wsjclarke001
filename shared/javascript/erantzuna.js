XMLHttpRequestObject = new XMLHttpRequest();
XMLHttpRequestObject.onreadystatechange = function(){
	if (XMLHttpRequestObject.readyState==4)
	{
		var obj = document.getElementById('berpas');
		obj.innerHTML = XMLHttpRequestObject.responseText;
	}
}

function egiaztatuErantzuna() {
	var eposta=document.getElementById('eposta').value;
	var erantzuna = document.getElementById('erantzuna').value;
	XMLHttpRequestObject.open("GET", '../lana/php/pasahitza.php?Eposta='+eposta+'&Erantzuna='+erantzuna, true);
	XMLHttpRequestObject.send();
}
