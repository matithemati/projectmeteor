<?php
$servername = "localhost";
$username = "samuelg_fonsz";
$password = "eTKLlOtj";
$dbname = "samuelg_fonsz";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

else {
	
	echo "Okey";
	
}
?>