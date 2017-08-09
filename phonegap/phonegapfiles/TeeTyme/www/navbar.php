<?php
session_start();
require "../../database/databaseTT.php";
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
                        <a href="https://csis.svsu.edu/~jryelsik/cis355/TeeTyme(test)/Persons/">Persons</a>
                    </li>
                    <li>
                        <a href="https://csis.svsu.edu/~jryelsik/cis355/TeeTyme(test)/Courses/">Courses</a>
                    </li>
                    <li>
                        <a href="https://csis.svsu.edu/~jryelsik/cis355/TeeTyme(test)/Rounds/">Rounds</a>
                    </li>				
					<li>
						<a href="https://csis.svsu.edu/~jryelsik/cis355/TeeTyme(test)/logout.php">Log Out</a>
					</li>
					<li>
						<a><strong>Welcome, <?php echo $_SESSION['username']; ?></strong></a>
					</li>
					<li>
						<a href="https://csis.svsu.edu/~jryelsik/cis355/TeeTyme(test)/FileUploadView/fileUpload.php">Upload/View Pictures</a>
					</li>
					<li>
						<a href="https://csis.svsu.edu/~jryelsik/cis355/TeeTyme(test)/jsonTT.php">JSON Service</a>
					</li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
</html>