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
      <h1 class="my-4">Games (In Order of First Game to Finals)
      </h1>

<?php
Games();
?>



    </div>
    <!-- /.container -->

    <?php
Footers()
    ?>
