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
	$query="SELECT * FROM `Galderak`";
	$records = mysql_query($sql, $query);
	if (! $records)
	{
		echo('Errorea: ' . mysqli_error($sql));
	} else {
		echo '<br><tr>GALDERAK:</tr><br><br>';
		echo '<tr>---------------------------------------------------------------------</tr>';
		echo '<br><tr>ID    Eposta    Galdera    Erantzuna    Zailtasuna:</tr><br>';
		echo '<tr>---------------------------------------------------------------------</tr><br>';
		while($row=mysqli_fetch_assoc($records)){
			echo '<tr>'.$row['ID'].'    '.$row['Eposta'].'    '.$row['Galdera'].'    '.$row['Erantzuna'].'    '.$row['Zailtasuna'].'</tr><br>';
			echo '<tr>---------------------------------------------------------------------</tr><br>';
		}
	}
	mysqli_close($sql);
?>