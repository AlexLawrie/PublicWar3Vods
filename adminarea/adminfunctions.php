<?php
require("../php/db.php");

function AdminHeaders(){
    echo'<html lang="en">

    <head>
  
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
  
      <title>Warcraft 3 VODS</title>
  
      <!-- Bootstrap core CSS -->
      <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

      <!-- JavaScript -->
      <script src="../js/js.js"></script>

      <!-- jQuery -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

      <!-- Custom styles for this template -->
      <link href="../css/dark.css" rel="stylesheet">

      <!-- Social Media Icons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    </head>
  
    <body>
  
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="../index.php">War3VODS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarColor03">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
            </li>
              <li class="nav-item">
                <a class="nav-link" href="../Tournaments.php">Tournaments</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../contact.php">Contact & Info</a>
              </li>
              <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Account</a>
    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
      <a class="dropdown-item" href="../login.php">Login</a>
      <a class="dropdown-item" href="../register.php">Register</a>
      <a class="dropdown-item" href="../logout.php">Logout</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item">Logout when done please</a>
    </div>
  </li>
  <li class="nav-item">
                <a class="nav-link">'; if(isset($_SESSION["admin"])){
                  echo'Welcome '; echo $_SESSION["admin"];
                }; echo'</a>
              </li>
              </ul>
              <form action="../search.php" method="get" class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="text" name="search" size="50" placeholder="Search for Games, Heroes, Tournaments, and Players">
              <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
              </form>
              </div>
            </nav>';
}

function AdminFooters(){

   echo '<!-- Footer -->
<footer class="py-5 bg-dark">
<center><a href="https://twitter.com/TheAlexLawrie">
<img src="img/twitter.png" style="width:42px;height:42px;border:0;">
  
</footer>

<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>';
    
    }

function ListofIDS(){

  global $con;
  $get_tournament_id = "SELECT * FROM ListOfTournaments;";
  $run_get_tournament_id = mysqli_query($con, $get_tournament_id);

while($row_tournament_id = mysqli_fetch_array($run_get_tournament_id)){
  $TournamentID = $row_tournament_id['TournamentID'];
  $TournamentName = $row_tournament_id['TournamentName'];
  $TournamentDate = $row_tournament_id['TournamentDate'];
  $TournamentStatus = $row_tournament_id['TournamentStatus'];

echo'<tr>
    <td>'.$TournamentID.'</td>
    <td>'.$TournamentName.'</td>
    <td>'.$TournamentDate.'</td>
    <td>'.$TournamentStatus.'</td>
    </tr>
  ';
}
}

function ListOfIDSForGames(){

global $con;
$get_frontpageid = "SELECT frontpageid, frontpagetitle, DateAdded FROM FrontPage;";
$run_get_frontpageid = mysqli_query($con, $get_frontpageid);

while($row_frontpageid = mysqli_fetch_array($run_get_frontpageid)){
  $frontpageid = $row_frontpageid['frontpageid'];
  $frontpagetitle = $row_frontpageid['frontpagetitle'];
  $DateAdded = $row_frontpageid['DateAdded'];

  echo'<tr>
  <td>'.$frontpageid.'</td>
  <td>'.$frontpagetitle.'</td>
  <td>'.$DateAdded.'</td>
  </tr>
';
}
}

?>