<?php
include "config.php";
if(isset($_GET['test'])){
    // try {
    //     if( $sql = new PDO(
    //         'mysql:host=5.206.225.2;dbname=account;encoding=utf8;port=3306',
    //         'root','admin123#')) {
    //             echo '<script>alert("Połączenie: OK")</script>';
    //         } 
      
    //   } catch( PDOException $e ) { echo '<script>alert("Połączenie: Brak")</script>'; echo $e;}

    db_connect("account");
    
    if ($conn->connect_error) {
        echo '<script>alert("Połączenie: Brak")</script>';
    }

    else {
        echo '<script>alert("Połączenie: OK")</script>';
    }


}

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel Zarządzania Serwerem</title>
</head>
<body>
    <br>1. <a href="./?test">Test połączenia z Bazą Danych Serwera</a>
    <br>2. <a href="./account.php">Konta</a>
    <br>3. <a href="./player.php">Postacie</a>
    <br>4. <a href="./bans.php">Bany</a>
</body>
</html>