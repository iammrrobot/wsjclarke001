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
	$eposta = $_SESSION['erabiltzaile'];
	$sql1="SELECT * FROM `Galderak` WHERE Eposta='$eposta'";
	$sql2="SELECT * FROM `Galderak`";
	if (!mysqli_query($sql, $sql1) || !mysqli_query($sql, $sql2))
	{
		echo('Errorea: ' . mysqli_error($sql));
	}
	$qsql1 = mysqli_query($sql, $sql1);
	$qsql2 = mysqli_query($sql, $sql2);
	echo "Nire galderak/Galderak guztira DB:".mysqli_num_rows($qsql1)."/".mysqli_num_rows($qsql2)."";
	mysqli_close($sql);
?>