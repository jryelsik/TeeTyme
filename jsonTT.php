<head>
    <meta charset="utf-8">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-3.2.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
		<div id="body">
		
		</div>
		<br /><br /><br />
		<div class="container">
			<?php
				include "../../database/databaseTT.php";
				if(isset($_GET['id'])) {
					echo json_encode(
						Database::prepare(
						'SELECT * FROM tt_persons WHERE id=' . $_GET['id'],
						array()
						)->fetchAll(PDO::FETCH_ASSOC)
					);
				} else
					echo json_encode(
						Database::prepare(
						'SELECT * FROM tt_persons',
						array()
						)->fetchAll(PDO::FETCH_ASSOC)
					);
			?>
		</div>		
	</body>
</html>