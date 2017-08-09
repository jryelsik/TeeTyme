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
		<h1 align="center" style="font-size:50px"><strong>Upload a Picture</strong></h1>
			<table width="350" border="0" 
				cellpadding="1" cellspacing="1" class="box">
				<tr><td>
				<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
				<input name="userfile" type="file" id="userfile">
				</td></tr>
				<tr>
				<td width="80">
				<br />
				<input class="btn btn-lg btn-success btn-block" name="upload" type="submit" class="box" id="upload"  value=" Upload ">
				<?php
					ini_set('file-uploads',true);
					if(isset($_POST['upload']) && $_FILES['userfile']['size']>0)
					{
					  $fileName = $_FILES['userfile']['name'];
					  $tmpName  = $_FILES['userfile']['tmp_name'];
					  $fileSize = $_FILES['userfile']['size'];
					  $fileType = $_FILES['userfile']['type'];
					  $fileType = (get_magic_quotes_gpc()==0 
						? mysql_real_escape_string($_FILES['userfile']['type'])
						: mysql_real_escape_string(stripslashes ($_FILES['userfile'])));
					  $fp       = fopen($tmpName, 'r');
					  $content  = fread($fp, filesize($tmpName));
					  $content  = addslashes($content);
					  echo "<br />Filename: " . $fileName . "<br />";
					  echo "Filesize: &nbsp&nbsp&nbsp"  . $fileSize . "<br />";
					  echo "Filetype: " . $fileType . "<br />";
					  fclose($fp);
					   if (! get_magic_quotes_gpc() )
					   {
						 $fileName = addslashes($fileName);
					   }
					  $con = mysql_connect('localhost','jryelsik','578192') 
						or die(mysql_error());
					  $db  = mysql_select_db('jryelsik',$con);
					  if($db)
					  {
						$query = "INSERT INTO pictures (filename, filesize, filetype, filecontent) ".
						  "VALUES ('$fileName', '$fileSize', '$fileType', '$content')";
						mysql_query($query) or die('Error... query failed!');
						mysql_close();
						echo "<h3>Upload Complete!</h3><br />";
					  }
					  else
					  {
						echo "file upload failed: " . mysql_error();
					  }
					}
					?>
					<div class='form-actions'>
						<br />
						<a id="viewBtn" class="btn btn-lg btn-primary btn-block" href="fileView.php">View a Picture</a>
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


