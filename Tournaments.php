<?php
require("php/functions.php");
session_start();
?>

<?php
headers();
?>
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Tournaments
      </h1>

      <div>
<h3>Ongoing</h3>
      </div>

<ul style="list-style-type:disc">
      <?php
ListOfTournamentsOnGoing();
      ?>
          </ul>







      <div>
<h3>Completed</h3>
      </div>

<ul style="list-style-type:disc">
      <?php
ListOfTournaments();
      ?>
          </ul>



    </div>
    <!-- /.container -->

  <?php
Footers()
    ?>
