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
	$eposta = $_SESSION['erabiltzaile'];
	$sql1="SELECT * FROM `Galderak` WHERE Eposta='$eposta'";
	$sql2="SELECT * FROM `Galderak`";
	if (!mysql_query($sql1) || !mysql_query($sql2))
	{
		die('Errorea: ' . mysql_error());
	}
	$qsql1 = mysql_query($sql1);
	$qsql2 = mysql_query($sql2);
	echo "<br/>Nire galderak/Galderak guztira DB:".mysql_num_rows($qsql1)."/".mysql_num_rows($qsql2)."";
	mysql_close();
?>