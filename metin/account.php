<?php
include "config.php";
db_connect("account");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Konta</title>
</head>
<body>
    <?php

echo <<< END
Szukaj: 
<form method="GET">
<input type="text" name="search" />
<input type="submit" value="Szukaj!">
</form>
END;

if(isset($_GET['search'])){
    $ip_s = $_GET['search'];

    $sql = "SELECT * FROM account WHERE web_ip='$ip_s' ORDER BY id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo '<table border="1"><tr><td>ID</td><td>Login</td><td>Kod Usunięcia Postaci</td><td>Email</td><td>Data Rejestracji</td><td>Ostatnie Logowanie</td><td>IP</td><td>Edytuj</td></tr>';
        while($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $login = $row["login"];
        $s_id = $row["social_id"];
        $email = $row["email"];
        $create_time = $row["create_time"];
        $last_play = $row["last_play"];
        $ip = $row["web_ip"];

        echo "<tr><td>$id</td><td><a href='../player.php?acc=$id'>$login</a></td><td>$s_id</td><td>$email</td><td>$create_time</td><td>$last_play</td><td><a href='?search=$ip'>$ip</a></td><td>X</td></tr>";
    }
    echo "</table>";
    } else {
        echo "Brak kont!";
    }

}
    echo "<br>";
    $sql = "SELECT * FROM account";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo '<table border="1"><tr><td>ID</td><td>Login</td><td>Kod Usunięcia Postaci</td><td>Email</td><td>Data Rejestracji</td><td>Ostatnie Logowanie</td><td>IP</td><td>Edytuj</td></tr>';
        while($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $login = $row["login"];
        $s_id = $row["social_id"];
        $email = $row["email"];
        $create_time = $row["create_time"];
        $last_play = $row["last_play"];
        $ip = $row["web_ip"];

        echo "<tr><td>$id</td><td><a href='../player.php?acc=$id'>$login</a></td><td>$s_id</td><td>$email</td><td>$create_time</td><td>$last_play</td><td><a href='?search=$ip'>$ip</a></td><td>X</td></tr>";
        }
    echo "</table>";
    } else {
        echo "Brak kont!";
    }
    ?>
</body>
</html>

