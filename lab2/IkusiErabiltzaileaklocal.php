<?php
	// Konexioa sortu
	$sql = mysql_connect('localhost', 'root', '') or die(mysql_error());
	// Konexioa egiaztatu
	mysql_select_db("quiz") or die(mysql_error());
	$sql="SELECT * FROM `erabiltzaile` ";
	$records = mysql_query($sql);
	if (! $records)
	{
		die('Errorea: ' . mysql_error());
	}
	mysql_close();
?>

<html>
	<head>
		<title>Erabiltzaileak</title>
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
					echo "<tr>";
					echo "<td>".$erabiltzaile['Izena']."</td>";
					echo "<td>".$erabiltzaile['Eposta']."</td>";
					echo "<td>".$erabiltzaile['Pasahitza']."</td>";
					echo "<td>".$erabiltzaile['Telefonoa']."</td>";
					echo "<td>".$erabiltzaile['Espezialitatea']."</td>";
					echo "<td>".$erabiltzaile['Interesak']."</td>";
					echo "<td>".$erabiltzaile['Argazkia']."</td>";
					echo "<tr>";
				}
			?>
			
		</table>
	</body>
</html> 
