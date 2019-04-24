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

<h1 class="my-4">Delete a Game
</h1>

<?php
if(!isset($_POST['submit'])){
?>

<fieldset>
<div class="container">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">


    <div class="form-group">
      <label for="frontpageid">Front Page ID</label>
      <input type="text" class="form-control" id="frontpageid"  placeholder='Front Page ID' name="frontpageid">
    </div>

    <div class="form-group">
      <label for="confirmfrontpageid">Confirm Front Page ID</label>
      <input type="text" class="form-control" id="confirmfrontpageid"  placeholder='Confirm the Front Page ID' name="confirmfrontpageid">
    </div>
    
    <div class="form-group">
      <label for="submit"></label>
      <input class="btn btn-secondary my-2 my-sm-0" type="submit" name="submit" value="Delete a Game">
    </div>

  </fieldset>
</form>
  </div>

  <?php
} else {
    $frontpageid = $_POST['frontpageid'];
    $confirmfrontpageid = $_POST['confirmfrontpageid'];

    if ($frontpageid == $confirmfrontpageid) {
      $delete_game = "DELETE FROM FrontPage WHERE frontpageid = '$frontpageid';";
      $delete_game_query = mysqli_query($con, $delete_game);
  } else {
    echo"<script>\n";
          echo"alert('ID Confirm Failed');\n";
          echo"window.location='admindeletegame.php';\n";
          echo"</script>"; 
    exit;
  }
  
  if ($delete_game_query) {
            mysqli_close($con);
            echo "<script language=\"JavaScript\">\n";
            echo "alert('Game Deleted');\n";
            echo "window.location='admindashboard.php'";
            echo "</script>";
  }
}
?>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Front Page ID</th>
      <th scope="col">Front Page Title</th>
      <th scope="col">Date Added</th>
    </tr>
  </thead>
  <tbody>
<?php
ListOfIDSForGames();
?>


</tbody>
</table> 






<a class="nav-link" href="admindashboard.php">Back to Dashboard</a>




<?php
AdminFooters()
    ?>