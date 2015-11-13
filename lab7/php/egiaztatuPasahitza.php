<?php
	require_once('../lib/nusoap.php');
	require_once('../lib/class.wsdlcache.php');
	//soap_server motako objektua sortzen dugu
	$ns="http://localhost:1234/wsjclarke001/lab7/php/egiaztatuPasahitza.php?wsdl"; //name of the service
	$server = new soap_server;
	$server->configureWSDL('egipasahitza',$ns);
	$server->wsdl->schemaTargetNamespace=$ns;
	//inplementatu nahi dugun funtzioa erregistratzen dugu
	$server->register('egipasahitza', array('x'=>'xsd:string'), array('z'=>'xsd:string'), $ns);
	//funtzioa inplementatzen dugu
	function egipasahitza($x) {
		$file = fopen("toppasswords.txt","r") or exit("Unable");
		while(!feof($file)) {
			$cmp = fgets($file);
			$tr = trim($cmp);
			if($tr===$x || $x ==='') {
				return "BALIOGABEZKOA";
			}
		}
		return "BALIOZKOA";
	
	}
	//nusoap klaseko sevice metodoari dei egiten diogu
	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	$server->service($HTTP_RAW_POST_DATA);
?>
