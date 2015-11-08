<?php
	// Konexioa sortu
	//$sql = mysql_connect('mysql.hostinger.es', 'u275359965_root', 'dbroot') or die(mysql_error());
	// Konexioa egiaztatu
	//mysql_select_db("u275359965_quiz") or die(mysql_error());
	// Konexioa lokala sortu
	$sql = mysql_connect('localhost', 'root', '') or die(mysql_error());
	// Konexioa lokala egiaztatu
	mysql_select_db("quiz") or die(mysql_error());
	$email = $_POST['Eposta'];
	$pasa = $_POST['Pasahitza'];
	$tele = $_POST['Telefonoa'];
	$izen = $_POST['Izenabizenak'];
	if (!filter_var($izen, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/[A-Z]+[a-z]* {1}[A-Z]+[a-z]* {1}[A-Z]+[a-z]*/"))) === false) {
		echo("$izen izena zuzena da.<br>");
	} else {
		echo("$izen izena ez da zuzena.<br>");
	}
	if (!filter_var($pasa, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/.{6,}/"))) === false) {
		echo("Pasahitza formatua zuzena da.<br>");
	} else {
		echo("Pasahitza formatua ez da zuzena.<br>");
	}
	if (!filter_var($email, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/[a-z]+[0-9]{3}@ikasle(\.e)hu(\.e)(s|us)/"))) === false) {
		echo("$email email helbide zuzena da.<br>");
	} else {
		echo("$email ez da email helbide zuzena.<br>");
	}
	if (!filter_var($tele, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/[0-9]{9}/"))) === false) {
		echo("$tele telefonoa zuzena da.<br>");
	} else {
		echo("$tele telefonoa ez da zuzena.<br>");
	}
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["Argazkia"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$fileName = $_FILES['Argazkia']['name'];
	$tmpName = $_FILES['Argazkia']['tmp_name'];
	$fileSize = $_FILES['Argazkia']['size'];
	$fileType = $_FILES['Argazkia']['type'];
	if(isset($_POST["Bidali"])) {
		$check = false;
		if(!empty($_FILES['Argazkia']['name'])) {
			$fp = fopen($tmpName, 'r');
			$edukia = fread($fp, filesize($tmpName));
			$edukia = addslashes($edukia);
			fclose($fp);
			$check = getimagesize($_FILES["Argazkia"]["tmp_name"]);
		}
		if($check !== false) {
			echo "Igotako argazkia - " . $check["mime"] . ".";
			$uploadOk = 1;
			$sql="INSERT INTO Erabiltzaile(Izena, Eposta, Pasahitza, Telefonoa, Espezialitatea, Interesak, Argazkia) VALUES ('$_POST[Izenabizenak]', '$_POST[Eposta]', '$_POST[Pasahitza]', '$_POST[Telefonoa]', '$_POST[Espezialitatea]', '$_POST[Interesak]', '$edukia')";
		} else {
			echo "Ez da argazkirik igo.<br>";
			$uploadOk = 0;
			$sql="INSERT INTO Erabiltzaile(Izena, Eposta, Pasahitza, Telefonoa, Espezialitatea, Interesak) VALUES ('$_POST[Izenabizenak]', '$_POST[Eposta]', '$_POST[Pasahitza]', '$_POST[Telefonoa]', '$_POST[Espezialitatea]', '$_POST[Interesak]')";
		}
	}	
	if (!mysql_query($sql))
	{
		die('Errorea: ' . mysql_error());
	}
	echo "Txertatze bat eginda.";
	mysql_close();
	echo "<a href='IkusiErabiltzaileak.php'> Erabiltzaileak ikusi </a>";
?> 
