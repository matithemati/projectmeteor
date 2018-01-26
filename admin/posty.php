<?php
session_start();
include "../functions/admin_check.php";
require_once "../inc/db_connect.php";
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>Panel Administracyjny - posty</title>
    <?php include('../inc/a_links.php')?>
</head>
<body>
    <div class="a_header">
        <div class="a_title">PANEL ADMINISTRACYJNY - NEWSY</div>
        <div class="a_buttons">
            <a href="http://www.project-meteor.pl"><button>Strona Główna</button></a>
            <a href="http://www.project-meteor.pl/admin"><button>Powrót</button></a>
        </div>
    </div>
    <div class="main">
        <div class="news_viewer">
            <header><h3 class="a_hedd">Wszystkie newsy <button id="newS" title="Wczytaj wszystkie newsy"><i class="fa fa-folder-open" aria-hidden="true"></i></button></h3></header>
            <div id="posts"></div>
        </div>
        <hr>
        <div class="news_viewer">
            <header><h3 class="a_hedd">Napisz newsa <a href="functions/nowy_news.php"><button title="Napisz nowego newsa"><i class="fa fa-pencil-square" aria-hidden="true"></i></button></a></h3></header>
        </div>
    </div>
    <script src="../js/p_javascript.js" charset="utf-8"></script>
</body>

</html>
