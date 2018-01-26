<?php
require_once "../inc/db_connect.php";

$u_login = $_POST['add_user'];
$p_id = $_POST['p_id'];

$sql = "SELECT * FROM uzytkownicy WHERE login='{$u_login}'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    $u_id = $row["id"];
}

$sql = "SELECT * FROM membership WHERE u_id = {$u_id} AND p_id = {$p_id}";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $_SESSION["e_kompan"] = '<div class="error">Nie możesz tego zrobić!</div>';
}

else {
    $sql = "INSERT INTO membership VALUES (NULL, {$p_id}, {$u_id}, '0')";
    $result = $conn->query($sql);
}
header("Location: ../project.php?id=$p_id");
?>