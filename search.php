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
      <h1 class="my-4">Your Search Results
      </h1>

<?php
Search();
?>



    </div>
    <!-- /.container -->

    <?php
Footers()
    ?>