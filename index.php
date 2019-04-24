<?php
require("php/functions.php");
session_start();
?>

<?php
Headers();
?>
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Most Recent Games
      </h1>

      <?php
FrontPageGames();
      ?>



    </div>
    <!-- /.container -->

    <?php
Footers()
    ?>
