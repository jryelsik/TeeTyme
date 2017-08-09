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
