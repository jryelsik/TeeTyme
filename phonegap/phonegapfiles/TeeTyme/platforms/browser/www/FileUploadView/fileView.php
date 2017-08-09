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

    <title>Upload a Picture</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
	
	<script>
        function retrieveNavBar() {
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("body").innerHTML = xhttp.responseText;
                }
            };
            var URL = "https://csis.svsu.edu/~jryelsik/cis355/TeeTyme(test)/";
            xhttp.open("GET", URL + "navbar.php", true);
            xhttp.send();
        }
    </script>
  </head>
  
	<body onload="retrieveNavBar();">
    <div id="body"></div>
	 <div class="container">
		<form class="form-signin" method="post" enctype="multipart/form-data">
		<h1 align="center" style="font-size:50px"><strong>View a Picture</strong></h1>
			<table width="350" border="0" 
				cellpadding="1" cellspacing="1" class="box">
				<tr><td>
				</td></tr>
				<tr>
				<td width="80">
				<div class='form-actions'>
					<h3>Select a picture ID from below</h3>
					<?php
						// connect to database
						mysql_connect("localhost","jryelsik","578192");
						mysql_select_db("jryelsik");

						// if first time calling this php file, use first pic
						// else use value entered from form
						$id = 1; 
						if(isset($_POST['img_id'])) $id = $_POST['img_id'];
						// ----- display list of files available by id -----
						$query = "SELECT id, filename, filesize, filetype FROM pictures";
						$result  = mysql_query ($query);

						// display list
						while ($row = mysql_fetch_assoc($result)) 
						{
						  echo "<p>" . $row['id'] . '&nbsp&nbsp&nbsp&nbsp&nbsp ' . $row['filename'] . 
							' ' . "</p>";
						}
						echo "<form method='post' action='fileDownload.php' >";
						echo "<input name='img_id' type='text'>";
						echo "<input type='submit' value='Submit'>";
						echo "</form>";
						$query = "SELECT filename, filesize, filecontent, filetype 
						  FROM pictures WHERE id=$id";
						$result  = mysql_query ($query);
						$name    = mysql_result($result, 0, "filename");
						$size    = mysql_result($result, 0, "filesize");
						$type    = mysql_result($result, 0, "filetype");
						$content = mysql_result($result, 0, "filecontent");
						// Header( "Content-type: $type");
						// print $content;
						echo "<br /><br /><img height='auto' width='50%'
						  src='data:image/jpeg;base64," 
						  . base64_encode($content) . "'>";
					?>
				</div>
				<div class='form-actions'>
					<br />
					<a class="btn btn-lg btn-default btn-block" href="../Persons/index.html">Back</a>
				</div>
				</td>
				</tr>
			</table>
		</form>
		</div>
	</body>
</html>




