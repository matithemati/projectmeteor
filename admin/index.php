<?php
session_start();
include "../functions/admin_check.php";
require_once "../inc/db_connect.php";
?>
<?php
if(isset($_GET['delete'])) {
$user_id = $_GET['delete'];
$sql = "DELETE FROM uzytkownicy WHERE id = $user_id";
$rezultat = $conn->query($sql);
}

if(isset($_GET['st1'])) {
    $id = $_GET['st1'];
    $status = ($_GET['st2'])?0:1;
    $sql = "UPDATE uzytkownicy SET status = $status WHERE id = $id";
    $rezultat = $conn->query($sql);
}
?>


<!DOCTYPE html>
<html lang="pl">

<head>
    <title>Panel Administracyjny</title>
    <?php include('../inc/a_links.php')?>
</head>
<body>
    <div class="a_header">
        <div class="a_title">PANEL ADMINISTRACYJNY</div>
        <div class="a_buttons">
            <a href="http://www.project-meteor.pl"><button>Strona Główna</button></a>
            <a href="http://www.project-meteor.pl/admin/posty.php"><button>Posty</button></a>
        </div>
    </div>
    <div class="main">
        <section class="a_function">
        <header>
            <h3 class="a_hedd">Ostatnio założone konta <button title="Pokaż" id="atable"><i class="fa fa-long-arrow-up" aria-hidden="true"></i> <i class="fa fa-long-arrow-up" aria-hidden="true"></i> <i class="fa fa-long-arrow-up" aria-hidden="true"></i></button></h3>
        </header>
        <div class="table_admin" id="tb1">
        <table class="table talbe-stripped">
            <tr>
                <td class="text-center">ID</td>
                <td class="text-center">Login</td>
                <td class="text-center">Email</td>
                <td class="text-center">Data Rejestracji</td>
                <td class="text-center">Typ Konta</td>
                <td class="text-center">Adres IP</td>
                <td class="text-center">Modyfikuj</td>
                <td class="text-center">Status</td>
                <td class="text-center">Usuń</td>
            </tr>
<?php


$sql = "SELECT * FROM uzytkownicy ORDER BY id DESC LIMIT 12";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		$id = $row["id"];
		$login = $row["login"];
		//$pass = $row["pass"];
		$email = $row["email"];
		$type = $row["user"];
        $date = $row["date"];
        $ip = $row["ip"];
        $status = $row["status"];
        $status_f = ($status) ? '<i class="fa fa-lock" aria-hidden="true"></i>':'<i class="fa fa-unlock-alt" aria-hidden="true"></i>';
		$usr;
		if ($type == 1) {
		$usr = '<span class="gold">Administrator</span>';
		}
		else {
			$usr = "User";
		}
		echo<<<END
         <tr>
         <td class="text-center">$id</td>
         <td class="text-center">$login</td>
         <td class="text-center">$email</td>
         <td class="text-center">$date</td>
         <td class="text-center">$usr</td>
         <td class="text-center"><a title="Szukaj multikont" href='index.php?ip={$ip}#search'>{$ip}</a></td>
         <td class="text-center"><a title="Edytuj konto" href='functions/modify.php?mod={$id}'><i class="fa fa-cog" aria-hidden="true"></i></a></td>
         <td class="text-center"><a title="Zmień status" href='index.php?st1={$id}&st2={$status}'>{$status_f}</i></a></td>
         <td class="text-center"><a title="Usuń konto" href='index.php?delete={$id}'><i class="fa fa-times" aria-hidden="true"></i></a></td>
         </tr>
END;
		
    }
} else {
	echo "Brak rekordów.";
}
//$conn->close();
?>


        </table>
        </div>
        </section>
        <hr>
        <a name="search"></a>
        <section class="a_function">
            <header>
                <h3 class="a_hedd">Szukaj multikont</h3>
            </header>
            <form method="get" action="#search">
                <div class="box_2">
                    <div><input class="box_input" type="text" name="ip" placeholder="IP np. 185.192.243.245"></div>
                    <div><button class="search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button></div>
                    <p class="clear"></p>
                </div>  
            </form>
            <div class="table_admin" id="tb1">

            <?php 
            if(isset($_GET['ip'])) {
                $ip_lookup = $_GET['ip'];
                $sql = "SELECT * FROM uzytkownicy WHERE ip = '$ip_lookup' ORDER BY id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
echo<<<END
            <table class="table talbe-stripped">
                <tr>
                    <td class="text-center">ID</td>
                    <td class="text-center">Login</td>
                    <td class="text-center">Email</td>
                    <td class="text-center">Data Rejestracji</td>
                    <td class="text-center">Typ Konta</td>
                    <td class="text-center">Adres IP</td>
                    <td class="text-center">Modyfikuj</td>
                    <td class="text-center">Status</td>
                    <td class="text-center">Usuń</td>
                </tr>
END;
                    while($row = $result->fetch_assoc()) {
                        $id = $row["id"];
                        $login = $row["login"];
                        //$pass = $row["pass"];
                        $email = $row["email"];
                        $type = $row["user"];
                        $date = $row["date"];
                        $ip = $row["ip"];
                        $status = $row["status"];
                        $status_f = ($status) ? '<i class="fa fa-lock" aria-hidden="true"></i>':'<i class="fa fa-unlock-alt" aria-hidden="true"></i>';
                        $usr;
                        if ($type == 1) {
                        $usr = '<span class="gold">Administrator</span>';
                        }
                        else {
                            $usr = "User";
                        }
echo<<<END
         <tr>
         <td class="text-center">$id</td>
         <td class="text-center">$login</td>
         <td class="text-center">$email</td>
         <td class="text-center">$date</td>
         <td class="text-center">$usr</td>
         <td class="text-center">$ip</td>
         <td class="text-center"><a href='functions/modify.php?mod={$id}'><i class="fa fa-cog" aria-hidden="true"></i></a></td>
         <td class="text-center"><a title="Zmień status" href='index.php?st1={$id}&st2={$status}'>{$status_f}</i></a></td>
         <td class="text-center"><a href='index.php?delete={$id}'><i class="fa fa-times" aria-hidden="true"></i></a></td>
         </tr>
END;
		
    }
    echo "</table>";
} else {
	echo '<div class="error">Brak użytkowników o IP: <b>'.$ip_lookup.'</b></div>';
}
            }
            
            
            ?>
        </div>
        </section>
        <hr>
        <a name="searcha"></a>
        <section class="a_function">
            <header>
                <h3 class="a_hedd">Szukaj użytkowników</h3>
            </header>
            <form method="get" action="#searcha">
                <div class="box_2">
                    <div><input class="box_input" type="text" name="srch" placeholder="np. Tomek"></div>
                    <div><button class="search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button></div>
                    <p class="clear"></p>
                </div>
                <div><label><input type="radio" name="where" value="0" checked> <span class="choice">login</span></label> <label><input type="radio" name="where" value="1"> <span class="choice">email</span></label></div>
            </form>
            <div class="table_admin">
                <?php
                if(isset($_GET['where'])){
                    $choice = $_GET['where'];
                    $inp = $_GET['srch'];
                    
                    if($choice==0){
                        $typ = 'login';
                        $error = "loginie";
                    }else{
                        $typ = 'email';
                        $error = "emailu";
                    }
                    
                       
                    $sql = "SELECT * FROM uzytkownicy WHERE {$typ} LIKE '%{$inp}%'";
                    $result = $conn->query($sql);
                    
                        if ($result->num_rows > 0) {
echo<<<END
                    <table class="table talbe-stripped">
                        <tr>
                            <td class="text-center">ID</td>
                            <td class="text-center">Login</td>
                            <td class="text-center">Email</td>
                            <td class="text-center">Data Rejestracji</td>
                            <td class="text-center">Typ Konta</td>
                            <td class="text-center">Adres IP</td>
                            <td class="text-center">Modyfikuj</td>
                            <td class="text-center">Status</td>
                            <td class="text-center">Usuń</td>
                        </tr>
END;
                            while($row = $result->fetch_assoc()) {
                                $id = $row["id"];
                                $login = $row["login"];
                                //$pass = $row["pass"];
                                $email = $row["email"];
                                $type = $row["user"];
                                $date = $row["date"];
                                $ip = $row["ip"];
                                $status = $row["status"];
                                $status_f = ($status) ? '<i class="fa fa-lock" aria-hidden="true"></i>':'<i class="fa fa-unlock-alt" aria-hidden="true"></i>';
                                $usr;
                                if ($type == 1) {
                                $usr = '<span class="gold">Administrator</span>';
                                }
                                else {
                                    $usr = "User";
                                }
echo<<<END
                 <tr>
                 <td class="text-center">$id</td>
                 <td class="text-center">$login</td>
                 <td class="text-center">$email</td>
                 <td class="text-center">$date</td>
                 <td class="text-center">$usr</td>
                 <td class="text-center">$ip</td>
                 <td class="text-center"><a href='functions/modify.php?mod={$id}'><i class="fa fa-cog" aria-hidden="true"></i></a></td>
                 <td class="text-center"><a title="Zmień status" href='index.php?st1={$id}&st2={$status}'>{$status_f}</i></a></td>
                 <td class="text-center"><a href='index.php?delete={$id}'><i class="fa fa-times" aria-hidden="true"></i></a></td>
                 </tr>
END;

            }
            echo "</table>";
        } else {echo '<div class="error">Brak użytkowników o '.$error.': <b>'.$inp.'</b></div>';}
        }           
       ?>
        </div>
        </section>
    </div>
    
    <script src="/../js/a_javascript.js"></script>
</body>

</html>
