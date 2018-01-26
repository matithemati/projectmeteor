<?php
session_start();
require_once "../../inc/db_connect.php";
include "../../functions/admin_check.php";

if(isset($_POST["tytul"])){
    $tytul = $_POST["tytul"];
    $tresc = $_POST["tresc"];
    $autor = $_SESSION["login"];
    $data = date('d-m-Y');
    $sql = "INSERT INTO newsy VALUES (NULL,'$tytul','$data','$tresc','$autor')";
    $result = $conn->query($sql);
    header('Location: ../posty.php');
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <title>Nowy news</title>
     <?php include('../../inc/f_links.php')?>
</head>
<body>
    <div class="main">
        <div class="main_f">
            <h4>Nowy news<p></p></h4>

            <form action="" method="post">
                <div class="in_2">
                    <div>Tytuł</div><div><input type="text" name="tytul"/><br></div><p class="clear"></p>
                </div>
                <div class="in_2">
                    <div>Treść</div><div><input type="text" name="tresc"/></div><p class="clear"></p>
                </div>
                <button type="submit">STWÓRZ NEWSA <i class="fa fa-pencil" aria-hidden="true"></i></button>
            </form>
            <h5><a href="../posty.php"><i class="fa fa-angle-double-left" aria-hidden="true"></i> POWRÓT</a></h5>
        </div>
    </div>
</body>
</html>