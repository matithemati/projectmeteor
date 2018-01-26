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
echo "Connected successfully";

$sql = "SELECT id FROM uzytkownicy";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"];
    }
} else {
    echo "0 results";
}
$conn->close();
?>