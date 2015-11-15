<?php
	require_once('../lib/nusoap.php');
	require_once('../lib/class.wsdlcache.php');
	//Lokala
	$soapclient = new nusoap_client('http://localhost:1234/wsjclarke001/lab7/php/egiaztatuPasahitza.php?wsdl', true);
	//Sarekoa
	//$soapclient = new nusoap_client('http://wsjclarke001.hol.es/php/egiaztatuPasahitza.php?wsdl', true);
	$server = new soap_server;
	
if (isset($_GET['Id'])) {
		$emaitza = $soapclient->call('egiid', array('y'=>$_GET['Id']));
	}
	if ($emaitza == "BAI") {
		echo "ERABILTZAILE BAIMENDUA.";
	}
	else {
		echo "BAIMENIK GABEKO ERABILTZAILEA.";
	}
?>