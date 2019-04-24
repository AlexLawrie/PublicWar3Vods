<?php
require("adminfunctions.php");

session_start();

if(isset($_SESSION['admin'])){
	header("location: admindashboard.php");
    }
    
?>

<?php
AdminHeaders();
?>
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Admin Login
      </h1>
      <fieldset>
<div class="container">
	<form action="adminlogintools.php" method="post">


    <div class="form-group">
      <label for="adminname">Admin Name</label>
      <input type="text" class="form-control" id="adminname"  placeholder="Enter Admin Name" name="adminname">
    </div>
    <div class="form-group">
      <label for="adminpass">Password</label>
      <input type="password" class="form-control" id="adminpass" placeholder="Password" name="adminpass">
    </div>
    

    <div class="form-group">
      <label for="confirm_password"></label>
      <input class="btn btn-secondary my-2 my-sm-0" type="submit" name="submit" value="Login">
    </div>

  </fieldset>
</form>

<?php
								if(isset($_GET['status'])){
									
									if($_GET['status'] == 'empty_email_password'){
										echo"<script>\n";
	                                    echo"alert('Please fill in the form');\n";
	                                    echo"window.location='adminlogin.php';\n";
	                                    echo"</script>";	
									} 
									if($_GET['status'] == 'no_email_found'){
										echo"<script>\n";
	                                    echo"alert('User not found');\n";
	                                    echo"window.location='adminlogin.php';\n";
	                                    echo"</script>";	
									} 
								}
								?>

    </div>
    <!-- /.container -->

    <?php
AdminFooters()
    ?>