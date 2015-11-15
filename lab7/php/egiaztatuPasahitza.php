<?php
	require_once('../lib/nusoap.php');
	require_once('../lib/class.wsdlcache.php');
	//soap_server motako objektua sortzen dugu
	//Lokala
	//$ns="http://wsjclarke001.hol.es/php/egiaztatuPasahitza.php?wsdl"; //name of the service
	//Sarekoa
	$ns="http://localhost:1234/wsjclarke001/lab7/php/egiaztatuPasahitza.php?wsdl";
	$server = new soap_server;
	$server->configureWSDL('egipasahitza',$ns);
	$server->configureWSDL('egiid',$ns);
	$server->wsdl->schemaTargetNamespace=$ns;
	//inplementatu nahi dugun funtzioa erregistratzen dugu
	$server->register('egipasahitza', array('x'=>'xsd:string'), array('z'=>'xsd:string'), $ns);
	$server->register('egiid', array('y'=>'xsd:string'), array('o'=>'xsd:string'), $ns);
	//funtzioa inplementatzen dugu
	function egipasahitza($x) {
		$file = fopen("toppasswords.txt","r") or exit("Errorea txt-a irakurtzean.");
		while(!feof($file)) {
			$cmp = fgets($file);
			$tr = trim($cmp);
			if($tr===$x || $x ==='') {
				return "BALIOGABEZKOA";
			}
		}
		return "BALIOZKOA";
	}
	function egiid($y) {
		$fileid = fopen("id.txt","r") or exit("Errorea txt-a irakurtzean.");
		while(!feof($fileid)) {
			$cmpid = fgets($fileid);
			$trid = trim($cmpid);
			if($trid===$y) {
				return "BAI";
			}
		}
		return "EZ";
	}
	//nusoap klaseko sevice metodoari dei egiten diogu
	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	$server->service($HTTP_RAW_POST_DATA);
?>
