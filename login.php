<?php
session_start();
//connect to database
//$db=mysqli_connect("localhost","root","","authentication");
require "../../database/database.php";



if(isset($_POST['login_btn']))
{
		$db=Database::connectMysqli();
    //var_dump($db); exit(); // Used to tell if connecting to database
    $username=mysqli_real_escape_string($db, $_POST['username']);
    $password=mysqli_real_escape_string($db, $_POST['password']);
		//$username=($_POST['username']);
    //$password=($_POST['password']);
    $password=md5($password); //Remember we hashed password before storing last time md5   
    $sql="SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result=mysqli_query($db,$sql);
    if(mysqli_num_rows($result)==1)
    {
        $_SESSION['message']="You are now Loggged In";
        $_SESSION['username']=$username;
        header("location:Persons/index.html");
    }
   else
   {
                $_SESSION['message']="Username or password incorrect";
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

    <title>Tee Tyme Login</title>

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
		<h1 align="center" style="font-size:50px"><strong>TeeTyme</strong></h1>
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="username" class="textInput">Username</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
        <label for="password" class="textInput">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
        <div class="checkbox">
        </div>	
        <button class="btn btn-lg btn-success btn-block" type="submit" name="login_btn">Sign in</button>
		<label class="textInput"><br />Don't have an account?</label>
		<a class="btn btn-lg btn-primary btn-block" href="register.php">Sign up</a>
		
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