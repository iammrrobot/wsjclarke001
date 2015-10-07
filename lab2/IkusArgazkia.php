<?php
	// Konexioa sortu
	//$sql = mysql_connect('mysql.hostinger.es', 'u275359965_root', 'dbroot') or die(mysql_error());
	// Konexioa egiaztatu
	//mysql_select_db("u275359965_quiz") or die(mysql_error());
	// Konexioa lokala sortu
	$sql = mysql_connect('localhost', 'root', '') or die(mysql_error());
	// Konexioa lokala egiaztatu
	mysql_select_db("quiz") or die(mysql_error());
	$email=$_GET["id"];
	$arg = mysql_query("SELECT Argazkia FROM `Erabiltzaile` where eposta='$email'") or die(mysql_error());
	
	//header("Content-type:image/gif");
	
	$row = mysql_fetch_array( $arg );
	echo $row[0];
?>