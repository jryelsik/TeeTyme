<?php
// from: https://www.youtube.com/watch?v=lGYixKGiY7Y

session_start();
require "../../database/database.php";

if(isset($_POST['register_btn']))
{
		$db=Database::connectMysqli();
	//var_dump($db);	
    $username=mysqli_real_escape_string($db, $_POST['username']);
    //$email=mysqli_real_escape_string($db, $_POST['email']);
    $password=mysqli_real_escape_string($db, $_POST['password']);
    $password2=mysqli_real_escape_string($db, $_POST['password2']);  
     if($password==$password2)
     {           //Create User
            $password=md5($password); //hash password before storing for security purposes
            $sql="INSERT INTO users(username,password) VALUES('$username','$password')"; // Insert 'email'
            mysqli_query($db,$sql);
            $_SESSION['message']="You are now logged in"; 
            $_SESSION['username']=$username;
            header("location:Persons/");  //redirect home page
    }
    else
    {
      $_SESSION['message']="The two passwords do not match";   
     }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Tee Tyme Registration</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">
		
      <form class="form-signin" method="post">
		<h1 align="center" style="font-size:50px"><strong>Tee Tyme</strong></h1>
        <h2 class="form-signin-heading">Registration</h2>
        <label for="username" class="textInput">Username</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
        <label for="password" class="textInput">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
		<label for="password2" class="textInput">Reenter Password</label>
        <input type="password" id="password2" name="password2" class="form-control" placeholder="Reenter Password" required>
        <div class="checkbox">
        </div>	
        <button class="btn btn-lg btn-success btn-block" type="submit" name="register_btn">Register</button>
		
		<?php
		if(isset($_SESSION['message']))
		{
			 echo "<br /><div style='color:red' id='error_msg' class='form-control'>".$_SESSION['message']."</div>";
			 unset($_SESSION['message']);
		}
		?>
      </form>
    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
