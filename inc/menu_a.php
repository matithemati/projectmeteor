<!-- NAVBAR -->
<nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
              </button>
              <a class="navbar-brand" href="#">Project Meteor</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav navbar-right">
                  <? if($_SESSION['admin']){echo '<li><a href="/admin"><i class="fa fa-id-card-o" aria-hidden="true"></i> Panel Administracyjny</a></li>';}?> 
                  <li><a href="main.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                  <li><a href="mojekonto.php"><i class="fa fa-user-o" aria-hidden="true"></i> Moje konto</a></li>
                  <li><a href="functions/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Wyloguj</a></li>
              </ul>
            </div>
          </div>
        </nav>