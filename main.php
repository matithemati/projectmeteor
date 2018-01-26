<?php
    session_start();
    require_once "./inc/db_connect.php";
    require_once "./functions/login_check.php";
?>
<html>
<head>
    <title>Project Meteor</title>
    <?php include('inc/b_links.php')?>
</head>
<body>
    <div class="main">
        <?php include('inc/menu_a.php')?>
        <div class="main_content">
            <div class="projects">
                <?php
                    $sql = "SELECT * FROM membership WHERE u_id={$_SESSION['id']}";
                    $result = $conn->query($sql);

                    if ($result->num_rows == 0) {
                        echo '<div class="project"><div class="p_capt">Załóż nowy projekt!</div><div class="p_button"><a href="./create.php?nowy"><button><i class="fa fa-plus-square" aria-hidden="true"></i></button></a></div></div>';
                    }

                    else {
                        if ($_SESSION['acc_type'] == 1) {
                             echo '<div class="project"><div class="p_capt">Załóż nowy projekt!</div><div class="p_button"><a href="./create.php?nowy"><button><i class="fa fa-plus-square" aria-hidden="true"></i></button></a></div></div>';
                        }
                        while($row = $result->fetch_assoc()) {
                          $p_id = $row["p_id"];
                          $sql = "SELECT * FROM projects WHERE id={$p_id}";
                            $result2 = $conn->query($sql);
                            while($row2 = $result2->fetch_assoc()) {
                                $title = $row2["title"];
                                        echo '<div class="project"><div class="p_capt">'.$title.'</div><div class="p_button"><a href="project.php?id='.$p_id.'"><button><i class="fa fa-angle-double-right" aria-hidden="true"></i></button></a></div> </div>';
                            }
                        }
                    }
                ?>

            </div>
            <?php
            $szukaj = "SELECT * FROM newsy ORDER BY id_newsy DESC LIMIT 1";
            $rezultat = $conn->query($szukaj);
            while($row1 = $rezultat->fetch_assoc()) {
                $tytul = $row1["tytul"];
                $data = $row1["data"];
                $tresc = $row1["tresc"];
                $autor = $row1["autor"];
            }
            ?>
            <div class="news_container">
                <div class="post"><table><tr><td><p><?php echo $tytul ?></p><p><?php echo $tresc ?></p><p><span><?php echo $data ?></span> | <span><?php echo $autor ?></span></p></td><td class="place"></td><td></td></tr></table></div>
            </div>
        </div>
    </div>
    
<?php include('inc/b_js.php')?>
</body>
</html>
