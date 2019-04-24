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

<h1 class="my-4">Add a Tournament
</h1>

<?php
if(!isset($_POST['submit'])){
?>


<div class="container">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

<fieldset>
    <div class="form-group">
      <label for="TournamentName">Tournament Name</label>
      <input type="text" class="form-control" id="TournamentName"  placeholder='Tournament Name' name="TournamentName">
    </div>
    <div class="form-group">
      <label for="TournamentDate">Tournament Date</label>
      <input type="text" class="form-control" id="TournamentDate" placeholder="Date the Tournament Started" name="TournamentDate">
    </div>
    <div class="form-group">
      <label for="TournamentStatus">Description</label>
      <input type="text" class="form-control" id="TournamentStatus" placeholder="Can only be either 'Ongoing' or 'Complete'" name="TournamentStatus">
    </div>
    
    <div class="form-group">
      <label for="submit"></label>
      <input class="btn btn-secondary my-2 my-sm-0" type="submit" name="submit" value="Add Tournament">
    </div>
    
</fieldset>


</form>
</div>
</div>




  <?php
} else {
    $TournamentName = $_POST['TournamentName'];
    $TournamentDate = $_POST['TournamentDate'];
    $TournamentStatus = $_POST['TournamentStatus'];

    $insert_torunament = "INSERT INTO `ListOfTournaments` (`TournamentName`, `TournamentDate`, `TournamentStatus`) VALUES ('$TournamentName', '$TournamentDate', '$TournamentStatus');";

    $insert_tournament_query = mysqli_query($con, $insert_torunament);

    if($insert_tournament_query) {
        mysqli_close($con);

        echo "<script language=\"JavaScript\">\n";
        echo "alert('Tournament Added');\n";
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








