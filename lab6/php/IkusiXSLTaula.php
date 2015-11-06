<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>Galderen XSL Taula</title>
	</head>
	<body>
	<?php
		$xslDoc = new DOMDocument();
		$xslDoc->load("../xsl/seeQuestions.xsl");
		
		$xmlDoc = new DOMDocument();
		$xmlDoc->load("../xml/galderak.xml");
		
		$proc = new XSLTProcessor();
		$proc->importStylesheet($xslDoc);
		echo $proc->transformToXML($xmlDoc);
	?>
	</body>
	<br>
	<a href="../html/IkusiXML.html">Atzera</a>
</html>