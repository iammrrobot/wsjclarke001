XMLHttpRequestObject = new XMLHttpRequest();
XMLHttpRequestObject.onreadystatechange = function(){
if (XMLHttpRequestObject.readyState==4)
{var obj = document.getElementById('anonim');
obj.innerHTML = XMLHttpRequestObject.responseText;}
}

function nickName() {
	var nickname = document.getElementById('nickname').value;
	XMLHttpRequestObject.open("GET", '../php/anonimoa.php?nickname='+nickname, true);
	XMLHttpRequestObject.send();
}