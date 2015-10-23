<?php
	// Konexioa sortu
	//$sql = mysql_connect('mysql.hostinger.es', 'u275359965_root', 'dbroot') or die(mysql_error());
	// Konexioa egiaztatu
	//mysql_select_db("u275359965_quiz") or die(mysql_error());
	// Konexio lokala sortu
	$sql = mysql_connect('localhost', 'root', '') or die(mysql_error());
	// Konexioa lokala egiaztatu
	mysql_select_db("quiz") or die(mysql_error());
	$sql="SELECT * FROM `Erabiltzaile`";
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
		<title>Erabiltzaileak</title>
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
				<th>Izena</th>
				<th>E-posta</th>
				<th>Pasahitza</th>
				<th>Telefonoa</th>
				<th>Espezialitatea</th>
				<th>Interesak</th>
				<th>Argazkia</th>
			<tr>
			
			<?php
				while($erabiltzaile=mysql_fetch_assoc($records)) {
					echo "<td>".$erabiltzaile['Izena']."</td>";
					echo "<td>".$erabiltzaile['Eposta']."</td>";
					echo "<td>".$erabiltzaile['Pasahitza']."</td>";
					echo "<td>".$erabiltzaile['Telefonoa']."</td>";
					echo "<td>".$erabiltzaile['Espezialitatea']."</td>";
					echo "<td>".$erabiltzaile['Interesak']."</td>";
					$image = $erabiltzaile['Argazkia'];
					if(!empty($image)) {
						$enc = base64_encode($image);
						echo "<td>";
						echo '<img height="70px" width="150px" align="middle" src="data:image/;base64,' . $enc . '"/>';
						echo "</td>";
					}
					echo "</tr>";
				}
			?>
			
		</table>
		<span>
			<a href="../layout.html">Hasierako orria</a><br>
		</span>	
	</body>
</html> 
