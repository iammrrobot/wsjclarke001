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
	$eposta = $_SESSION['Eposta'];
	$query="SELECT * FROM `Galderak` WHERE Eposta='$eposta'";
	$records = mysqli_query($sql, $query);
	if (!$records)
	{
		echo('Errorea: ' . mysqli_error($sql));
	} else {
		echo '<br><tr>ZURE GALDERAK:</tr><br><br>';
		echo '<tr>---------------------------------------------------------------------</tr><br>';
		while($row=mysqli_fetch_assoc($records)){
			echo '<tr>'.$row['Galdera'].'</tr><br>';
			echo '<tr>---------------------------------------------------------------------</tr><br>';
		}
	}
	mysqli_close($sql);
?>