<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width = device-width, initial-scale = 1">
<title>Konta</title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<style>
td {
	vertical-align: bottom;
}
</style>
</head>
<body>
<div class="container">
<br>
<div class="row">
<div class="col-md-1">
 <table class="table table-bordered table-hover">
 <tr class="active">
 <td class="text-center"><b>ID</b></td>
 <td class="text-center"><b>Login</b></td>
 <td class="text-center"><b>Hasło</b></td>
 <td class="text-center"><b>Email</b></td>
 <td class="text-center"><b>Typ Konta</b></td>
 </tr>
<?php
require_once "db_connect.php";

$sql = "SELECT id, login, pass, email, user FROM uzytkownicy";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

		
		
		$id = $row["id"];
		$login = $row["login"];
		$pass = $row["pass"];
		$email = $row["email"];
		$type = $row["user"];
		$usr;
		
		if ($type == 1) {
		$usr = Admin;
		}
		else {
			$usr = User;
		}
		
		echo<<<END
 <tr>
 <td class="text-center">$id</td>
 <td class="text-center">$login</td>
 <td class="text-center">$pass</td>
 <td class="text-center">$email</td>
 <td class="text-center">$usr</td>
 </tr>
END;
		
    }
} else {
	echo "<br>";
    echo "0 results";
}
$conn->close();
?>

</table>
 </div>
 </div>
 </div>


</body>
</html>