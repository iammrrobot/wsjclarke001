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
	$zuzenabat=1;
	$zuzenabi=1;
	$hutsa=1;
	
	if (isset($_POST['Eposta'])) {
		if(empty($_POST['Eposta']))
		{
			$hutsa=0;
		}
		 
		if(empty($_POST['Erantzuna']))
		{
			$hutsa=0;
		}
		
		$eposta = $_POST['Eposta'];
		$erantzuna = $_POST['Erantzuna'];
		
		$query = mysqli_query($sql, "SELECT Eposta, Erantzuna FROM Erabiltzaile
		WHERE Eposta='$eposta' and Erantzuna='$erantzuna'");

		$result = mysqli_fetch_array($query);
		if (filter_var($eposta, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/[a-z]+[0-9]{3}@ikasle(\.e)hu(\.e)(s|us)/"))) === false) {
			$zuzenabat=0;
		}

		if($result[0]!=null){
			session_start();
			$_SESSION['Eposta'] = $_POST['Eposta'];
			header("location:php/berreskuratu.php");
		}else{
			$zuzenabi = 0;
		}
	}
?>
<!DOCTYPE html> 
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>Pasahitza berreskuratu</title>
		<link rel="stylesheet" type="text/css" href="stylesPWS/style.css">
		<link rel="stylesheet" 
			type="text/css" 
			media="screen and (min-device-width: 480px) and (min-width: 530px)"
			href="stylesPWS/wide.css">
		<link rel="stylesheet" 
			type="text/css" 
			media="screen and (max-width: 480px)"
			href="stylesPWS/smartphone.css">
		<script src="javascript/erantzuna.js"></script>
	</head>
	<body>
		<form action="" method="post" enctype="multipart/form-data" id="berreskuratu" name="berreskuratu">
			Eposta<br>
			<input id="eposta" type="email" name="Eposta">
			<br>
			Zein da zure animalirik gustokoena?<br>
			<input id="erantzuna" type="text" name="Erantzuna">
			<br>
			<input id="bidali" name="Bidali" type="submit" value="Bidali">
			<br>
			<?php
				if ($hutsa==0) {
					echo "Eposta edo erantzuna hutsik dago!";
				} 
				else if ($zuzenabat==0 || $zuzenabi==0) {
					echo "Eposta edo erantzuna ez da zuzena!";
				}
			?>
		</form>
		<span>
			<a href="layout.html">Atzera</a><br>
		</span>	
	</body>
</html>
