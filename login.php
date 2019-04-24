<?php
require("php/functions.php");
session_start();

if(isset($_SESSION['user'])){
	header("location: index.php");
    }
    
?>

<?php
Headers();
?>
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Login
      </h1>
      <fieldset>
<div class="container">
	<form action="php/login_tools.php" method="post">


    <div class="form-group">
      <label for="email">Email Address</label>
      <input type="email" class="form-control" id="email"  placeholder="Enter Email" name="email">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" placeholder="Password" name="password">
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
	                  echo"window.location='login.php';\n";
	                  echo"</script>";	
									} 
									if($_GET['status'] == 'no_email_found'){
										echo"<script>\n";
	                  echo"alert('User not found');\n";
	                  echo"window.location='login.php';\n";
	                  echo"</script>";	
									} 
								}
								?>

    </div>
    <!-- /.container -->

    <?php
Footers()
    ?>