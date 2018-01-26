<?php

session_start();

if (isset($_POST['email']))
{
	//udana walidacja
	$wszystko_OK=true;
	
	// sprawdzenie nickname
	
	$login = $_POST['login'];
	
	// sprawdzenie długości nicku
	
	if ((strlen($login)<3) || (strlen($login)>20))
	{
		$wszystko_OK=false;
		$_SESSION['e_login']="Login musi posiadać od 3 do 20 znaków!";
	}
	
	// sprawdzenie poprawnosci nicku (polskie znaki itp.)
	
	if (ctype_alnum($login)==false)
	{
		$wszystko_OK=false;
		$_SESSION['e_login']="Niedozwolony login!";
		
	}
	
	// sprawdzenie poprawności emaila
	
	$email=$_POST['email'];
	$emailB= filter_var($email, FILTER_SANITIZE_EMAIL); //zdrowy zdrowy zdrowy email
	
	if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
	{
		$wszystko_OK=false;
		$_SESSION['e_email']="Podaj poprawny adres email!";
	}
	
	
	// sprawdzenie poprawnosci hasła
	
	$haslo1 = $_POST['haslo1'];
	$haslo2 = $_POST['haslo2'];
	
	if ((strlen($haslo1)<8) || (strlen($haslo1)>20))
	{
		$wszystko_OK=false;
		$_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
	}
	
	// sprawdzenie identyczności haseł
	
	if ($haslo1!=$haslo2)
	{
		$wszystko_OK=false;
		$_SESSION['e_haslo']="Hasła różnią się od siebie!";
	}
	
	// hashowanie hasła
	
	$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
	
	
	// sprawdzenie akceptacji regulaminu
	
	if (!isset($_POST['regulamin']))
	{
		$wszystko_OK=false;
		$_SESSION['e_regulamin']="Potwierdź regulamin!";
	}
	
	
	// sprawdzenie captchy
	
	$sekret = "6LcJHhMUAAAAAHGoz-9KUo18swinNW0xaZiotmVZ";
	$sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
	
	$odpowiedz = json_decode($sprawdz);
	
	if ($odpowiedz->success==false)
	{
		$wszystko_OK=false;
		$_SESSION['e_captcha']="Potwierdź CAPTCHE!";
	}
	
	require_once "baza.php";
	
	mysqli_report(MYSQLI_REPORT_STRICT);
	
	
	try
	{
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_errno!=0)
		{
			throw new Exception(mysqli_connect_errno());
		}
		else
		{
			// sprawdzenie istnienia maila
			$rezultat = $conn->query("SELECT id FROM uzytkownicy WHERE email='$email'");
			
			
			if (!$rezultat) throw new Exception($conn->error);
			
			$ile_takich_maili = $rezultat->num_rows;
			if($ile_takich_maili>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_email']="Istnieje już konto o takim emailu!";
				}
				
			// sprawdzenie istnienia loginu
			$rezultat = $conn->query("SELECT id FROM uzytkownicy WHERE login='$login'");
			
			
			if (!$rezultat) throw new Exception($conn->error);
			
			$ile_takich_nickow = $rezultat->num_rows;
			if($ile_takich_nickow>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_login']="Istnieje już konto o takim loginie!";
				}
			
			
		if($wszystko_OK==true)
		{
			if ($conn->query("INSERT INTO uzytkownicy VALUES (NULL, '$login', '$haslo_hash', '$email', '0')"))
			{
			echo 'Zarejestrowano!';
					
			}
			else
			{
				throw new Exception($conn->error);
			}
		}
			$conn->close();
		}

	}
	
	catch(Exception $e)
	{
		echo '<br><span style="color:red;">Błąd serwera!</span>';
		echo '<br><span style="color:red;">Błąd: '.$e.'</span>'; // do usunięcia [informacja developerska o błędzie BD ;)]
		
	}
	
	
	
	

	
}
	
	
	
?>


<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">

<title>Rejestracja</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <style>
  .error {
	  color:red;
	  font-weight:bold;
  }
  </style>
</head>
<body>

<div class="container">

									<form method="POST">
										<label for="login">Login</label><br>
										<?php
										
										if (isset($_SESSION['e_login']))
										{
											echo '<div class="error">'.$_SESSION[e_login].'</div>';
											unset($_SESSION[e_login]);
										}
										
										?>
										<input type="text" name="login" id="login" placeholder="Login"><br>
										<label for="haslo">Hasło</label><br>
										<?php
										
										if (isset($_SESSION['e_haslo']))
										{
											echo '<div class="error">'.$_SESSION[e_haslo].'</div>';
											unset($_SESSION[e_haslo]);
										}
										
										?>
										<input type="password" name="haslo1" id="haslo" placeholder="Hasło"><br>
										<label for="haslo2">Wprowadź ponownie hasło</label><br>
										<input type="password" name="haslo2" id="haslo2" placeholder="Ponów hasło"><br>
									    <label for="exampleInputEmail1">Adres Email</label><br>
										<?php
										
										if (isset($_SESSION['e_email']))
										{
											echo '<div class="error">'.$_SESSION[e_email].'</div>';
											unset($_SESSION[e_email]);
										}
										
										?>
										<input type="email" name="email" id="exampleInputEmail1" placeholder="Email"><br><br>
										<label for="captcha">CAPTCHA</label><br>
										<?php
										
										if (isset($_SESSION['e_captcha']))
										{
											echo '<div class="error">'.$_SESSION[e_captcha].'</div>';
											unset($_SESSION[e_captcha]);
										}
										
										?>
										<div id="captcha" class="g-recaptcha" data-sitekey="6LcJHhMUAAAAAKkwBJbcxTlnsZGFn-UwPdh8tDt8"></div><br>
										<label class="checkbox-inline">
										<input type="checkbox" name="regulamin"> Akceptuję regulamin
										</label>
										<?php
										
										if (isset($_SESSION['e_regulamin']))
										{
											echo '<div class="error">'.$_SESSION[e_regulamin].'</div>';
											unset($_SESSION[e_regulamin]);
										}
										
										?>
										<br><br>
										<button type="submit">Zarejestruj</button>
										<button type="reset">Wyczyść</button><br>

									
									</form>
</div>

    </body>
</html>

