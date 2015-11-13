<?php
	// Konexioa sortu
	//$sql = mysql_connect('mysql.hostinger.es', 'u275359965_root', 'dbroot') or die(mysql_error());
	// Konexioa egiaztatu
	//mysql_select_db("u275359965_quiz") or die(mysql_error());
	// Konexioa lokala sortu
	$sql = mysql_connect('localhost', 'root', '') or die(mysql_error());
	// Konexioa lokala egiaztatu
	mysql_select_db("quiz") or die(mysql_error());
	$sql="SELECT * FROM `Galderak`";
	$records = mysql_query($sql);
	if (! $records)
	{
		die('Errorea: ' . mysql_error());
	}
	mysql_close();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>Quizzes</title>
		<link rel='stylesheet' type='text/css' href='stylesPWS/style.css'>
		<link rel='stylesheet' 
			   type='text/css' 
			   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
			   href='stylesPWS/wide.css'>
		<link rel='stylesheet' 
			   type='text/css' 
			   media='only screen and (max-width: 480px)'
			   href='stylesPWS/smartphone.css'>
	</head>
	<body>
		<table width="800" border="1" cellpadding="1" cellspacing="1">
			<tr>
				<th>Galdera</th>
				<th>Zailtasun-maila</th>
			<tr>
			
			<?php
				while($galderak=mysql_fetch_assoc($records)) {
					echo "<td>".$galderak['Galdera']."</td>";
					echo "<td>".$galderak['Zailtasuna']."</td>";
					echo "</tr>";
				}
			?>
			
		</table>
		<span>
			<!-- Lokala -->
			<a href="../lab5/layout.html">Hasierako orria</a><br>
			<!-- Web-a -->
			<!--<a href="../layout.html">Hasierako orria</a><br>-->
		</span>	
	</body>
 </html>