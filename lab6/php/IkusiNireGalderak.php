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
	$eposta = $_SESSION['Eposta'];
	$sql="SELECT * FROM `Galderak` WHERE Eposta='$eposta'";
	$records = mysql_query($sql);
	if (! $records)
	{
		die('Errorea: ' . mysql_error());
	}else{
		echo '<br><tr>ZURE GALDERAK:</tr><br><br>';
		echo '<tr>---------------------------------------------------------------------</tr><br>';
		while($row=mysql_fetch_assoc($records)){
			echo '<tr>'.$row['Galdera'].'</tr><br>';
			echo '<tr>---------------------------------------------------------------------</tr><br>';
		}
	}
	mysql_close();
?>