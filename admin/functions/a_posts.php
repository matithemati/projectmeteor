<?php
session_start();
include "../../functions/admin_check.php";
require_once "../../inc/db_connect.php";
$code = '';
$sql = "SELECT * FROM newsy ORDER BY id_newsy DESC";
$result = $conn->query($sql);
if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        $tytul = $row["tytul"];
        $id = $row["id_newsy"];
        $data = $row["data"];
        $tresc = $row["tresc"];
        $autor = $row["autor"];
        $code.= '<div class="post"><table><tr><td><p>'.$tytul.'</p><p>'.$tresc.'</p><p><span>'.$data.'</span> | <span>'.$autor.'</span></p></td><td class="place"></td><td><a class="white" href="functions/post_modify.php?id='.$id.'"><i class="fa fa-cog fa-4x" aria-hidden="true"></i></a></td> </tr></table></div>';
    }
}else{
    $code.='Niemożliwe.';
}

echo $code;
?>

