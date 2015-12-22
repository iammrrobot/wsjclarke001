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
	if (isset($_SESSION['erabiltzaile'])){
		if($_SESSION['erabiltzaile'] != "web000@ehu.es"){
			header("location:irakasle.html");
		} else {
			header("location:ikasle.html");
		}
	}
	$zuzenabat=1;
	$zuzenabi=1;
	$hutsa=1;
	
	if(isset($_POST["Eposta"])){
		
		if(empty($_POST['Eposta']))
		{
			$hutsa=0;

		}
		 
		if(empty($_POST['Pasahitza']))
		{
			$hutsa=0;
		}
		
		$eposta = $_POST['Eposta'];
		$hashpasahitza = hash('sha512',"$_POST[Pasahitza]");
		$query = mysqli_query($sql, "SELECT Eposta ,Pasahitza FROM Erabiltzaile
		WHERE Eposta='$eposta' and pasahitza='$hashpasahitza'");
		$result = mysqli_fetch_array($query);
		if (filter_var($eposta, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/[a-z]+[0-9]{3}@ikasle(\.e)hu(\.e)(s|us)/"))) === false) {
			$zuzenabat=0;
		}
		
		if($result[0]!=null && $_COOKIE['login'] < 3){	
			$_SESSION['erabiltzaile'] = $_POST['Eposta'];
			if($_SESSION['erabiltzaile'] == "web000@ehu.es"){
				header("location:irakasle.html");
			} else{
				header("location:ikasle.html");
			}
		} else if ($result[0]!=null && $_COOKIE['login'] >= 3){
			echo "Minutu 1ean ezin izango duzu pasahitza sartu. Saiatu berriro beranduago.";
			echo "<script>setTimeout(\"location.href = 'layout.html';\",2000);</script>";
		} else {
			$zuzenabi=0;
			if(isset($_COOKIE['login'])){
				if($_COOKIE['login'] < 3){
					$attempts = $_COOKIE['login'] + 1;
					setcookie('login', $attempts, time()+60); //set the cookie for 1 minute with the number of attempts stored
				}else{
					echo "Minutu 1ean ezin izango duzu pasahitza sartu. Saiatu berriro beranduago.";
					echo "<script>setTimeout(\"location.href = 'layout.html';\",2000);</script>";
				}
			}else{
				setcookie('login', 1, time()+60); //set the cookie for 1 minute with the initial value of 1
			}
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
			<input id="Eposta" type="email" name="Eposta">
			<br>
			Pasahitza<br>
			<input id="Pasahitza" type="password" name="Pasahitza">
			<br>
			<input id="bidali" name="bidali" type="submit" value="Bidali">
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