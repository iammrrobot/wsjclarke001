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
	$hutsa=1;
	
	if (isset($_POST['Berria'])) {
		if(empty($_POST['Berria']))
		{
			$hutsa=0;
		}
		
		$eposta = $_SESSION['Eposta'];
		$berria = $_POST['Berria'];
		$hashberria = hash('sha512', "$_POST[Berria]");
		
		$query = "UPDATE Erabiltzaile SET Pasahitza='$hashberria' WHERE Eposta='$eposta'";

		if (!mysqli_query($sql, $query))
		{
			echo('Errorea: ' . mysqli_error($sql));
		}	 
		echo "Pasahitza berria: $berria";
		mysqli_close($sql);
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
			<input id="berria" type="password" name="Berria">
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
			<a href="../layout.html">Hasierako orria</a><br>
		</span>	
	</body>
</html>