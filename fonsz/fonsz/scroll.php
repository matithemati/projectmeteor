<!DOCTYPE html>
<html lang="pl">
<head>
  <title>Scroll</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
      position: relative; 
  }
  #sekcja1 {padding-top:50px;height:500px;color: #fff; background-color: #1E88E5;}
  #sekcja2 {padding-top:50px;height:500px;color: #fff; background-color: #673ab7;}
  #sekcja3 {padding-top:50px;height:500px;color: #fff; background-color: #ff9800;}
  #sekcja41 {padding-top:50px;height:500px;color: #fff; background-color: #00bcd4;}
  #sekcja42 {padding-top:50px;height:500px;color: #fff; background-color: #009688;}
  </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Nazwa Strony</a>
    </div>
    <div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="#sekcja1">Sekcja 1</a></li>
          <li><a href="#sekcja2">Sekcja 2</a></li>
          <li><a href="#sekcja3">Sekcja 3</a></li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Sekcja 4 <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#sekcja41">Sekcja 4-1</a></li>
              <li><a href="#sekcja42">Sekcja 4-2</a></li>
            </ul>
          </li>
		  <li><a href="index.php">Powrót</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>    

<div id="sekcja1" class="container-fluid">
  <h1>Sekcja 1</h1>
  <p>Spróbuj przeglądać tę sekcję i spojrzeć na paskek nawigacyjny podczas przewijania! Spróbuj przeglądać tę sekcję i spojrzeć na paskek nawigacyjny podczas przewijania!</p>
  <p>Spróbuj przeglądać tę sekcję i spojrzeć na paskek nawigacyjny podczas przewijania! Spróbuj przeglądać tę sekcję i spojrzeć na paskek nawigacyjny podczas przewijania!</p>
</div>
<div id="sekcja2" class="container-fluid">
  <h1>Sekcja 2</h1>
  <p>Spróbuj przeglądać tę sekcję i spojrzeć na paskek nawigacyjny podczas przewijania! Spróbuj przeglądać tę sekcję i spojrzeć na paskek nawigacyjny podczas przewijania!</p>
  <p>Spróbuj przeglądać tę sekcję i spojrzeć na paskek nawigacyjny podczas przewijania! Spróbuj przeglądać tę sekcję i spojrzeć na paskek nawigacyjny podczas przewijania!</p>
</div>
<div id="sekcja3" class="container-fluid">
  <h1>Sekcja 3</h1>
  <p>Spróbuj przeglądać tę sekcję i spojrzeć na paskek nawigacyjny podczas przewijania! Spróbuj przeglądać tę sekcję i spojrzeć na paskek nawigacyjny podczas przewijania!</p>
  <p>Spróbuj przeglądać tę sekcję i spojrzeć na paskek nawigacyjny podczas przewijania! Spróbuj przeglądać tę sekcję i spojrzeć na paskek nawigacyjny podczas przewijania!</p>
</div>
<div id="sekcja41" class="container-fluid">
  <h1>Sekcja 4 Submenu 1</h1>
  <p>Spróbuj przeglądać tę sekcję i spojrzeć na paskek nawigacyjny podczas przewijania! Spróbuj przeglądać tę sekcję i spojrzeć na paskek nawigacyjny podczas przewijania!</p>
  <p>Spróbuj przeglądać tę sekcję i spojrzeć na paskek nawigacyjny podczas przewijania! Spróbuj przeglądać tę sekcję i spojrzeć na paskek nawigacyjny podczas przewijania!</p>
</div>
<div id="sekcja42" class="container-fluid">
  <h1>Sekcja 4 Submenu 2</h1>
  <p>Spróbuj przeglądać tę sekcję i spojrzeć na paskek nawigacyjny podczas przewijania! Spróbuj przeglądać tę sekcję i spojrzeć na paskek nawigacyjny podczas przewijania!</p>
  <p>Spróbuj przeglądać tę sekcję i spojrzeć na paskek nawigacyjny podczas przewijania! Spróbuj przeglądać tę sekcję i spojrzeć na paskek nawigacyjny podczas przewijania!</p>
</div>

</body>
</html>
