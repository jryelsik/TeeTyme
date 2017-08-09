<?php
    include 'database.php';
    $sql = "
        CREATE TABLE `tt_rounds` (
            `id`     INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `person_id`   INT(11) NOT NULL,
			`course_id`   INT(11) NOT NULL,
            `teedate`  date NOT NULL,
            `teetime` time NOT NULL,
			`strokes01` INT(11) NOT NULL,
			`strokes02` INT(11) NOT NULL,
			`strokes03` INT(11)) NOT NULL,
			`strokes04` INT(11) NOT NULL,
			`strokes05` INT(11) NOT NULL,
			`strokes06` INT(11) NOT NULL,
			`strokes07` INT(11) NOT NULL,
			`strokes08` INT(11) NOT NULL,
			`strokes09` INT(11) NOT NULL,
			`strokes10` INT(11) NOT NULL,
			`strokes11` INT(11) NOT NULL,
			`strokes12` INT(11) NOT NULL,
			`strokes13` INT(11) NOT NULL,
			`strokes14` INT(11) NOT NULL,
			`strokes15` INT(11) NOT NULL,
			`strokes16` INT(11) NOT NULL,
			`strokes17` INT(11) NOT NULL,
			`strokes18` INT(11) NOT NULL
        )";
    Database::prepare($sql, array());
    echo "Rounds Table Created";
?>