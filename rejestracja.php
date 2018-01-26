<?php
session_start();
if (isset($_SESSION['zalogowany'])) {
    header("Location: ./mojekonto.php");
}

require_once "inc/db_connect.php";

$user_ip = $_SERVER['REMOTE_ADDR'];

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
		$_SESSION['e_hasla']="Hasła różnią się od siebie!";
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
	
    
/*	$sekret = "6LdeHDcUAAAAAHZwx54u_iQSFZwE1wqSG3ozkjAg";
	$sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
	
	$odpowiedz = json_decode($sprawdz);
	
	if ($odpowiedz->success==false)
	{
		$wszystko_OK=false;
		$_SESSION['e_captcha']="Potwierdź CAPTCHE!";
	}*/
	
	mysqli_report(MYSQLI_REPORT_STRICT);
	
	
	try
	{
		//$conn = new mysqli('localhost', 'samuelg_meteor', '1234', 'samuelg_meteor');
		//$conn = new mysqli($servername, $username, $password, $dbname);
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
			$date = date('d-m-Y');
			if ($conn->query("INSERT INTO uzytkownicy VALUES (NULL, '$login', '$haslo_hash', '$email', '0', '$date', '$user_ip', '0', '0', '0')"))
			{
			$_SESSION['modalON'] = 'modalON';
			$_SESSION['modal_msg'] = 'Zarejestrowano!';
			$_SESSION['modal_where'] = '<a href="http://www.project-meteor.pl/login.php"><button>Zaloguj się</button></a>';
					
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
    <title>Project Meteor - rejestracja</title>
    <?php include('inc/b_links.php')?>
</head>
<body>
    <div class="main_modal <?if(isset($_SESSION['modalON'])){echo $_SESSION['modalON'];unset($_SESSION['modalON']);}?>" id="main_modal">
        <div class="modal_content">
            <div class="caption"><span class="closed" onclick="document.getElementById('main_modal').style.display='none'">&times;</span></div>
            <div class="m_content"><? echo $_SESSION['modal_msg'] ?></div>
            <div class="m_buttons">
                <div>
                    <? echo $_SESSION['modal_where'] ?>
                    <a><button onclick="document.getElementById('main_modal').style.display='none'">OK</button></a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="main">
        <div class="m_flex">
            <div class="m_form">
                <h1>REJESTRACJA<span>Stwórz konto i przejdź do rzeczy!</span></h1>
                <form method="POST">
                <div class="f_label">Login</div>
                <input type="text" name="login" id="login" placeholder="Login" value="<?php echo $login;?>">
                <?php						
                if (isset($_SESSION['e_login']))
                {
                    echo '<div class="error">'.$_SESSION[e_login].'</div>';
                    unset($_SESSION[e_login]);
                }
                ?>    
                <div class="f_label">Hasło</div>
                <input type="password" name="haslo1" id="haslo" placeholder="Hasło">
                <?php							
                if (isset($_SESSION['e_haslo']))
                {
                    echo '<div class="error">'.$_SESSION[e_haslo].'</div>';
                    unset($_SESSION[e_haslo]);
                }						
                ?>    
                <div class="f_label">Wprowadź ponownie hasło</div>
                <input type="password" name="haslo2" id="haslo2" placeholder="Ponów hasło">
                <?php				
                if (isset($_SESSION['e_hasla']))
                {
                    echo '<div class="error">'.$_SESSION[e_hasla].'</div>';
                    unset($_SESSION[e_hasla]);
                }
                ?>    
                <div class="f_label">Adres Email</div>
                <input type="email" name="email" id="exampleInputEmail1" placeholder="Email" value="<?php echo $email;?>">
                <?php
                if (isset($_SESSION['e_email']))
                {
                    echo '<div class="error">'.$_SESSION[e_email].'</div>';
                    unset($_SESSION[e_email]);
                }
                ?>
                <label class="checkbox-inline"><input type="checkbox" name="regulamin"> Akceptuję <a href="">regulamin</a>.</label>
                <?php						
                if (isset($_SESSION['e_regulamin']))
                {
                    echo '<div class="error">'.$_SESSION[e_regulamin].'</div>';
                    unset($_SESSION[e_regulamin]);
                }
                ?>
                <button type="submit">Zarejestruj</button>
                <div class="buttons">
                    <button type="reset">Wyczyść</button>
                    <button onclick="location.href='http://www.project-meteor.pl/login.php';" type="button" class="back">Mam już konto</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</body>
</html>
