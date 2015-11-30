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
	if (!isset($_SESSION['erabiltzaile'])){
		header("location: ../login.php");
		
	}
	
	if($_SESSION['erabiltzaile'] != "web000@ehu.es"){
			
			header("location:../layout.html");
		}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>Reviewing</title>
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
	<h1>Reviewing Quizzes</h1>
		<form action="" method="post" enctype="multipart/form-data" id="login" name="login">
			Galdera<br>
			<input id="galdera" type="text" name="Galdera" width="100">
			<br>
			Erantzuna<br>
			<input id="erantzuna" type="text" name="Erantzuna">
			<br>
			Zailtasun-maila(Max: 5)<br>
			<input id="zailtasuna" type="number" name="Zailtasuna" value="1" min="1" max="5">
			<br>Sar ezazu galderaren ID-a<br> 
			<input id = "ID" type = "number" name = "ID" min = "1"><br>
			Aukeratu<br>
			<select id="aukera" name="aukera" >
				<option selected="selected" value="Gehitu">Gehitu</option>
				<option value="Eguneratu">Eguneratu</option>
			</select><br>
			<input id="gehitu" name="Gehitu" type="button" value="OK" onclick="galderaEditatu()">
			<br>
			<input id="ikusi" name="Ikusi" type="button" value="Galderak Ikusi" onclick="GalderakIkusi2()"><br>
			<!-- Lokala -->
			<a href="../layout.html">Hasierako orria</a><br>
			<!-- Web-a -->
			<!--<a href="../layout.html">Hasierako orria</a><br>-->
		</form>
		<div id="emaitza" style="background-color:#99FF66;">
			<p>Galderak</p>
		</div>
		<div id="galderakop" style="background-color:#298ff5;">
			<p>Galdera kopurua</p>
		</div>
		<br>
	</body>
</html>