<?php
session_start();
require_once "./functions/login_check.php";
require_once "./inc/db_connect.php";
if((!isset($_GET['nowy'])) && (!isset($_GET['add']))){
    header("Location: ./main.php");
    exit();
}
?>
<html>
<head>
    <title>Project Meteor</title>
    <?php include('inc/b_links.php')?>
</head>
<body>
    <div class="main">
        <?php include('inc/menu_a.php')?>
        <div class="p_maker">
            <?php
            if(isset($_GET['add'])){
                $title = $_GET['title'];
                $id = $_SESSION['id'];
                $sql = "SELECT * FROM projects WHERE title='{$title}' AND owner_id={$id}";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo '<div class="e_box"><p class="f_caption">Nie możesz założyć dwóch projektów o takiej samej nazwie!</p><a href="create.php?nowy"><button type="button" class="b_butt"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Powrót </button></a></div>';
                }

                else {
                    $sql = "INSERT INTO projects VALUES (NULL, '{$title}', {$id})";
                    $result = $conn->query($sql);

                    $sql = "SELECT * FROM projects WHERE title='{$title}' AND owner_id={$id}";
                    $result1 = $conn->query($sql);

                    if ($result1->num_rows > 0) {
                        while($row = $result1->fetch_assoc()) {
                            $id_p = $row["id"];
                            $sql = "INSERT INTO membership VALUES (NULL, {$id_p}, {$id}, 1)";
                            $result = $conn->query($sql);
                        }
                    }
                    header("Location: ./main.php");
                }
            }
            ?>
            <?php

            if(isset($_GET['nowy'])){
            echo '<form action="" method="get"><p class="f_caption">Załóż nowy projekt</p><input type="text" name="title" required> <button type="submit" name="add"><i class="fa fa-pencil" aria-hidden="true"></i></button><a href="main.php"></form>';
            }
            ?>
            
        </div>
    </div>
    
<?php include('inc/b_js.php')?>
</body>
</html>


