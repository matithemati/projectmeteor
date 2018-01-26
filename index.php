<?php
session_start();
if (isset($_SESSION['zalogowany'])) {
    header("Location: ./mojekonto.php");
}
?>


<html>
<head>
    <title>Project Meteor</title>
    <?php include('inc/b_links.php')?>
</head>
<body>
    <div class="main">
        <?php include('inc/menu.php')?>
        <!-- Container (Pricing Section) -->
        <div id="pricing" class="container-fluid">
          <div class="row slideanim">
            <div class="col-sm-6 col-xs-12">
              <div class="panel panel-default text-center">
                <div class="panel-heading">
                  <h1>WERSJA STANDARDOWA</h1>
                </div>
                <div class="panel-body">
                  <p><strong>Ograniczenie 1</strong> projektu</p>
                  <p><strong>Nielimitowana ilość</strong> członków projektu</p>
                  <p><strong>1 GB</strong> miejsca na dysku</p>
                  <p><strong>Nielimitowane</strong> wsparcie</p>
                </div>
                <div class="panel-footer">
                  <h4>Zupełnie za darmo!</h4>
                  <a href="rejestracja.php"><button class="btn_ag">WYPRÓBUJ TERAZ</button></a>
                </div>
              </div>      
            </div>     
            <div class="col-sm-6 col-xs-12">
              <div class="panel panel-default text-center">
                <div class="panel-heading">
                  <h1>WERSJA <span class="gold">PREMIUM</span></h1>
                </div>
                <div class="panel-body">
                  <p><strong>Nielimitowana ilość</strong> projektów</p>
                  <p><strong>Nielimitowana ilość</strong> członków projektu</p>
                  <p><strong>Nielimitowana ilość</strong> miejsca na dysku</p>
                  <p><strong>Nielimitowane</strong> wsparcie</p>
                </div>
                <div class="panel-footer">
                  <h4>Tylko <span class="gold">19zł</span> miesięcznie!</h4>
                  <a href="rejestracja.php"><button class="btn_ag">WYPRÓBUJ TERAZ</button></a>
                </div>
              </div>      
            </div>         
          </div>
        </div>
        
        
    </div>
<?php include('inc/b_js.php')?>
</body>
</html>
