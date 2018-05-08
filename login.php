<?php
   session_start();
    include("includes/config.php");
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword =  md5($_POST['password']);; 
      
      $sql = "SELECT id FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
 //        session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome2.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<html>
   
<head>
   <meta charset = "utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel = "stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|Raleway">
	<link rel = "stylesheet" href = "styles/custom.css">
   <title>Login | TeAmo Tea</title>
</head>
   
<body>
	<div class = "container-fluid">
	   <div class = "row justify-content-center">
			<nav class = "nav">
				<a class = "nav-link" href = "index.php">Home</a>
				<a class = "nav-link" href = "menu.php">Menu</a>
				<a class = "nav-link" href = "contact.php">Contact</a>
				<a class = "nav-link" href = "form.php">Sign Up</a>
				<a class = "nav-link" href = "login.php">Login</a>
				<a class = "nav-link" href = "search.php">Search</a>
			</nav>
		</div>
      <div class = "row justify-content-center align-middle">
         <h2>Login</h2>
      </div>
      <div class = "row justify-content-center align-middle">
         <form>
           <div class="form-group">
             <label for="Username">Username: </label>
             <input type="text" class="form-control-sm mx-auto" id="username" placeholder="Username">
           </div>
           <div class="form-group">
             <label for="Password">Password: </label>
             <input type="text" class="form-control-sm mx-auto" id="password" placeholder="Password">
           </div>
         </form>
         </div>
         <div class = "row error-message">
            <?php echo $error; ?>
         </div>
   </div>
<!--Bootstrap Scripts-->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   </body>
</html>