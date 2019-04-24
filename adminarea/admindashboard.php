<?php
require("adminfunctions.php");

session_start();

if(!isset($_SESSION['admin'])){
	header("location: ../index.php");
    }
    
?>

<?php
AdminHeaders();
?>
<!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Admin Dashboard
      </h1>
   
<a class="nav-link" href="adminaddgame.php">Add a Game</a>

<a class="nav-link" href="admindeletegame.php">Delete a Game</a>

<a class="nav-link" href="adminaddtournament.php">Add a Tournament</a>

<a class="nav-link" href="admindeletetournament.php">Delete a Tournament</a>
</div>

    <?php
AdminFooters()
    ?>