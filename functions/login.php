<?php
	session_start();
	
	
/*	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location: ../index.php');
		exit();
	}*/
	
	require_once "../inc/db_connect.php";

	$polaczenie = @new mysqli($servername, $username, $password, $dbname);
	
	if($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		
		
		if($rezultat = @$polaczenie->query(sprintf( "SELECT * FROM uzytkownicy WHERE login='%s'",
		mysqli_real_escape_string($polaczenie,$login))))
		{
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
				$wiersz = $rezultat->fetch_assoc();
				
				if(password_verify($haslo, $wiersz['pass']))
				{
				
				
					

					$_SESSION['id'] = $wiersz['id'];
					$_SESSION['login'] = $wiersz['login'];
					$_SESSION['email'] = $wiersz['email'];
					$_SESSION['user'] = $wiersz['user'];
					$_SESSION['date'] = $wiersz['date'];
                    $_SESSION['acc_type'] = $wiersz['acc_type'];
                    $_SESSION['status'] = $wiersz['status'];
                    
                    if ($_SESSION['status']==0) {
                        $_SESSION['zalogowany'] = true;
                    }
                    
                    else {
                        $_SESSION['zalogowany'] = false;
                        echo "Twoje konto zostalo zablokowane przez Administratora!";
                        exit();
                    }
                    
                    if($_SESSION['user']==1) {
                        $_SESSION['admin'] = true;
                    }
					
					
					unset($_SESSION['blad']);
					$rezultat->close();
					header('Location: ../main.php');
                    //echo "Zalogowano!";
                   // echo $_SESSION['login'];
				
				}
				
				else
				{
					$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
					header('Location: ../rejestracja.php');
				}
			}
			
			
			else
			{
				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: ../rejestracja.php');
			}
			
		}
		
		$polaczenie->close();
		
	}
?>