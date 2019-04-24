<?php
require("adminfunctions.php");
require("../php/db.php");

session_start();

if(!isset($_SESSION['admin'])){
	header("location: ../index.php");
    }
    
?>

<?php
AdminHeaders();
?>

<div class="container">

<h1 class="my-4">Add a Game
</h1>

<?php
if(!isset($_POST['submit'])){
?>

<fieldset>
<div class="container">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">


    <div class="form-group">
      <label for="frontpagevideo">Embed URL Link</label>
      <input type="text" class="form-control" id="frontpagevideo"  placeholder='Put YouTube Embed Link here (Width must be width="100%")' name="frontpagevideo" style="height:200px;">
    </div>
    <div class="form-group">
      <label for="frontpagetitle">Title</label>
      <input type="text" class="form-control" id="frontpagetitle" placeholder="Title of the Game" name="frontpagetitle" style="height:200px;">
    </div>
    <div class="form-group">
      <label for="frontpagedes">Description</label>
      <input type="text" class="form-control" id="frontpagetitle" placeholder="Description" name="frontpagetitle" style="height:200px;">
    </div>
    <div class="form-group">
      <label for="TournamentID">Tournament ID Number</label>
      <input type="text" class="form-control" id="TournamentID" placeholder="Tournament ID Number" name="TournamentID">
    </div>
    <div class="form-group">
      <label for="DateAdded">Today's Date</label>
      <input type="text" class="form-control" id="DateAdded" placeholder="Today's Date" name="DateAdded">
    </div>
    
    <div class="form-group">
      <label for="submit"></label>
      <input class="btn btn-secondary my-2 my-sm-0" type="submit" name="submit" value="Add Game">
    </div>

  </fieldset>
</form>
  </div>

  <?php
} else {
    $frontpagevideo = $_POST['frontpagevideo'];
    $frontpagetitle = $_POST['frontpagetitle'];
    $frontpagedes = $_POST['frontpagedes'];
    $TournamentID = $_POST['TournamentID'];
    $DateAdded = $_POST['DateAdded'];

    $insert_game = "INSERT INTO `FrontPage` (`frontpagevideo`, `frontpagetitle`, `frontpagedes`, `TournamentID`, `DateAdded`) VALUES ('$frontpagevideo', '$frontpagetitle', '$frontpagedes', '$TournamentID', '$DateAdded');";

    $insert_game_query = mysqli_query($con, $insert_game);

    if($insert_game_query) {
        mysqli_close($con);

        echo "<script language=\"JavaScript\">\n";
        echo "alert('Game Added');\n";
        echo "window.location='admindashboard.php'";
        echo "</script>";
    }
};
?>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Tournament ID</th>
      <th scope="col">Tournament Name</th>
      <th scope="col">Date Started</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
<?php
ListofIDS();
?>


</tbody>
</table> 




<a class="nav-link" href="admindashboard.php">Back to Dashboard</a>











<?php
AdminFooters();
    ?>