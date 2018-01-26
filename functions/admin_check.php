<?php
if ($_SESSION['admin'] != true) {
    echo "Nie masz do tego prawa!<br><a href='http://www.project-meteor.pl/'>Strona Glowna</a>";
    exit();
}
?>