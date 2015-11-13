<?php
	require_once('../lib/nusoap.php');
	require_once('../lib/class.wsdlcache.php');
	
	$soapclient = new nusoap_client('http://sw14.hol.es/ServiciosWeb/comprobarmatricula.php?wsdl', false);
	$server = new soap_server;
	
	if (isset($_GET['Eposta'])) {
		$emaitza = $soapclient->call('comprobar', array('x'=>$_GET['Eposta']));
	}
	if ($emaitza == "SI") {
		echo "Erabiltzailea erregistraturik dago.";
	}
	else {
		echo "Erabiltzailea ez dago erregistratuta.";
	}
?>