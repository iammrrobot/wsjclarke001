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
	$hutsa=1;
	
	if (isset($_POST['Berria'])) {
		if(empty($_POST['Berria']))
		{
			$hutsa=0;
		}
		
		$eposta = $_SESSION['Eposta'];
		$berria = $_POST['Berria'];
		$hashberria = hash('sha512', '$_POST[Berria]');
		
		$sql = "UPDATE Erabiltzaile SET Pasahitza='$hashberria' WHERE Eposta='$eposta'";

		if (!mysql_query($sql))
		{
			die('Errorea: ' . mysql_error());
		}
		echo "Pasahitza berria: $berria";
		mysql_close();
	}
?>
<!DOCTYPE html> 
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>Pasahitza berreskuratu</title>
		<link rel="stylesheet" type="text/css" href="stylesPWS/style.css">
		<link rel="stylesheet" 
			type="text/css" 
			media="screen and (min-device-width: 480px) and (min-width: 530px)"
			href="stylesPWS/wide.css">
		<link rel="stylesheet" 
			type="text/css" 
			media="screen and (max-width: 480px)"
			href="stylesPWS/smartphone.css">
		<script src="javascript/erantzuna.js"></script>
	</head>
	<body>
		<form action="" method="post" enctype="multipart/form-data" id="berreskuratu" name="berreskuratu">
			Idatzi pasahitz berria<br>
			<input id="berria" type="text" name="Berria">
			<br>
			<input id="bidali" name="Bidali" type="submit" value="Bidali">
			<br>
			<?php
				if ($hutsa==0) {
					echo "Pasahitza ezin du hutsa izan!";
				}
			?>
		</form>
		<span>
			<a href="../layout.html">Atzera</a><br>
		</span>	
	</body>
</html>