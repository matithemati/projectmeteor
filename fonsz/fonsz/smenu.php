<!DOCTYPE html>
<html lang="pl">
<head>
  <title>Stałe menu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .affix {
      top: 20px;
  }
  .czerw {
	  color:red;
  }
  </style>
</head>
<body>

<div class="container-fluid" style="background-color:#2196F3;color:#fff;height:200px;">
  <h1>Przykład stałego menu</h1>
  <h3>Stałe (fixed) menu pionowe podczas scrollowania strony</h3>
  <p>Scrolluj stronę, aby zobaczyć efekt</p>
  <p><strong>Menu pozostanie nieruchome po przescrollowaniu odpowiedniej ilości pixeli.</strong></p>
</div>
<br>

<div class="container">
  <div class="row">
    <nav class="col-sm-3">
      <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="205">
        <li><a href="#sekcja1" class="btn btn-info" role="button">Sekcja 1 <span class="glyphicon glyphicon-chevron-right"></span></a></li>
        <li><a href="#sekcja2" class="btn btn-warning" role="button">Sekcja 2 <span class="glyphicon glyphicon-chevron-right"></span></a></li>
        <li><a href="#sekcja3" class="btn btn-danger" role="button">Sekcja 3 <span class="glyphicon glyphicon-chevron-right"></span></a></li>
		<li><a href="index.php" class="btn btn-success" role="button">Powrót <span class="glyphicon glyphicon-chevron-right"></span></a></li>
      </ul>
    </nav>
	<div class="col-sm-9">
    <div id="sekcja1">
      <h1 class="czerw">Sekcja 1</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
    </div>
	<div id="sekcja2">
      <h1 class="czerw">Sekcja 2</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
    </div>
		<div id="sekcja3">
      <h1 class="czerw">Sekcja 3</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
      <h1>Przykładowy tekst umożliwiający scrollowanie</h1>
    </div>
	</div>
  </div>
</div>

</body>
</html>
