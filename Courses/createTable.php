<?php
    include 'database.php';
    $sql = "
        CREATE TABLE `tt_courses` (
            `id`     INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `name`   VARCHAR(255) NOT NULL,
			`description`   VARCHAR(1024) NOT NULL,
            `email`  VARCHAR(255) NOT NULL,
            `address` VARCHAR(255) NOT NULL,
			`city` VARCHAR(255) NOT NULL,
			`state` VARCHAR(2) NOT NULL,
			`zip` VARCHAR(10) NOT NULL,
			`phone` INT(11) NOT NULL,
			`par01` INT(11) NOT NULL,
			`par02` INT(11) NOT NULL,
			`par03` INT(11)) NOT NULL,
			`par04` INT(11) NOT NULL,
			`par05` INT(11) NOT NULL,
			`par06` INT(11) NOT NULL,
			`par07` INT(11) NOT NULL,
			`par08` INT(11) NOT NULL,
			`par09` INT(11) NOT NULL,
			`par10` INT(11) NOT NULL,
			`par11` INT(11) NOT NULL,
			`par12` INT(11) NOT NULL,
			`par13` INT(11) NOT NULL,
			`par14` INT(11) NOT NULL,
			`par15` INT(11) NOT NULL,
			`par16` INT(11) NOT NULL,
			`par17` INT(11) NOT NULL,
			`par18` INT(11) NOT NULL
        )";
    Database::prepare($sql, array());
    echo "Courses Table Created";
?>