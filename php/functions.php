<?php

require("db.php");

function Headers(){
    echo'<html lang="en">

    <head>
  
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="A simple Warcraft 3 VOD Website with all the latest tournament games.  Creating an account enables a spoiler free experience">
      <meta name="author" content="Alex Lawrie">
      <meta name="keywords" content="Warcraft 3,Tournaments,VODS,Warcraft 3 VODS,Warcraft 3 Tournaments,Warcraft 3 Pros,Warcraft Pro Gamers, Warcraft Progamers">
  
      <title>Warcraft 3 VODS</title>
  
      <!-- Bootstrap core CSS -->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

      <!-- JavaScript -->
      <script src="js/js.js"></script>

      <!-- jQuery -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

      <!-- Custom styles for this template -->
      <link href="css/dark.css" rel="stylesheet">

      <!-- Social Media Icons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    </head>
  
    <body>
  
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php">War3VODS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarColor03">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
              <li class="nav-item">
                <a class="nav-link" href="Tournaments.php">Tournaments</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact & Info</a>
              </li>
              <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Account</a>
    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
      <a class="dropdown-item" href="login.php">Login</a>
      <a class="dropdown-item" href="register.php">Register</a>
      <a class="dropdown-item" href="logout.php">Logout</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item">Login to have a spolier free website</a>
    </div>
  </li>
  <li class="nav-item">
                <a class="nav-link">'; if(isset($_SESSION["user"])){
                  echo'Welcome '; echo $_SESSION["user"];
                }; echo'</a>
              </li>
              </ul>
              <form action="search.php" method="get" class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="text" name="search" size="50" placeholder="Search for Games, Heroes, Tournaments, and Players">
              <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
              </form>
              </div>
            </nav>';
}

function FrontPageGames(){
  $itemId = 1;
  global $con;
  $get_front_page_games = "SELECT * FROM FrontPage ORDER BY frontpageid DESC LIMIT 5";
  $run_get_front_page_games = mysqli_query($con, $get_front_page_games);

  while ($row_front_page_games = mysqli_fetch_array($run_get_front_page_games)) :
      $frontpagevideo = $row_front_page_games['frontpagevideo'];
      $frontpagetitle = $row_front_page_games['frontpagetitle'];
      $frontpagedes = $row_front_page_games['frontpagedes'];

      if (!isset($_SESSION["user"])) : ?>
        <!-- Project One -->
        <div class="row">
          <div class="col-md-7">
            <a href="#">
                <?= $frontpagevideo ?>
            </a>
          </div>
          <div class="col-md-5">
            <h3><?= $frontpagetitle ?></h3>
            <p><?= $frontpagedes ?></p>
          </div>
        </div>
        <!-- /.row -->

        <hr>
      <?php else : ?>
        <!-- Project One -->
        <div class="float_form row" id="row-<?= $itemId ?>" style="display: none;">
          <div class="col-md-7">
            <a href="#">
                <?= $frontpagevideo ?>
            </a>
          </div>
          <div class="col-md-5">
            <h3><?= $frontpagetitle ?></h3>
            <p><?= $frontpagedes ?></p>
          </div>
        </div>
        <!-- /.row -->

        <hr>
          <?php $itemId++;
      endif;
  endwhile;
}

function ListOfTournaments(){

  global $con;

  $get_list_of_tournaments = "SELECT * FROM ListOfTournaments WHERE TournamentStatus ='Completed' ORDER BY TournamentID DESC;";
  $run_get_list_of_tournaments = mysqli_query($con, $get_list_of_tournaments);

  while($row_list_of_tournaments = mysqli_fetch_array($run_get_list_of_tournaments)){
    $tournamentid = $row_list_of_tournaments['TournamentID'];
    $tournamentname = $row_list_of_tournaments['TournamentName'];
    $tournamentdate = $row_list_of_tournaments['TournamentDate'];

    echo'
    <li><u><a href="game.php?game='.$tournamentid.'" <h5> '.$tournamentname.' - '.$tournamentdate.'</a></u></li>';
  }
}

function ListOfTournamentsOnGoing(){

  global $con;

  $get_list_of_tournaments = "SELECT * FROM ListOfTournaments WHERE TournamentStatus ='Ongoing' ORDER BY TournamentID DESC;";
  $run_get_list_of_tournaments = mysqli_query($con, $get_list_of_tournaments);

  while($row_list_of_tournaments = mysqli_fetch_array($run_get_list_of_tournaments)){
    $tournamentid = $row_list_of_tournaments['TournamentID'];
    $tournamentname = $row_list_of_tournaments['TournamentName'];
    $tournamentdate = $row_list_of_tournaments['TournamentDate'];

    echo'
    <li><u><a href="game.php?game='.$tournamentid.'" <h5> '.$tournamentname.' - '.$tournamentdate.'</a></u></li>';
  }
  if(empty($run_get_list_of_tournaments)){
    echo'There is no tournaments currently ongoing';
  }
}



function Footers(){

echo '<!-- Footer -->
<footer class="py-5 bg-dark">
<center><a href="https://twitter.com/TheAlexLawrie">
<img src="img/twitter.png" style="width:42px;height:42px;border:0;">
  
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>';

}

function Games(){
  global $con;

  if(isset($_GET['game'])) {
    $game = $_GET['game'];
    $get_game = "SELECT * FROM FrontPage WHERE TournamentID = '$game' ORDER BY frontpageid ASC;";
    $run_get_game = mysqli_query($con, $get_game);
    while($row_game = mysqli_fetch_array($run_get_game)){
    $frontpagevideo = $row_game['frontpagevideo'];
    $frontpagetitle = $row_game['frontpagetitle'];
    $frontpagedes = $row_game['frontpagedes'];
  

  echo'<!-- Project One -->
  <div class="row">
    <div class="col-md-7">
      <a href="#">
        '.$frontpagevideo.'
      </a>
    </div>
    <div class="col-md-5">
      <h3>'.$frontpagetitle.'</h3>
      <p>'.$frontpagedes.'</p>
    </div>
  </div>
  <!-- /.row -->

  <hr>';
      }
    }
  }

function Search(){
  global $con;
  
  if(isset($_GET['search'])) {
    $search = $_GET['search'];
    $get_search = "SELECT * FROM FrontPage WHERE frontpagetitle LIKE '%$search%' OR frontpagedes LIKE '%$search%' ORDER BY frontpageid DESC;";
    $run_get_search = mysqli_query($con, $get_search);
    while($row_search = mysqli_fetch_array($run_get_search)){
      $frontpagevideo = $row_search['frontpagevideo'];
      $frontpagetitle = $row_search['frontpagetitle'];
      $frontpagedes = $row_search['frontpagedes'];

      echo'<!-- Project One -->
  <div class="row">
    <div class="col-md-7">
      <a href="#">
        '.$frontpagevideo.'
      </a>
    </div>
    <div class="col-md-5">
      <h3>'.$frontpagetitle.'</h3>
      <p>'.$frontpagedes.'</p>
    </div>
  </div>
  <!-- /.row -->

  <hr>';
    }
  }
}

?>


