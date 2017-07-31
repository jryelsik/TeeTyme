<?php
    require_once("database.php");
    require_once("table.php");
    
    class Persons implements Table {
        // DATA MEMBERS
        private $id;
        private $person_id;
		private $Err;
        private $course_id;
		private $teedate;
        private $teetime;
		private $strokes01;
		private $strokes02;
		private $strokes03;
		private $strokes04;
		private $strokes05;
		private $strokes06;
		private $strokes07;
		private $strokes08;
		private $strokes09;
		private $strokes10;
		private $strokes11;
		private $strokes12;
		private $strokes13;
		private $strokes14;
		private $strokes15;
		private $strokes16;
		private $strokes17;
		private $strokes18;
        
        // CONSTRUCTOR
        function __construct($id, $person_id, $course_id, $teedate, $teetime, $strokes01, $strokes02, $strokes03, $strokes04, $strokes05, $strokes06, $strokes07, $strokes08, $strokes09, $strokes10, $strokes11, $strokes12, $strokes13, $strokes14, $strokes15, $strokes16, $strokes17, $strokes18) {
            $this->id     = $id;
            $this->person_id   = $person_id;
			$this->course_id   = $course_id;
            $this->teedate  = $teedate;
			$this->teetime   = $teetime;
			$this->strokes01   = $strokes01;
			$this->strokes02   = $strokes02;
			$this->strokes03   = $strokes03;
			$this->strokes04   = $strokes04;
			$this->strokes05   = $strokes05;
			$this->strokes06   = $strokes06;
			$this->strokes07   = $strokes07;
			$this->strokes08   = $strokes08;
			$this->strokes09   = $strokes09;
			$this->strokes10   = $strokes10;
			$this->strokes11   = $strokes11;
			$this->strokes12   = $strokes12;
			$this->strokes13   = $strokes13;
			$this->strokes14   = $strokes14;
			$this->strokes15   = $strokes15;
			$this->strokes16   = $strokes16;
			$this->strokes17   = $strokes17;
			$this->strokes18   = $strokes18;
        }
    
        // Display a table containing details about every record in the database.
        public function displayListScreen() {
            echo "
                <div class='container'>
                    <div class='span10 offset1'>
                        <div class='row'>
                            <h3>Rounds</h3>
                        </div>
                        <div class='row'>
                            <a class='btn btn-primary' onclick='personsRequest(\"displayCreate\")'>Add Round</a>
                            <table class='table table-striped table-bordered' style='background-color: lightgrey !important'>
                                <thead>
                                    <tr>
                                        <th>Person ID</th>
										<th>Course ID</th>
										<th>Tee Date</th>
										<th>Tee Time</th>
										<th>Stroke 1</th>
										<th>Stroke 2</th>
										<th>Stroke 3</th>
										<th>Stroke 4</th>
										<th>Stroke 5</th>
										<th>Stroke 6</th>
										<th>Stroke 7</th>
										<th>Stroke 8</th>
										<th>Stroke 9</th>
										<th>Stroke 10</th>
										<th>Stroke 11</th>
										<th>Stroke 12</th>
										<th>Stroke 13</th>
										<th>Stroke 14</th>
										<th>Stroke 15</th>
										<th>Stroke 16</th>
										<th>Stroke 17</th>
										<th>Stroke 18</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>";                                    
            foreach (Database::prepare('SELECT * FROM `tt_rounds`', array()) as $row) {
                echo "
                    <tr>
                        <td>{$row['person_id']  }</td>
                        <td>{$row['course_id'] }</td>
						<td>{$row['teedate'] }</td>
						<td>{$row['teetime'] }</td>
						<td>{$row['strokes01'] }</td>
						<td>{$row['strokes02'] }</td>
						<td>{$row['strokes03'] }</td>
						<td>{$row['strokes04'] }</td>
						<td>{$row['strokes05'] }</td>
						<td>{$row['strokes06'] }</td>
						<td>{$row['strokes07'] }</td>
						<td>{$row['strokes08'] }</td>
						<td>{$row['strokes09'] }</td>
						<td>{$row['strokes10'] }</td>
						<td>{$row['strokes11'] }</td>
						<td>{$row['strokes12'] }</td>
						<td>{$row['strokes13'] }</td>
						<td>{$row['strokes14'] }</td>
						<td>{$row['strokes15'] }</td>
						<td>{$row['strokes16'] }</td>
						<td>{$row['strokes17'] }</td>
						<td>{$row['strokes18'] }</td>
                        <td>
                            <button class='btn' onclick='personsRequest(\"displayRead\", {$row['id']})'>Read</button><br>
                            <button class='btn btn-success' onclick='personsRequest(\"displayUpdate\", {$row['id']})'>Update</button><br>
                            <button class='btn btn-danger' onclick='personsRequest(\"displayDelete\", {$row['id']})'>Delete</button>
                        </td>
                    </tr>";
            }
            echo "</tbody></table></div></div></div>";
        }
        
        // Display a form for adding a record to the database.
        public function displayCreateScreen() {
            echo "
                <div class='container'>
                    <div class='span10 offset1'>
                        <div class='row'>
                            <h3>Create New Round</h3>
                        </div>
                        <div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Person ID</label>
                                <div class='controls'>
                                    <input id='person_id' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Course ID</label>
                                <div class='controls'>
                                    <input id='course_id' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Tee Date (0000-00-00)</label>
                                <div class='controls'>
                                    <input id='teedate' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Tee Time</label>
                                <div class='controls'>
                                    <input id='teetime' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 1</label>
                                <div class='controls'>
                                    <input id='strokes01' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 2</label>
                                <div class='controls'>
                                    <input id='strokes02' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 3</label>
                                <div class='controls'>
                                    <input id='strokes03' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 4</label>
                                <div class='controls'>
                                    <input id='strokes04' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 5</label>
                                <div class='controls'>
                                    <input id='strokes05' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 6</label>
                                <div class='controls'>
                                    <input id='strokes06' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 7</label>
                                <div class='controls'>
                                    <input id='strokes07' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 8</label>
                                <div class='controls'>
                                    <input id='strokes08' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 9</label>
                                <div class='controls'>
                                    <input id='strokes09' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 10</label>
                                <div class='controls'>
                                    <input id='strokes10' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 11</label>
                                <div class='controls'>
                                    <input id='strokes11' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 12</label>
                                <div class='controls'>
                                    <input id='strokes12' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 13</label>
                                <div class='controls'>
                                    <input id='strokes13' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 14</label>
                                <div class='controls'>
                                    <input id='strokes14' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 15</label>
                                <div class='controls'>
                                    <input id='strokes15' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 16</label>
                                <div class='controls'>
                                    <input id='strokes16' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 17</label>
                                <div class='controls'>
                                    <input id='strokes17' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 18</label>
                                <div class='controls'>
                                    <input id='strokes18' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
                            <div class='form-actions'>
                                <button class='btn btn-success' onclick='personsRequest(\"createRecord\")'>Create</button>
                                <a class='btn' onclick='personsRequest(\"displayList\")'>Back</a>
                            </div>
                        </div>
                    </div>
                </div>";
        }
        
        // Adds a record to the database.
        public function createRecord() {
            if ($this->validate()) {
                Database::prepare(
                    "INSERT INTO tt_rounds (person_id, course_id, teedate, teetime, strokes01, strokes02, strokes03, strokes04, strokes05, strokes06, strokes07, strokes08, strokes09, strokes10, strokes11, strokes12, strokes13, strokes14, strokes15, strokes16, strokes17, strokes18) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",
                    array($this->person_id, $this->course_id, $this->teedate, $this->teetime, $this->strokes01, $this->strokes02, $this->strokes03, $this->strokes04, $this->strokes05, $this->strokes06, $this->strokes07, $this->strokes08, $this->strokes09, $this->strokes10, $this->strokes11, $this->strokes12, $this->strokes13, $this->strokes14, $this->strokes15, $this->strokes16, $this->strokes17, $this->strokes18)
                );
                $this->displayListScreen();
            } else {
                $this->displayCreateScreen();
            }
        }
        
        // Display a form containing information about a specified record in the database.
        public function displayReadScreen() {
            $rec = Database::prepare(
                "SELECT * FROM tt_rounds WHERE id = ?", 
                array($this->id)
            )->fetch(PDO::FETCH_ASSOC);
            echo "
                <div class='container'>
                    <div class='span10 offset1'>
                        <div class='row'>
                            <h3>Round Details</h3>
                        </div>
                        <div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label'>Person ID</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['person_id']}
                                    </label>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label'>Course ID</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['course_id']}
                                    </label>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label'>Tee Date</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['teedate']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Tee Time</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['teetime']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Stroke 1</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['strokes01']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Stroke 2</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['strokes02']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Stroke 3</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['strokes03']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Stroke 4</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['strokes04']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Stroke 5</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['strokes05']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Stroke 6</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['strokes06']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Stroke 7</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['strokes07']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Stroke 8</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['strokes08']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Stroke 9</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['strokes09']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Stroke 10</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['strokes10']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Stroke 11</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['strokes11']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Stroke 12</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['strokes12']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Stroke 13</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['strokes13']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Stroke 14</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['strokes14']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Stroke 15</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['strokes15']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Stroke 16</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['strokes16']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Stroke 17</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['strokes17']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Stroke 18</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['strokes18']}
                                    </label>
                                </div>
                            </div>
                            <div class='form-actions'>
                                <a class='btn' onclick='personsRequest(\"displayList\")'>Back</a>
                            </div>
                        </div>
                    </div>
                </div>";
        }
        
        // Display a form for updating a record within the database.
        public function displayUpdateScreen() {
            $rec = Database::prepare(
                "SELECT * FROM tt_rounds WHERE id = ?", 
                array($this->id)
            )->fetch(PDO::FETCH_ASSOC);
            echo "
                <div class='container'>
                    <div class='span10 offset1'>
                        <div class='row'>
                            <h3>Update Round</h3>
                        </div>
                        <div class='form-horizontal'>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 1</label>
                                <div class='controls'>
                                    <input id='strokes01' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 2</label>
                                <div class='controls'>
                                    <input id='strokes02' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 3</label>
                                <div class='controls'>
                                    <input id='strokes03' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 4</label>
                                <div class='controls'>
                                    <input id='strokes04' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 5</label>
                                <div class='controls'>
                                    <input id='strokes05' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 6</label>
                                <div class='controls'>
                                    <input id='strokes06' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 7</label>
                                <div class='controls'>
                                    <input id='strokes07' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 8</label>
                                <div class='controls'>
                                    <input id='strokes08' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 9</label>
                                <div class='controls'>
                                    <input id='strokes09' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 10</label>
                                <div class='controls'>
                                    <input id='strokes10' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 11</label>
                                <div class='controls'>
                                    <input id='strokes11' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 12</label>
                                <div class='controls'>
                                    <input id='strokes12' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 13</label>
                                <div class='controls'>
                                    <input id='strokes13' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 14</label>
                                <div class='controls'>
                                    <input id='strokes14' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 15</label>
                                <div class='controls'>
                                    <input id='strokes15' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 16</label>
                                <div class='controls'>
                                    <input id='strokes16' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 17</label>
                                <div class='controls'>
                                    <input id='strokes17' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Stroke 18</label>
                                <div class='controls'>
                                    <input id='strokes18' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
                            <div class='form-actions'>
                                <button class='btn btn-success' onclick='personsRequest(\"updateRecord\", {$this->id})'>Update</button>
                                <a class='btn' onclick='personsRequest(\"displayList\")'>Back</a>
                            </div>
                        </div>
                    </div>
                </div>";
        }
        
        // Updates a record within the database.
        public function updateRecord() {
            if ($this->validate()) {
                Database::prepare(
                    "UPDATE tt_rounds SET stroke01 = ?, stroke02 = ?, stroke03 = ?, stroke04 = ?, stroke05 = ?, stroke06 = ?, stroke07 = ?, stroke08 = ?, stroke09 = ?, stroke10 = ?, stroke11 = ?, stroke12 = ?, stroke13 = ?, stroke14 = ?, stroke15 = ?, stroke16 = ?, stroke17 = ?, stroke18 = ? WHERE id = ?",
                    array(array($this->strokes01, $this->strokes02, $this->strokes03, $this->strokes04, $this->strokes05, $this->strokes06, $this->strokes07, $this->strokes08, $this->strokes09, $this->strokes10, $this->strokes11, $this->strokes12, $this->strokes13, $this->strokes14, $this->strokes15, $this->strokes16, $this->strokes17, $this->strokes18))
                );
                $this->displayListScreen();
            } else {
                $this->displayUpdateScreen();
            }
        }
        
        // Display a form for deleting a record from the database.
        public function displayDeleteScreen() {
            echo "
                <div class='container'>
                    <div class='span10 offset1'>
                        <div class='row'>
                            <h3>Delete Round</h3>
                        </div>
                        <div class='form-horizontal'>
                            <p class='alert alert-error'>Are you sure you want to delete ?</p>
                            <div class='form-actions'>
                                <button id='submit' class='btn btn-danger' onClick='personsRequest(\"deleteRecord\", {$this->id});'>Yes</button>
                                <a class='btn' onclick='personsRequest(\"displayList\")'>Back</a>
                            </div>
                        </div>
                    </div>
                </div>";
        }
        
        // Removes a record from the database.
        public function deleteRecord() {
            Database::prepare(
                "DELETE FROM tt_rounds WHERE id = ?",
                array($this->id)
            );
            $this->displayListScreen();
        }
        
        // Validates user input.
        private function validate() {
            $valid = true;
            // Check for empty input.
            if (empty($this->course_id || $this->person_id || $this->teedate || $this->teetime)) { 
                $this->Err = "Please fill out this field.";
                $valid = false; 
            }
            print_r($valid);
            return $valid;
        }
    }
?>