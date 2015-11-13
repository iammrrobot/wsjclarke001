function osatu(){
	var dago=false;
	var xmlDoc = document.getElementById('datuak').contentDocument;
	var kor = document.getElementById("korreoa").value;
	var epostenZer=xmlDoc.getElementsByTagName("eposta");
	var tfnoZer=xmlDoc.getElementsByTagName("telefonoa");
	var izenaZer=xmlDoc.getElementsByTagName("izena");
	var abizenaZer=xmlDoc.getElementsByTagName("abizena1");
	for (var i = 0; i < epostenZer.length; i++) {
		if (kor==epostenZer[i].childNodes[0].nodeValue){
			document.getElementById('tfonoa').value=tfnoZer[i].childNodes[0].nodeValue;
			document.getElementById('izena').value=izenaZer[i].childNodes[0].nodeValue;
			document.getElementById('abizena').value=abizenaZer[i].childNodes[0].nodeValue;
			dago=true;
			break;
		}
	}
	if (!dago){
		alert ('Eposta hau ez dago UPV/EHUn erregistraturik. Sar ezazu beste bat');
	}
}