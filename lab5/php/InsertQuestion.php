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
	if (isset($_POST['Galdera'])) {
		if(empty($_POST['Galdera']))
		{
			$hutsa=0;
		}
		if(empty($_POST['Erantzuna']))
		{
			$hutsa=0;
		}
		if(empty($_POST['Zailtasuna']))
		{
			$hutsa=0;
		}
	
		$eposta = $_SESSION['Eposta'];
		$galdera = $_POST['Galdera'];
		$erantzuna = $_POST['Erantzuna'];
		$zailtasuna = $_POST['Zailtasuna'];
		$ordua = date('Y-m-d H:i:s');
		$ip = $_SERVER["REMOTE_ADDR"];
		$mota = "Galdera txertatu";
		
		if($hutsa == 1) {
			$sqlgaldera="INSERT INTO Galderak(Eposta, Galdera, Erantzuna, Zailtasuna) VALUES ('$eposta', '$galdera', '$erantzuna', '$zailtasuna')";
			$sqlkonexioa="INSERT INTO Konexioak(Eposta, K_Ordua) VALUES ('$eposta', '$ordua')";
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
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>Galderak gehitu</title>
		<link rel='stylesheet' type='text/css' href='stylesPWS/style.css'>
		<link rel='stylesheet' 
			   type='text/css' 
			   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
			   href='stylesPWS/wide.css'>
		<link rel='stylesheet' 
			   type='text/css' 
			   media='only screen and (max-width: 480px)'
			   href='stylesPWS/smartphone.css'>
	</head>
	<body>
		<form action="" method="post" enctype="multipart/form-data" id="login" name="login">
			Galdera<br>
			<input id="galdera" type="text" name="Galdera" width="100">
			<br>
			Erantzuna<br>
			<input id="erantzuna" type="text" name="Erantzuna">
			<br>
			Zailtasun-maila(Max: 5)<br>
			<input id="zailtasuna" type="number" name="Zailtasuna" value="1" min="1" max="5">
			<br>
			<input id="gehitu" name="Gehitu" type="submit" value="Gehitu galdera">
			<br>
			<a href="../layout.html">Hasierako orrira joan</a><br>
		</form>
	</body>
</html>