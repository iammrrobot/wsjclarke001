<?php
	// Konexioa sortu
	//$sql = mysql_connect('mysql.hostinger.es', 'u275359965_root', 'dbroot') or die(mysql_error());
	// Konexioa egiaztatu
	//mysql_select_db("u275359965_quiz") or die(mysql_error());
	// Konexio lokala sortu
	$sql = mysql_connect('localhost', 'root', '') or die(mysql_error());
	// Konexioa lokala egiaztatu
	mysql_select_db("quiz") or die(mysql_error());
	$mota = "Galderak ikusi";
	$ordua = date('Y-m-d H:i:s');
	$ip = $_SERVER["REMOTE_ADDR"];
	$sqlekintza="INSERT INTO Ekintzak(E_Mota, E_Ordua, IP) VALUES ('$mota', '$ordua', '$ip')";
	if (!mysql_query($sqlekintza))
	{
		die('Errorea: ' . mysql_error());
	}
	
	header("location:../quizzes.php");
	mysql_close();
?>

