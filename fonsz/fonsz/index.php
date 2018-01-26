<?php

session_start();

if(!isset($_SESSION['admin']))
{
	//header('Location: index.html');
	//echo 'Nie masz do tego uprawnień!<br>';
	//echo '[<a href="zalogowano.php">Powrót</a>]';
	//exit();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">

<title>Logowanie</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <style>
  .reje {
	width: 60%;
	margin-left:auto;
	margin-right:auto;
  }
  .error {
	  color:red;
	  font-weight:bold;
  }
  </style>
</head>
<body>


    <div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title"><b>Zaloguj się</b></h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-6">
                      <div class="well">
                          <form action="logowanie.php" method="POST">
                              <div class="form-group">
                                  <label for="login" class="control-label">Login</label>
                                  <input type="text" class="form-control" name="login" required title="Proszę podać swój login" placeholder="Login">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="haslo" class="control-label">Hasło</label>
                                  <input type="password" class="form-control" name="haslo" placeholder="Hasło" required title="Proszę podać swoje hasło">
                                  <span class="help-block"></span>
                              </div>
                              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-ok"></span> Zaloguj</button>
							  <button type="reset" class="btn btn-danger btn-block"><span class="glyphicon glyphicon-remove"></span> Wyczyść</button>
                          </form>
                      </div>
                  </div>
                  <div class="col-xs-6">
					  <br><br><br><br>
                      <p class="lead">Zarejestruj się <span class="text-success"><u>ZA DARMO!</u></span></p>
					  <p><button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#baza"><span class="glyphicon glyphicon-wrench"></span> Wczytaj konta z bazy danych</button></p>
					  <p><a href="konta.php" class="btn btn-warning btn-block" role="button"><span class="glyphicon glyphicon-wrench"></span> Wczytaj konta z bazy danych #2</a></p>
					  <p><button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#reje"><span class="glyphicon glyphicon-menu-right"></span> Zarejestruj się</button></p>
					  <p><a href="rejestracja.php" class="btn btn-info btn-block" role="button"><span class="glyphicon glyphicon-menu-right"></span> Zarejestruj się #2</a></p>
					  <!-- Single button -->
							<button type="button" class="btn btn-primary btn-block dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="glyphicon glyphicon-th-large"></span> Test elementów <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="tab.php"><span class="glyphicon glyphicon-arrow-right"></span> Zakładki</a></li>
								<li><a href="scroll.php"><span class="glyphicon glyphicon-arrow-right"></span> Scroll</a></li>
								<li><a href="karuzela.php"><span class="glyphicon glyphicon-arrow-right"></span> Karuzela [galeria]</a></li>
								<li><a href="smenu.php"><span class="glyphicon glyphicon-arrow-right"></span> Stałe menu</a></li>
								<li role="separator" class="divider"></li>
								<li><a data-toggle="collapse" data-target="#demo"><span class="glyphicon glyphicon-chevron-down"></span> Collapsible</a></li>
							</ul>
					    <!-- Modal reje-->
							<div class="modal fade" id="baza" role="dialog">
							<div class="modal-dialog">
    
						<!-- Modal reje content-->
							<div class="modal-content">
							<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Konta znajdujące się w bazie danych</h4>
							</div>
							<div class="modal-body">
							<!-- początek zawartości modala-->
							<div class="row">
<div class="col-md-1">
 <table class="table table-bordered table-hover">
 <tr class="active">
 <td class="text-center"><b>ID</b></td>
 <td class="text-center"><b>Login</b></td>
 <td class="text-center"><b>Email</b></td>
 <td class="text-center"><b>Typ Konta</b></td>
 </tr>
<?php
require_once "db_connect.php";

$sql = "SELECT id, login, email, user FROM uzytkownicy";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

		
		
		$id = $row["id"];
		$login = $row["login"];
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
 <!--koniec zawartości modala-->
							</div>
							<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
							</div>
							</div>
      
							</div>
							</div>
							<!-- Modal  baza koniec -->
							
							  <!-- Modal -->
							<div class="modal fade" id="reje" role="dialog">
							<div class="modal-dialog">
    
							<!-- Modal content-->
									<div class="modal-content">
									<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Rejestracja</h4>
									</div>
									<div class="modal-body">
									<div class="reje">
									<div class="well">
									<form method="POST">
										<label for="login">Login</label>
										<?php
										
										if (isset($_SESSION['e_login']))
										{
											echo '<div class="error">'.$_SESSION[e_login].'</div>';
											unset($_SESSION[e_login]);
										}
										
										?>
										<input type="text" class="form-control" name="login" id="login" placeholder="Login"><br>
										<label for="haslo">Hasło</label>
										<input type="password" class="form-control" name="haslo1" id="haslo" placeholder="Hasło"><br>
										<label for="haslo">Wprowadź ponownie hasło</label>
										<input type="password" class="form-control" name="haslo2" id="haslo2" placeholder="Ponów hasło"><br>
									    <label for="exampleInputEmail1">Adres Email</label>
										<input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email"><br>
										<div class="g-recaptcha" data-sitekey="6LcJHhMUAAAAAKkwBJbcxTlnsZGFn-UwPdh8tDt8"></div><br>
										<label class="checkbox-inline">
										<input type="checkbox" id="regulamin"> Akceptuję regulamin
										</label><br><br>
										<button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-ok"></span> Zarejestruj</button>
										<button type="reset" class="btn btn-danger btn-block"><span class="glyphicon glyphicon-remove"></span> Wyczyść</button><br>

									
									</form>
									</div>
									</div>
									<div class="modal-footer">
									<button type="button" class="btn btn-info" data-dismiss="modal">Zamknij</button>
									
									</div>
								</div>
      
									</div>
									</div>
  
  <!--Modal reje koniec-->
                  </div>
              </div>
          </div>
<!--Collapsible-->
								<div id="demo" class="collapse">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit,
								sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
								</div>
  </div>
    </body>
</html>

