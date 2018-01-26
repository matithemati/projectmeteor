<!DOCTYPE html>
<?php
session_start();

if ((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==true))
{
	header('Location: zalogowano.php');
	exit();
}
?>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width = device-width, initial-scale = 1">
<title>Logowanie</title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<style>
</style>
</head>
<body>
<div class="container">
<form action="logowanie.php" method="POST">
Login<br>
<input type="text" name="login"><br>
Hasło<br>
<input type="password" name="haslo"><br>
<input type="submit" value="Zaloguj">
</form>
<?php
	if(isset($_SESSION['blad']))
	echo $_SESSION['blad'];
?>
</div>
</body>
</html>