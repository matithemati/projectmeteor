<?php
session_start();
require_once "./inc/db_connect.php";
$login = $_SESSION['login'];
$email = $_SESSION['email'];
$date = $_SESSION['date'];
$acc_type = $_SESSION['acc_type'];

if($acc_type == 0){
    $acc_type_t = "STANDARDOWE";
    $acc_form = '<hr><form method="POST"><input type="text" name="card" placeholder="Numer karty"><input type="text" name="cvv" placeholder="CCV"><button type="submit"><i class="fa fa-diamond" aria-hidden="true"></i> ZOSTAŃ PREMIUM <i class="fa fa-diamond" aria-hidden="true"></i></button></form>';
}else{
    $acc_type_t = "PREMIUM";
    $acc_form = "";
}
if(isset($_POST['mail'])){
    $wszystko_OK=true;
    
    $email=$_POST['mail'];
	$emailB= filter_var($email, FILTER_SANITIZE_EMAIL); //zdrowy zdrowy zdrowy email
	
	if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
	{
		$wszystko_OK=false;
		$_SESSION['e_email']="Podaj poprawny adres email!";
	}
    
    if($wszystko_OK){
        $sql = "UPDATE uzytkownicy SET email='$emailB' WHERE login='$login'";
        $result = $conn->query($sql);
        $_SESSION['email'] = $emailB;
    }
}

if(isset($_POST['haslo1'])){
    $haslo1 = $_POST['haslo1'];
	$haslo2 = $_POST['haslo2'];
    $wszystko_OK=true;
	
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
	if ($wszystko_OK = true) {
	$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
    
    $sql = "UPDATE uzytkownicy SET pass='{$haslo_hash}' WHERE login='{$login}'";
    $result = $conn->query($sql);
        $_SESSION['modalON'] = "modalON";
         $_SESSION['modal_msg'] = 'Zmieniono hasło!';
         $_SESSION['modal_where'] = '<a href="http://www.project-meteor.pl/mojekonto.php"><button>OK</button></a>';
    }
}

if(isset($_POST['card'])){
    $card = $_POST['card'];
    $cvv = $_POST['cvv'];
    
    if(strlen($card)== 19 && strlen($cvv)== 3){
        $sql = "UPDATE uzytkownicy SET acc_type='1' WHERE login='{$login}'";
        $result = $conn->query($sql);
         $_SESSION['acc_type'] = 1;
         $_SESSION['modalON'] = "modalON";
         $_SESSION['modal_msg'] = 'Zakupiono <span class="gold">premium!</span>';
         $_SESSION['modal_where'] = '<a href="http://www.project-meteor.pl/mojekonto.php"><button>OK</button></a>';
    }
    else {
        $_SESSION['e_premium'] = '<div class="error mid">Wprowadź poprawne dane!</div>';
    }
}
?>
<html>
<head>
    <title>Project Meteor - moje konto</title>
    <?php include('inc/b_links.php')?>
</head>
<body>
    <div class="main_modal <?if(isset($_SESSION['modalON'])){echo $_SESSION['modalON'];unset($_SESSION['modalON']);}?>" id="main_modal">
        <div class="modal_content">
            <div class="caption"><span class="closed">&times;</span></div>
            <div class="m_content"><? echo $_SESSION['modal_msg'] ?></div>
            <div class="m_buttons">
                <div>
                    <? echo $_SESSION['modal_where'] ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="main">
        <?php include('inc/menu_a.php')?>
        <div class="main_content">
            <div class="my_acc">
                <h2 class="acc_caption">ZALOGOWANY JAKO <span class="big who"><?php echo $login;?></span></h2>
                <div class="acc_detail">
                    <div class="acc_info">
                        <div>
                            <p>Login: <span><?php echo $login;?></span></p>
                            <p>Email: <span><?php echo $email;?></span></p>
                        </div>
                        <div>
                            <p>Typ konta: <span><?php echo $acc_type_t;?></span></p>
                            <p>Data rejestracji: <span><?php echo $date;?></span></p>
                        </div>
                    </div>
                    <div class="acc_premium">
                    <?php echo $acc_form;?>
                    </div>
                    <?php if(isset($_SESSION['e_premium'])){echo $_SESSION['e_premium']; unset($_SESSION['e_premium']); }?>
                    <hr>
                    <div class="acc_change">
                        <form method="post" class="f1">
                            <p>ZMIANA HASŁA</p>
                            <input type="password" name="haslo1" placeholder="Podaj nowe hasło"/>
                            <input type="password" name="haslo2" placeholder="Powtórz hasło"/>
                            <button type="submit">ZMIEŃ HASŁO</button>
                            <?php if(isset($_SESSION['e_hasla'])){echo $_SESSION['e_hasla']; unset($_SESSION['e_hasla']); }?>
                        </form>
                        <form method="post" class="f2">
                            <p>ZMIANA MAILA</p>
                            <input type="email" name="mail" placeholder="Podaj nowy mail"/>
                            <button type="submit">ZMIEŃ MAILA</button>
                            <?php if(isset($_SESSION['e_email'])){echo $_SESSION['e_email']; unset($_SESSION['e_email']); }?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php include('inc/b_js.php')?>
</body>
</html>