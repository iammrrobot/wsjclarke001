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
		<script src="javascript/galderak.js"></script>
	</head>
	<body>
			 <div id = "anonim">
			 <form method="post" enctype="multipart/form-data" id="nickname" name="quiz" action = "" >
			 Nickname:<input id="nickname" type= "text" name="nickname" width="100">			
			 <input id = "anonimo" type = "button" name= "anonimo"value = "OK" onClick="nickName()"></input>
			 </form>
			 </div><br><br><br>
		
		
		<div id="Galdera" >		
			<form method="post" enctype="multipart/form-data" id="quiz" name="quiz" >
			<input id="erantzuna" type= "text" name="erantzuna" width="100">
			<input id = "bidali" type = "button" value ="check" name ="bidali" onClick=" AJAX">
			</form>
			
		</div>
		<div id="galderakop" >
			<p>Galdera kopurua</p>
		</div>
		<br>
	</body>
</html>