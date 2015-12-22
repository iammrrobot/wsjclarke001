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
	if (!isset($_SESSION['erabiltzaile'])){
		header("location: ../login.php");
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
		<script src="../javascript/handling.js"></script>
	</head>
	<body>
	<h1>Galdera Gehitu</h1>
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
			<input id="gehitu" name="Gehitu" type="button" value="Gehitu galdera" onclick="galderaGehitu()">
			<br>
			<input id="ikusi" name="Ikusi" type="button" value="Ikusi nire galderak" onclick="nireGalderakIkusi()"><br>
			<!-- Lokala -->
			<a href="../ikasle.html">Hasierako orria</a><br>
			<!-- Web-a -->
			<!--<a href="../layout.html">Hasierako orria</a><br>-->
		</form>
		<div id="emaitza" style="background-color:#99FF66;">
			<p>Galderak</p>
		</div>
		<div id="galderakop" style="background-color:#298ff5;">
			<p>Galdera kopurua</p>
		</div>
	</body>
</html>