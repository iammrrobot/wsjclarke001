<?php
	require_once('../lib/nusoap.php');
	require_once('../lib/class.wsdlcache.php');
	
	$soapclient = new nusoap_client('http://localhost:1234/wsjclarke001/lab7/php/egiaztatuPasahitza.php?wsdl', true);
	$server = new soap_server;
	
	if (isset($_GET['Pasahitza'])) {
		$emaitza = $soapclient->call('egipasahitza', array('x'=>$_GET['Pasahitza']));
	}
	if ($emaitza == "BALIOGABEZKOA") {
		echo "Pasahitza ez da egokia, beste bat erabili.";
	}
	else {
		echo "Pasahitza egokia da.";
	}
?>