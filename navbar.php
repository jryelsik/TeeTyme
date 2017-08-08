<?php
session_start();
require "../../database/database.php";
?>
<!DOCTYPE html>
<html lang="en">
	<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
					<span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="color:#ffffff"><strong>TeeTyme</strong></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="../Persons/index.html">Persons</a>
                    </li>
                    <li>
                        <a href="../Courses/index.html">Courses</a>
                    </li>
                    <li>
                        <a href="../Rounds/index.html">Rounds</a>
                    </li>				
					<li>
						<a href="../logout.php">Log Out</a>
					</li>
					<li>
						<a><strong>Welcome, <?php echo $_SESSION['username']; ?></strong></a>
					</li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
</html>