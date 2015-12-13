<?php
	// Konexioa sortu
	//$sql = mysql_connect('mysql.hostinger.es', 'u275359965_root', 'dbroot') or die(mysql_error());
	// Konexioa egiaztatu
	//mysql_select_db("u275359965_quiz") or die(mysql_error());
	// Konexioa lokala sortu
	$sql = mysql_connect('localhost', 'root', '') or die(mysql_error());
	// Konexioa lokala egiaztatu
	mysql_select_db("quiz") or die(mysql_error());
	session_start();
	$hutsa = 1;
	if (isset($_GET['Galdera'])) {
		if(empty($_GET['Galdera']))
		{
			$hutsa=0;
		}
		if(empty($_GET['Erantzuna']))
		{
			$hutsa=0;
		}
		if(empty($_GET['Zailtasuna']))
		{
			$hutsa=0;
		}
	
		$eposta = $_SESSION['erabiltzaile'];
		$galdera = $_GET['Galdera'];
		$erantzuna = $_GET['Erantzuna'];
		$zailtasuna = $_GET['Zailtasuna'];
		$ordua = date('Y-m-d H:i:s');
		$ip = $_SERVER["REMOTE_ADDR"];
		$mota = "Galdera txertatu";
		
		libxml_use_internal_errors(true);
		$xml=simplexml_load_file('../xml/galderak.xml');
		
		if ($xml === false) {
			echo "Arazoa XML-a kargatzen!\n";
			foreach(libxml_get_errors() as $error) {
				echo "\t", $error->message;
			}
		}
		
		if($hutsa == 1) {
			$sqlgaldera="INSERT INTO Galderak(Eposta, Galdera, Erantzuna, Zailtasuna) VALUES ('$eposta', '$galdera', '$erantzuna', '$zailtasuna')";
			$sqlkonexioa="INSERT INTO Konexioak(Eposta, K_Ordua) VALUES ('$eposta', '$ordua')";
			
			$assesItem = $xml->addchild('assesmentItem');
			$assesItem-> addAttribute('konplexutasuna', $zailtasuna);
			$assesItem-> addAttribute('subject', 'Orokorra');
		
			$Itembody= $assesItem-> addChild('itemBody');
			$Itembody-> addChild('p', $galdera);
			$cResponse= $assesItem ->addChild('correctResponse');
			$Value= $cResponse-> addChild('value',$erantzuna);
		
			$xml->asXML('../xml/galderak.xml');
			//echo $xml->asXML();
			
			if (!mysql_query($sqlgaldera) || !mysql_query($sqlkonexioa))
			{
				die('Errorea: ' . mysql_error());
			}
			
			$query="SELECT MAX(K_ID) FROM `Konexioak`";
			$do = mysql_query($query);
			$fetch=mysql_fetch_assoc($do);
			$k_id=$fetch['MAX(K_ID)'];
			$ip = $_SERVER['REMOTE_ADDR'];
			
			$sqlekintza="INSERT INTO Ekintzak(K_ID, Eposta, E_Mota, E_Ordua, IP) VALUES ('$k_id', '$eposta', '$mota', '$ordua', '$ip')";
			if (! $do || !mysql_query($sqlekintza))
			{
				die('Errorea: ' . mysql_error());
			}
			
			echo "Txertatze bat eginda.";
			mysql_close();
		}
		else {
			echo "Kutxetako bat hutsik dago!";
		}
	}
?>