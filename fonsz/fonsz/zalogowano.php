<?php

session_start();

if(!isset($_SESSION['zalogowany']))
{
	header('Location: log.php');
	exit();
}

?>




<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width = device-width, initial-scale = 1">
<title>Zalogowano</title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<style>
</style>
</head>
<body>

<?php
	session_start();
	
	echo "<p>Witaj ".$_SESSION['login'].'! [<a href="logout.php">Wyloguj się</a>]</p>';
	echo "<p><b>Email: </b>".$_SESSION['email'];
	
		if ($_SESSION['user'] == 1) {
		$usr = Admin;
		}
		elseif ($_SESSION['user'] == 2) {
			$usr = ROOT;
		}
		else {
			$usr = User;
		}
	echo "<p><b>Typ konta: </b>".$usr;

?>



</body>
</html>