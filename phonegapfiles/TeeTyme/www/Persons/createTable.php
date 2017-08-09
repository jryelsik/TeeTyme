<?php
    include 'database.php';
    $sql = "
        CREATE TABLE `tt_persons` (
            `id`     INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `fname`   VARCHAR(255) NOT NULL,
			`lname`   VARCHAR(255) NOT NULL,
            `email`  VARCHAR(255) NOT NULL,
            `password` VARCHAR(32) NOT NULL,
			`phone` VARCHAR(255) NOT NULL,
			`address` VARCHAR(255) NOT NULL,
			`city` VARCHAR(255) NOT NULL,
			`state` VARCHAR(2) NOT NULL,
			`zip` VARCHAR(10) NOT NULL
        )";
    Database::prepare($sql, array());
    echo "Persons Table Created";
?>