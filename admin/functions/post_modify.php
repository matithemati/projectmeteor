<?php
session_start();
require_once "../../inc/db_connect.php";
include "../../functions/admin_check.php";
$mod = $_GET['id'];

if(isset($_POST["tytul"])){
   $title = $_POST['tytul'];
   $content = $_POST['tresc'];
    
   $query = "UPDATE newsy SET ";
   $query .="tytul = '{$title}', ";
   $query .="tresc = '{$content}' ";
   $query .="WHERE id_newsy = {$mod};";

   $result = $conn->query($query);
    header("Location: ../posty.php");
    exit();
}

$sql = "SELECT * FROM newsy WHERE id_newsy = {$mod}";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    $title = $row["tytul"];
    $content = $row["tresc"];
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <title>Edycja newsów</title>
     <?php include('../../inc/f_links.php')?>
</head>
<body>
    <div class="main">
        <div class="main_f">
            <h4>Edycja newsa <b><?php echo $title; ?></b>
            <p></p>
            </h4>

            <form action="" method="post">
                <div class="in_2">
                    <div>Tytuł</div><div><input type="text" name="tytul" value="<?php echo $title; ?>" /><br></div><p class="clear"></p>
                </div>
                <div class="in_2">
                    <div>Treść</div><div><input type="text" name="tresc" value="<?php echo $content; ?>"/></div><p class="clear"></p>
                </div>
                
                
                <button type="submit">ZAPISZ ZMIANY <i class="fa fa-pencil" aria-hidden="true"></i></button>
            </form>
            <h5><a href="../posty.php"><i class="fa fa-angle-double-left" aria-hidden="true"></i> POWRÓT</a></h5>
        </div>
    </div>
</body>
</html>