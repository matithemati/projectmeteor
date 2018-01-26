<?php
session_start();
if (isset($_SESSION['zalogowany'])) {
    header("Location: mojekonto.php");
}
require_once "inc/db_connect.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zmiana hasła</title>
    <?php include("inc/b_links.php");?>
</head>
<body>
 <div class="main">
        <div class="m_flex">
            <div class="m_form">
            <h1>ZMIANA HASŁA<span>W razie problemów prosimy o kontakt.</span></h1>
  <?php
    
    if(!isset($_GET['email'])){
        // nie ruszać tabów w tym blokowym echo!
echo <<< END
   <form action="" method="post">
   <input type="email" name="mail" placeholder="Podaj email" required>
   <button type="submit" name="change">Przywróć</button>
    </form>

END;
    }
    
    if(isset($_POST['change'])) {
        $mail = $_POST['mail'];
        
        $sql = "SELECT email FROM uzytkownicy WHERE email = '$mail'";
            
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $code = rand(pow(10, 9-1), pow(10, 9)-1);
            
            $sql = "UPDATE uzytkownicy SET e_key = $code WHERE email = '$mail'; ";
            $result = $conn->query($sql);
            
            
        $msg = "Witaj {$mail}\nOto twój link do zmiany hasła:\nhttp://www.project-meteor.pl/mail_recovery.php?email={$mail}&key={$code}";
        $msg = wordwrap($msg,70);
        mail("{$mail}","Project-Meteor.pl - Reset hasła.",$msg);
            
            $_SESSION['modalON'] = 'modalON';
			$_SESSION['modal_msg'] = 'Sprawdź maila!';
			$_SESSION['modal_where'] = '<a href="http://www.project-meteor.pl"><button>OK</button></a>';
        }
        
        else {
            echo '<div class="error">Nie ma takiego adresu.</div>';
        }
        
        
        
        
        
    }
    
    
?>

<?php
    if(isset($_GET['email'])) {
        
        $email = $_GET['email'];
        $code = $_GET['key'];
        
        $sql = "SELECT e_key FROM uzytkownicy WHERE email='$email'; ";
        $result = $conn->query($sql);
        
        while ($row = $result->fetch_assoc()) {
            $code_2 = $row["e_key"];
        }
        if($code_2==0) {
            echo "Niepoprawny link!";
        }
        
        else if($code==$code_2) {
            echo<<<END
<form action="" method="post">
<input type="password" name="haslo1" placeholder="Nowe hasło" required/>
<input type="password" name="haslo2" placeholder="Nowe hasło" required/>
<button type="submit" name="email_change">Zmień</button>
<input type="hidden" name="mail" value="$email"/>
</form>
END;
        } else{
            echo "Niepoprawny link!";
        }
    }
    
?>

<?php

    if(isset($_POST['email_change'])) {

	$wszystko_OK=true;
	$haslo1 = $_POST['haslo1'];
	$haslo2 = $_POST['haslo2'];
	$mail = $_POST['mail'];
	
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
	
	
        
        if($wszystko_OK) {
            $haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
            
            $sql = "UPDATE uzytkownicy SET pass='$haslo_hash' WHERE email='$mail'";
            $result = $conn->query($sql);
            
            //$code = rand(pow(10, 9-1), pow(10, 9)-1);
            $code = 0;
            
            $sql = "UPDATE uzytkownicy SET e_key = $code WHERE email = '$mail'; ";
            $result = $conn->query($sql);
            
            echo "Zmieniono! ";
        }
        
        else {
            echo $_SESSION['e_haslo'];
        }
        
    }
    

?>
            </div>
        </div>
    </div>
    <div class="main_modal <?if(isset($_SESSION['modalON'])){echo $_SESSION['modalON'];unset($_SESSION['modalON']);}?>" id="main_modal">
        <div class="modal_content">
            <div class="caption"><span class="closed" onclick="document.getElementById('main_modal').style.display='none'">&times;</span></div>
            <div class="m_content"><? echo $_SESSION['modal_msg'] ?></div>
            <div class="m_buttons">
                <div>
                    <? echo $_SESSION['modal_where'] ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>