<?php

function db_connect($a) {
    error_reporting(0);
    $host = "5.206.225.2";
    $username = "root";
    $password = "admin123#";
    $dbname = $a;

    global $conn;

    $conn = new mysqli($host, $username, $password, $dbname);
}
?>