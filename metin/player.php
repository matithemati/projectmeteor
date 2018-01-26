<?php
include "config.php";

db_connect("player");

?>

<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel Zarządzania Serwerem</title>
</head>
<body>
<form method="GET">
Nick: <input type="text" name="search">
<input type="submit" value="Szukaj">
</form>
<?php
if(isset($_GET['acc'])){
    $acc = $_GET['acc'];
    $sql = "SELECT * FROM player WHERE account_id='$acc'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo '<table border="1"><tr><td>ID</td><td>Acc ID(test)</td><td>Nick</td><td>IP</td><td>Informacje</td></tr>';
        while($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $a_id = $row["account_id"];
        $nick = $row["name"];
        $ip = $row["ip"];

        echo "<tr><td>$id</td><td>$a_id</td><td>$nick</td><td>$ip</td><td><a href='./p_info.php?p=$id'>X</a></td></tr>";
    }
    echo "</table>";
    } else {
        echo "Brak postaci!";
    }
}



else if(isset($_GET['search'])){
    $search = $_GET['search'];

    $sql = "SELECT * FROM player WHERE name='$search'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo '<table border="1"><tr><td>ID</td><td>Acc ID(test)</td><td>Nick</td><td>IP</td><td>Informacje</td></tr>';
        while($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $a_id = $row["account_id"];
        $nick = $row["name"];
        $ip = $row["ip"];

        echo "<tr><td>$id</td><td>$a_id</td><td>$nick</td><td>$ip</td><td><a href='./p_info.php?p=$id'>X</a></td></tr>";
    }
    echo "</table>";
    } else {
        echo "Brak postaci!";
    }

}


?>
</body>
</html>