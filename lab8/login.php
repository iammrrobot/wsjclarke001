<?php
	// Konexioa sortu
	//$sql = mysql_connect('mysql.hostinger.es', 'u275359965_root', 'dbroot') or die(mysql_error());
	// Konexioa egiaztatu
	//mysql_select_db("u275359965_quiz") or die(mysql_error());
	// Konexioa lokala sortu
	
	session_start();
	if (isset($_SESSION['erabiltzaile'])){
		header("location:php/handlingQuizzes.php");
		
	}
	
	$sql = mysql_connect('localhost', 'root', '') or die(mysql_error());
	// Konexioa lokala egiaztatu
	mysql_select_db("quiz") or die(mysql_error());
	$zuzenabat=1;
	$zuzenabi=1;
	$hutsa=1;
	
	
	if (isset($_POST['Eposta'])) {
		if(empty($_POST['Eposta']))
		{
			$hutsa=0;
		}
		 
		if(empty($_POST['Pasahitza']))
		{
			$hutsa=0;
		}
		$_SESSION['erabiltzaile'] = $POST_['erabiltzaile'];
		$eposta = $_POST['Eposta'];
		$pasahitza = $_POST['Pasahitza'];
		
		$query = mysql_query("SELECT Eposta, Pasahitza FROM Erabiltzaile
		WHERE Eposta='$eposta' and pasahitza='$pasahitza'") or die(mysql_error());

		$result = mysql_fetch_array($query);
		if (filter_var($eposta, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/[a-z]+[0-9]{3}@(\.e)hu(\.e)(s|us)/"))) === false) {
			$zuzenabat=0;
		}

		if($result[0]!=null){
			
			$ordua = date('H:i');
			$sql1="INSERT INTO konexioak (eposta, ordua) VALUES ('$username','$ordua')" or die(mysql_error()) ;			
			$_SESSION['erabiltzaile'] = $_POST['Eposta'];
		}else{
			$zuzenabi=0;
		}
		if($_SESSION['erabiltzaile'] == "web@ehu.es"){
			
			header("location:php/reviewingQuizzes.php");
		}else{
			header("location:php/reviewingQuizzes.php");

			
		}
		
	}
?>
<!DOCTYPE html> 
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>Log In</title>
		<link rel="stylesheet" type="text/css" href="stylesPWS/style.css">
		<link rel="stylesheet" 
			type="text/css" 
			media="screen and (min-device-width: 480px) and (min-width: 530px)"
			href="stylesPWS/wide.css">
		<link rel="stylesheet" 
			type="text/css" 
			media="screen and (max-width: 480px)"
			href="stylesPWS/smartphone.css">
	</head>
	<body>
		<form action="" method="post" enctype="multipart/form-data" id="login" name="login">
			Eposta elektronikoa<br>
			<input id="eposta" type="email" name="Eposta">
			<br>
			Pasahitza<br>
			<input id="pasahitza" type="password" name="Pasahitza">
			<br>
			<input id="bidali" name="Bidali" type="submit" value="Bidali">
			<br>
			<?php
				if ($hutsa==0) {
					echo "Eposta edo pasahitza hutsik dago!";
				} 
				else if ($zuzenabat==0 || $zuzenabi==0) {
					echo "Eposta edo pasahitza ez da zuzena!";
				}
			?>
		</form>
		<span>
			<a href="layout.html">Atzera</a><br>
		</span>	
	</body>
</html>
