<?php
session_start();
require_once "./inc/db_connect.php";
require_once "./functions/login_check.php";

if(isset($_GET['delete'])){
    $p_id = $_GET['id'];
    $del_id = $_GET['delete'];
    $sql = "DELETE FROM membership WHERE p_id={$p_id} AND u_id={$del_id}";
    $result = $conn->query($sql);
}

if(isset($_GET["delete_post"])){
    $del_post_id = $_GET["delete_post"];
    $sql = "DELETE FROM posts WHERE id={$del_post_id}";
    $result = $conn->query($sql);
}
?>


<html>
<head>
    <title>Project Meteor- projekt</title>
    <?php include('inc/b_links.php')?>
</head>
<body>
    <div class="main">
        <?php include('inc/menu_a.php')?>
        <div class="main_content">
            <div class="project_panel">
                <p class="backy"><a class="white" href="main.php"><button><i class="fa fa-angle-double-left" aria-hidden="true"></i> Powrót</button></a></p>
            <?php
            if(isset($_GET['id'])){
                $p_id = $_GET['id'];
                $u_id = $_SESSION['id'];
                $date = date('d-m-Y');

                $sql = "SELECT * FROM membership WHERE p_id={$p_id} AND u_id={$u_id}";
                $result = $conn->query($sql);
                if ($result->num_rows == 0) {
                    header("Location: main.php");
                    exit();
                }else{
                    $sql = "SELECT * FROM projects WHERE id={$p_id}";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()) {
                    $title = $row["title"];
                    }
                    echo '<div class="p_caption">'.$title.'</div>';

                    $sql = "SELECT * FROM membership WHERE p_id={$p_id} AND u_id={$u_id}";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()) {
                        $acc_type = $row["m_type"];
                    }
                    if ($acc_type == 1) {
                    echo '<form action="functions/add_user.php" method="post"><div class="box_2"><div><input class="box_input" type="text" name="add_user" placeholder="Szukaj kompanów"></div><div><button title="Szukaj" class="search" type="submit"><i class="fa fa-handshake-o" aria-hidden="true"></i></button></div><p class="clear"></p></div><input type="hidden" name="p_id" value="'.$p_id.'"/></form>';
                    }
                    
                    $sql = "SELECT * FROM membership WHERE p_id={$p_id}";
                    $result = $conn->query($sql);
echo<<<END
                    <div class="table_admin"><table class="table talbe-stripped tc">
                        <tr>
                            <td class="text-center">Login</td>
                            <td class="text-center">Email</td>
                            <td class="text-center">Rola</td>
                            <td class="text-center">Usuń</td>
                        </tr>
END;
                    while($row = $result->fetch_assoc()) {
                        $us_id = $row["u_id"];
                        $m_type = $row["m_type"];
                        $sql1 = "SELECT * FROM uzytkownicy where id={$us_id}";
                        $result1 = $conn->query($sql1);
                        while($row1 = $result1->fetch_assoc()) {
                        $id = $row1["id"];
                        $login = $row1["login"];
                        $email = $row1["email"];
                        }
                        if($m_type==1){
                            $m_type = "Administrator";
                        }
                        else {
                            $m_type = "User";
                        }
                        echo "<tr><td>{$login}</td><td>{$email}</td><td>{$m_type}</td><td><a href='./project.php?id={$p_id}&delete={$id}'>".'<i class="fa fa-user-times" aria-hidden="true"></i></a></td></tr>';
                    }
                    echo "</table></div>";
                }

                if(isset($_POST['add_post'])){
                    $post_content = $_POST['add_post'];

                    $sql = "INSERT INTO posts VALUES (NULL, '$post_content', $u_id, $p_id, '$date')";
                    $result = $conn->query($sql);

                }
                echo '<form method="post"><div class="box_2"><div><input class="box_input" type="text" name="add_post" placeholder="Dodaj post"></div><div><button class="search" type="submit"><i class="fa fa-comment-o" aria-hidden="true"></i></button></div><p class="clear"></p></div></form>';
                $sql = "SELECT * FROM posts WHERE p_id={$p_id} ORDER BY id DESC";
                $result = $conn->query($sql);

                if ($result->num_rows == 0) {
                    echo 'Napisz coś!';
                }

                else {
                    echo '<div class="posts_cont">';

                    while($row = $result->fetch_assoc()) {
                        $del_id = $row["id"];
                        $content = $row["content"];
                        $user_id = $row["u_id"];
                        $post_id = $row["p_id"];
                        $date = $row['data'];

                        $szukaj = "SELECT * FROM uzytkownicy WHERE id=$user_id";
                        $rezultat = $conn->query($szukaj);
                        while($row1 = $rezultat->fetch_assoc()) {
                            $user_id = $row1["login"];
                        }

                        if($acc_type==1){
                            echo '<div class="post"><table><tr><td><p><span class="who">'.$user_id.'</span></p><p>'.$content.'</p><p><span>'.$date.'</span><span></span></p></td><td class="place"></td><td><a class="white" href="project.php?id='.$post_id.'&delete_post='.$del_id.'"><i class="fa fa-times fa-4x" aria-hidden="true"></i></a></td></tr></table></div>';
                        }

                        else {
                            echo '<div class="post"><table><tr><td><p><span class="who">'.$user_id.'</span></p><p>'.$content.'</p><p><span>'.$date.'</span><span></span></p></td><td class="place"></td><td></td></tr></table></div>';    
                        }

                    }
                    echo "</div>";
                }
            }else{
                header("Location: ./index.php");
                exit();
            }
            ?>
            </div>
        </div>
    </div>
    
<?php include('inc/b_js.php')?>
</body>
</html>




