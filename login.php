<?php
	session_start();
if (isset($_SESSION['zalogowany'])) {
    header("Location: ./mojekonto.php");
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <title>Project Meteor - logowanie</title>
    <?php include('inc/b_links.php')?>
</head>
<body>
    <div class="main">
        <div class="m_flex">
            <div class="m_form">
                <h1>LOGOWANIE<span>Witamy ponownie!</span></h1>
                <form method="POST" action="functions/login.php">
                <div class="f_label">Login</div>
                <input type="text" name="login" id="login" placeholder="Login">
                <div class="f_label">Hasło</div>
                <input type="password" name="haslo" id="haslo" placeholder="Hasło"> 
                <label class="checkbox-inline"><a href="mail_recovery.php">Zapomniałem hasła</a></label>
                <button type="submit">Zaloguj</button>
                <div class="buttons">
                    <button type="reset">Wyczyść pola formularza</button>
                    <button onclick="location.href='http://www.project-meteor.pl/rejestracja.php';" type="button" class="back">Nie mam jeszcze konta</button> 
                </div>
            </form>
            </div>
        </div>
    </div>
</body>
</html>