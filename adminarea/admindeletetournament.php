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

<div class="container">

<h1 class="my-4">Delete a Tournament
</h1>

<?php
if(!isset($_POST['submit'])){
?>

<fieldset>
<div class="container">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">


    <div class="form-group">
      <label for="TournamentID">Tournament ID</label>
      <input type="text" class="form-control" id="TournamentID"  placeholder='TournamentID' name="TournamentID">
    </div>

    <div class="form-group">
      <label for="confirmTournamentID">Confirm Tournament ID</label>
      <input type="text" class="form-control" id="confirmTournamentID"  placeholder='Confirm the TournamentID' name="confirmTournamentID">
    </div>
    
    <div class="form-group">
      <label for="submit"></label>
      <input class="btn btn-secondary my-2 my-sm-0" type="submit" name="submit" value="Delete Tournament">
    </div>

  </fieldset>
</form>
  </div>

  <?php
} else {
    $TournamentID = $_POST['TournamentID'];
    $confirmTournamentID = $_POST['confirmTournamentID'];

    if ($TournamentID == $confirmTournamentID) {
      $delete_tournament = "DELETE FROM ListOfTournaments WHERE TournamentID = '$TournamentID';";
      $delete_tournament_query = mysqli_query($con, $delete_tournament);
  } else {
    echo"<script>\n";
          echo"alert('ID Confirm Failed');\n";
          echo"window.location='admindeletetournament.php';\n";
          echo"</script>"; 
    exit;
  }
  
  if ($delete_tournament_query) {
            mysqli_close($con);
            echo "<script language=\"JavaScript\">\n";
            echo "alert('Tournament Deleted');\n";
            echo "window.location='admindashboard.php'";
            echo "</script>";
  }
}
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
AdminFooters()
    ?>