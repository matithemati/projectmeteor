<?php
include "config.php";
db_connect("player");

if(isset($_GET['eq'])){
    $id = $_GET['eq'];
    $sql = "SELECT * FROM item WHERE owner_id='$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        $vnum = $row["vnum"];
        $v_search = "SELECT * FROM item_proto WHERE vnum='$vnum'";
        $v_result = $conn->query($v_search);
        while($row1 = $v_result->fetch_assoc()) {
            $vnum = $row1["locale_name"];
        }
        $x = $row["count"];

        echo $vnum." : ".$x."<br>";
    }
    } else {
        echo "Brak przedmiotow!";
    }



}



else if(isset($_GET['p'])){
    $char = $_GET['p'];
    echo "Informacje o koncie";
    $sql = "SELECT * FROM player WHERE id='$char'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $nick = $row["name"];
        $a_id = $row["account_id"];
        $job = $row["job"];
        $play = $row["playtime"];
        $level = $row["level"];
        $gold = $row["gold"];
        $ip = $row["ip"];
        $alignment = $row["alignment"];
        $last = $row["last_play"];
        $horse = $row["horse_level"];

    }
    } else {
        echo "Brak postaci!";
    }

    $class[0] = "Wojownik (M)";
    $class[1] = "Ninja (M)";
    $class[2] = "Sura (M)";
    $class[3] = "Szaman (M)";
    $class[4] = "Wojownik (K)";
    $class[5] = "Ninja (K)";
    $class[6] = "Sura (K)";
    $class[7] = "Szaman (K)";


echo <<< END

ID: $id <br>
Nick: $nick <br>
Konto (ID - narazie): $a_id <br>
Klasa: $class[$job] <br>
Czas Gry: $play <br>
Poziom: $level <br>
Yang: $gold <br>
Punkty Rangi: $alignment <br>
Poziom Konia: $horse <br>
Ostatnie Logowanie: $last <br>
IP: $ip <br>
<a href="?eq=$id">Ekwipunek</a>


END;


}


?>