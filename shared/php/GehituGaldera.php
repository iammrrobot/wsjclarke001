<?php
	// Konexioa sortu
	//$sql = mysqli_connect('mysql.hostinger.es', 'u275359965_root', 'dbroot', 'u275359965_quiz');
	// Konexioa lokala sortu
	$sql = mysqli_connect('localhost', 'root', '', 'quiz');
	// Konexioa egiaztatu
	if (mysqli_connect_errno())
	{
		echo "Errorea MYSQLera konektatzean: " . mysqli_connect_error();
	}
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
	
		$eposta = $_SESSION['Eposta'];
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
			
			if (!mysqli_query($sql, $sqlgaldera) || !mysqli_query($sql, $sqlkonexioa))
			{
				echo('Errorea: ' . mysqli_error($sql));
			}
			
			$query="SELECT MAX(K_ID) FROM `Konexioak`";
			$do = mysqli_query($sql, $query);
			$fetch=mysqli_fetch_assoc($do);
			$k_id=$fetch['MAX(K_ID)'];
			$ip = $_SERVER['REMOTE_ADDR'];
			
			$sqlekintza="INSERT INTO Ekintzak(K_ID, Eposta, E_Mota, E_Ordua, IP) VALUES ('$k_id', '$eposta', '$mota', '$ordua', '$ip')";
			if (!$do || !mysqli_query($sql, $sqlekintza))
			{
				echo('Errorea: ' . mysqli_error($sql));
			}
			
			echo "Txertatze bat eginda.";
			mysqli_close($sql);
		}
		else {
			echo "Kutxetako bat hutsik dago!";
		}
	}
?>