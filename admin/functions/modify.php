<?php
session_start();
include "../../functions/admin_check.php";

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <title>Edycja kont</title>
     <?php include('../../inc/f_links.php')?>
</head>
<body>
<?php
    require_once "../../inc/db_connect.php";
    if (isset($_GET['mod'])) {
        $user_id = $_GET['mod'];
        $query = "SELECT * FROM uzytkownicy WHERE id = $user_id";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $login = $row["login"];
                //$pass = $row["pass"];
                $email = $row["email"];
                $type  = $row["user"];
                $usr;                     
                if ($type) {$usr1 = "Administrator";$usr2 = "Użytkownik";$usR1="0";} else {$usr1 = "Użytkownik";$usr2 = "Administrator";$usR2="1";}
            }
        }
    } else {
        header("Location: ../index.php");
}

?>
        <div class="main">
            <div class="main_f">
                <h4>Edycja użytkownika <b><?php echo "{$login}"; ?></b>
                <p>ID: <b><?php echo "{$id}"; ?></b></p>
                </h4>
                
                <form action="" method="post">
                    <div class="in_2">
                        <div>Login</div><div><input type="text" name="login" value="<?php echo $login; ?>"></div><p class="clear"></p>
                    </div>
                    <div class="in_2">
                        <div>Hasło</div><div><input type="text" name="pass" placeholder="..."></div><p class="clear"></p>
                    </div>
                    <div class="in_2">
                        <div>Email</div><div><input type="email" name="email" value="<?php echo $email; ?>"></div><p class="clear"></p>
                    </div>
                    <div class="in_2 ff">
                        <div>Rodzaj konta</div><div><select name="usr_type"><option value="<? echo $usR1; ?>"><? echo $usr1; ?></option><option value="<? echo $usR2; ?>"><? echo $usr2; ?></option></select></div><p class="clear"></p>
                    </div>
                    <button name="modify" type="submit">ZAPISZ ZMIANY <i class="fa fa-pencil" aria-hidden="true"></i></button>
                </form>
                <h5><a href=".."><i class="fa fa-angle-double-left" aria-hidden="true"></i> POWRÓT</a></h5>
            </div>
        </div>
<?php
    if(isset($_POST['modify'])) {
        
        $login = $_POST['login'];
        $pass = $_POST['pass'];
        $email = $_POST['email'];
        $usr_type = $_POST['usr_type'];
        
        if(trim($pass) == '') {
               $query = "UPDATE uzytkownicy SET ";
               $query .="login = '{$login}', ";
               $query .="email = '{$email}', ";
               $query .="user = '{$usr_type}' ";
               $query .="WHERE id = {$id};";
            
               $result = $conn->query($query);
               header("Location: ../index.php");
        }
        
        else {
           $pass = password_hash($pass, PASSWORD_DEFAULT);
           $query = "UPDATE uzytkownicy SET ";
           $query .="login = '{$login}', ";
           $query .="pass = '{$pass}', ";
           $query .="email = '{$email}', ";
           $query .="user = '{$usr_type}' ";
           $query .="WHERE id = {$id};";
            
           $result = $conn->query($query);
           header("Location: ../index.php");
        }
        
    }
    
    
?>
</body>
</html>