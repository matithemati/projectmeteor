<?php
$servername = "localhost";
$username = "x";
$password = "1234";
$dbname = "x";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>