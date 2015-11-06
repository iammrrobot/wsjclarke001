<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>Galderak</title>
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
		<h1>Galderak</h1>
		<table width="800" border="1" cellpadding="1" cellspacing="1">
			<tr>
				<th>Galdera</th>
				<th>Zailtasuna</th>
				<th>Mota</th>
			<tr>
			
			<?php
				libxml_use_internal_errors(true);
				$xml=simplexml_load_file('../xml/galderak.xml');
				
				if ($xml === false) {
						echo "Arazoa XML-a kargatzen!\n";
						foreach(libxml_get_errors() as $error) {
						echo "\t", $error->message;
					}
				}
				
				foreach($xml->children() as $galdera){
					$komplexutasuna = $galdera[0]['konplexutasuna'];
					$subject= $galdera[0]['subject'];
					$Galdera = $galdera[0] -> itemBody -> p;
					echo "<tr><td>".$Galdera."</td>";
					echo "<td>". $komplexutasuna."</td>";
					echo "<td>". $subject. "</td></tr>";
				}
			?>
			
		</table>
		<span>
			<br>
			<!-- Lokala -->
			<!--<a href="../lab5/layout.html">Hasierako orria</a><br>-->
			<!-- Web-a -->
			<a href="../layout.html">Hasierako orria</a><br>
			<br>
			<a href="../html/IkusiXML.html">Ikusi XML-a</a><br>
		</span>	
	</body>
</html> 