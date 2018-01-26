<?php

require_once "inc/db_connect.php";

$haslo = "cwel";
$haslo_hash = password_hash($haslo, PASSWORD_DEFAULT);
$date = date('d-m-Y');
$user_ip = $_SERVER['REMOTE_ADDR'];

for($i=11; $i<=30; $i++) {
    $login = "Konto".$i;
    $email = "konto".$i."@yi.pl";
    $sql = "INSERT INTO uzytkownicy VALUES (NULL, '$login', '$haslo_hash', '$email', '0', '$date', '$user_ip', '0', '0', '0')";
    $rezultat = $conn->query($sql);
    echo "<br>Done ".$i;
}
?>