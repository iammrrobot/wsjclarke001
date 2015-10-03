<?php
	//Pasahitza: dbroot
	//phpinfo();
	// Konexioa sortu
	$sql = mysql_connect('localhost', 'root', '') or die(mysql_error());
	// Konexioa egiaztatu
	mysql_select_db("quiz") or die(mysql_error());
	$sql="INSERT INTO Erabiltzaile(Izena, Eposta, Pasahitza, Telefonoa, Espezialitatea, Interesak) VALUES ('$_POST[Izenabizenak]', '$_POST[Eposta]', '$_POST[Pasahitza]', '$_POST[Telefonoa]', '$_POST[Espezialitatea]', '$_POST[Interesak]')";
	if (!mysql_query($sql))
	{
		die('Errorea: ' . mysql_error());
	}
	echo "Txertatze bat eginda.";
	mysql_close();
	echo "<p> <a href='IkusiErabiltzaileak.php'> Erabiltzaileak ikusi </a>";
?> 
