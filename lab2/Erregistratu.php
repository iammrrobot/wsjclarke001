<?php
	// Konexioa sortu
	$sql = mysql_connect('mysql.hostinger.es', 'u275359965_root', 'dbroot') or die(mysql_error());
	// Konexioa egiaztatu
	mysql_select_db("u275359965_quiz") or die(mysql_error());
	$sql="INSERT INTO Erabiltzaile(Izena, Eposta, Pasahitza, Telefonoa, Espezialitatea, Interesak) VALUES ('$_POST[Izenabizenak]', '$_POST[Eposta]', '$_POST[Pasahitza]', '$_POST[Telefonoa]', '$_POST[Espezialitatea]', '$_POST[Interesak]')";
	if (!mysql_query($sql))
	{
		die('Errorea: ' . mysql_error());
	}
	echo "Txertatze bat eginda.";
	mysql_close();
	echo "<p> <a href='IkusiErabiltzaileak.php'> Erabiltzaileak ikusi </a>";
?> 
