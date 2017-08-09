<?php
    require_once("database.php");
    require_once("table.php");
    
    class Persons implements Table {
        // DATA MEMBERS
        private $id;
        private $person_id;
        private $perErr;
		private $course_id;
		private $courseErr;
        private $teedate;
        private $dateErr;
		private $teetime;
		private $timeErr;
		private $strokes01;
		private $Err1;
		private $strokes02;
		private $Err2;
		private $strokes03;
		private $Err3;
		private $strokes04;
		private $Err4;
		private $strokes05;
		private $Err5;
		private $strokes06;
		private $Err6;
		private $strokes07;
		private $Err7;
		private $strokes08;
		private $Err8;
		private $strokes09;
		private $Err9;
		private $strokes10;
		private $Err10;
		private $strokes11;
		private $Err11;
		private $strokes12;
		private $Err12;
		private $strokes13;
		private $Err13;
		private $strokes14;
		private $Err14;
		private $strokes15;
		private $Err15;
		private $strokes16;
		private $Err16;
		private $strokes17;
		private $Err17;
		private $strokes18;
		private $Err18;
        
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
                            <a class='btn btn-primary' onclick='personsRequest(\"displayCreate\")'>Create</a>
                            <table class='table table-striped table-bordered' style='background-color: lightgrey !important'>
                                <thead>
                                    <tr>
                                        <th>person_id</th>
										<th>course_id</th>
										<th>teedate</th>
										<th>teetime</th>
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
                            <h3>Create Rounds</h3>
                        </div>
                        <div class='control-group'>
                                <label class='control-label". ((empty($this->perErr))?'':' error') ."'>person_id</label>
                                <div class='controls'>
                                    <input id='person_id' type='text' required>
                                    <span class='help-inline' style='color:red;'>{$this->perErr}</span>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->courseErr))?'':' error') ."'>course_id</label>
                                <div class='controls'>
                                    <input id='course_id' type='text' required>
                                    <span class='help-inline' style='color:red;'>{$this->courseErr}</span>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->dateErr))?'':' error') ."'>teedate</label>
                                <div class='controls'>
                                    <input id='teedate' type='date' required>
                                    <span class='help-inline' style='color:red;'>{$this->dateErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->timeErr))?'':' error') ."'>teetime</label>
                                <div class='controls'>
                                    <input id='teetime' type='time' required>
                                    <span class='help-inline' style='color:red;'>{$this->timeErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err1))?'':' error') ."'>Stroke 1</label>
                                <div class='controls'>
                                    <input id='strokes01' type='text' required>
                                    <span class='help-inline' style='color:red;'>{$this->Err1}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err2))?'':' error') ."'>Stroke 2</label>
                                <div class='controls'>
                                    <input id='strokes02' type='text' required>
                                    <span class='help-inline' style='color:red;'>{$this->Err2}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err3))?'':' error') ."'>Stroke 3</label>
                                <div class='controls'>
                                    <input id='strokes03' type='text' required>
                                    <span class='help-inline' style='color:red;'>{$this->Err3}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err4))?'':' error') ."'>Stroke 4</label>
                                <div class='controls'>
                                    <input id='strokes04' type='text' required>
                                    <span class='help-inline' style='color:red;'>{$this->Err4}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err5))?'':' error') ."'>Stroke 5</label>
                                <div class='controls'>
                                    <input id='strokes05' type='text' required>
                                    <span class='help-inline' style='color:red;'>{$this->Err5}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err6))?'':' error') ."'>Stroke 6</label>
                                <div class='controls'>
                                    <input id='strokes06' type='text' required>
                                    <span class='help-inline' style='color:red;'>{$this->Err6}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err7))?'':' error') ."'>Stroke 7</label>
                                <div class='controls'>
                                    <input id='strokes07' type='text' required>
                                    <span class='help-inline' style='color:red;'>{$this->Err7}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err8))?'':' error') ."'>Stroke 8</label>
                                <div class='controls'>
                                    <input id='strokes08' type='text' required>
                                    <span class='help-inline' style='color:red;'>{$this->Err8}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err9))?'':' error') ."'>Stroke 9</label>
                                <div class='controls'>
                                    <input id='strokes09' type='text' required>
                                    <span class='help-inline' style='color:red;'>{$this->Err9}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err10))?'':' error') ."'>Stroke 10</label>
                                <div class='controls'>
                                    <input id='strokes10' type='text' required>
                                    <span class='help-inline' style='color:red;'>{$this->Err10}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err11))?'':' error') ."'>Stroke 11</label>
                                <div class='controls'>
                                    <input id='strokes11' type='text' required>
                                    <span class='help-inline' style='color:red;'>{$this->Err11}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err12))?'':' error') ."'>Stroke 12</label>
                                <div class='controls'>
                                    <input id='strokes12' type='text' required>
                                    <span class='help-inline' style='color:red;'>{$this->Err12}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err13))?'':' error') ."'>Stroke 13</label>
                                <div class='controls'>
                                    <input id='strokes13' type='text' required>
                                    <span class='help-inline' style='color:red;'>{$this->Err13}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err14))?'':' error') ."'>Stroke 14</label>
                                <div class='controls'>
                                    <input id='strokes14' type='text' required>
                                    <span class='help-inline' style='color:red;'>{$this->Err14}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err15))?'':' error') ."'>Stroke 15</label>
                                <div class='controls'>
                                    <input id='strokes15' type='text' required>
                                    <span class='help-inline' style='color:red;'>{$this->Err15}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err16))?'':' error') ."'>Stroke 16</label>
                                <div class='controls'>
                                    <input id='strokes16' type='text' required>
                                    <span class='help-inline' style='color:red;'>{$this->Err16}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err17))?'':' error') ."'>Stroke 17</label>
                                <div class='controls'>
                                    <input id='strokes17' type='text' required>
                                    <span class='help-inline' style='color:red;'>{$this->Err17}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err18))?'':' error') ."'>Stroke 18</label>
                                <div class='controls'>
                                    <input id='strokes18' type='text' required>
                                    <span class='help-inline' style='color:red;'>{$this->Err18}</span>
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
                            <h3>Course Details</h3>
                        </div>
						<div class='form-horizontal'>
                        <div class='control-group'>
                                <label class='control-label'>person_id</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['person_id']}
                                    </label>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label'>course_id</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['course_id']}
                                    </label>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label'>teedate</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['teedate']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>teetime</label>
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
                                <label class='control-label". ((empty($this->perErr))?'':' error') ."'>person_id</label>
                                <div class='controls'>
                                    <input id='person_id' type='text' value='{$rec['person_id']}' required>
                                    <span class='help-inline'>{$this->perErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->courseErr))?'':' error') ."'>course_id</label>
                                <div class='controls'>
                                    <input id='course_id' type='text' value='{$rec['course_id']}'required>
                                    <span class='help-inline'>{$this->courseErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->dateErr))?'':' error') ."'>teedate</label>
                                <div class='controls'>
                                    <input id='teedate' type='text' value='{$rec['teedate']}' required>
                                    <span class='help-inline'>{$this->dateErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->timeErr))?'':' error') ."'>teetime</label>
                                <div class='controls'>
                                    <input id='teetime' type='text' value='{$rec['teetime']}' required>
                                    <span class='help-inline'>{$this->timeErr}</span>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->Err1))?'':' error') ."'>Stroke 1</label>
                                <div class='controls'>
                                    <input id='strokes01' type='text' value='{$rec['strokes01']}' required>
                                    <span class='help-inline'>{$this->Err1}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err2))?'':' error') ."'>Stroke 2</label>
                                <div class='controls'>
                                    <input id='strokes02' type='text' value='{$rec['strokes02']}' required>
                                    <span class='help-inline'>{$this->Err2}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err3))?'':' error') ."'>Stroke 3</label>
                                <div class='controls'>
                                    <input id='strokes03' type='text' value='{$rec['strokes03']}' required>
                                    <span class='help-inline'>{$this->Err3}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err4))?'':' error') ."'>Stroke 4</label>
                                <div class='controls'>
                                    <input id='strokes04' type='text' value='{$rec['strokes04']}' required>
                                    <span class='help-inline'>{$this->Err4}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err5))?'':' error') ."'>Stroke 5</label>
                                <div class='controls'>
                                    <input id='strokes05' type='text' value='{$rec['strokes05']}' required>
                                    <span class='help-inline'>{$this->Err5}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err6))?'':' error') ."'>Stroke 6</label>
                                <div class='controls'>
                                    <input id='strokes06' type='text' value='{$rec['strokes06']}' required>
                                    <span class='help-inline'>{$this->Err6}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err7))?'':' error') ."'>Stroke 7</label>
                                <div class='controls'>
                                    <input id='strokes07' type='text' value='{$rec['strokes07']}' required>
                                    <span class='help-inline'>{$this->Err7}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err8))?'':' error') ."'>Stroke 8</label>
                                <div class='controls'>
                                    <input id='strokes08' type='text' value='{$rec['strokes08']}' required>
                                    <span class='help-inline'>{$this->Err8}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err9))?'':' error') ."'>Stroke 9</label>
                                <div class='controls'>
                                    <input id='strokes09' type='text' value='{$rec['strokes09']}'  required>
                                    <span class='help-inline'>{$this->Err9}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err10))?'':' error') ."'>Stroke 10</label>
                                <div class='controls'>
                                    <input id='strokes10' type='text' value='{$rec['strokes10']}' required>
                                    <span class='help-inline'>{$this->Err10}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err11))?'':' error') ."'>Stroke 11</label>
                                <div class='controls'>
                                    <input id='strokes11' type='text' value='{$rec['strokes11']}' required>
                                    <span class='help-inline'>{$this->Err11}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err12))?'':' error') ."'>Stroke 12</label>
                                <div class='controls'>
                                    <input id='strokes12' type='text' value='{$rec['strokes12']}' required>
                                    <span class='help-inline'>{$this->Err12}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err13))?'':' error') ."'>Stroke 13</label>
                                <div class='controls'>
                                    <input id='strokes13' type='text' value='{$rec['strokes13']}' required>
                                    <span class='help-inline'>{$this->Err13}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err14))?'':' error') ."'>Stroke 14</label>
                                <div class='controls'>
                                    <input id='strokes14' type='text' value='{$rec['strokes14']}' required>
                                    <span class='help-inline'>{$this->Err14}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err15))?'':' error') ."'>Stroke 15</label>
                                <div class='controls'>
                                    <input id='strokes15' type='text' value='{$rec['strokes15']}' required>
                                    <span class='help-inline'>{$this->Err15}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err16))?'':' error') ."'>Stroke 16</label>
                                <div class='controls'>
                                    <input id='strokes16' type='text' value='{$rec['strokes16']}' required>
                                    <span class='help-inline'>{$this->Err16}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err17))?'':' error') ."'>Stroke 17</label>
                                <div class='controls'>
                                    <input id='strokes17' type='text' value='{$rec['strokes17']}' required>
                                    <span class='help-inline'>{$this->Err17}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err18))?'':' error') ."'>Stroke 18</label>
                                <div class='controls'>
                                    <input id='strokes18' type='text' value='{$rec['strokes18']}' required>
                                    <span class='help-inline'>{$this->Err18}</span>
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
                    "UPDATE tt_rounds SET person_id = ?, course_id = ?, teedate = ?, teetime = ?, strokes01 = ?, strokes02 = ?, strokes03 = ?, strokes04 = ?, strokes05 = ?, strokes06 = ?, strokes07 = ?, strokes08 = ?, strokes09 = ?, strokes10 = ?, strokes11 = ?, strokes12 = ?, strokes13 = ?, strokes14 = ?, strokes15 = ?, strokes16 = ?, strokes17 = ?, strokes18 = ? WHERE id = ?",
                    array($this->person_id, $this->course_id, $this->teedate, $this->teetime, $this->strokes01, $this->strokes02, $this->strokes03, $this->strokes04, $this->strokes05, $this->strokes06, $this->strokes07, $this->strokes08, $this->strokes09, $this->strokes10, $this->strokes11, $this->strokes12, $this->strokes13, $this->strokes14, $this->strokes15, $this->strokes16, $this->strokes17, $this->strokes18, $this->id)
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
            if (empty($this->person_id)) { 
                $this->perErr = "Please fill out this field.";
                $valid = false; 
            }
			if (empty($this->course_id)) { 
                $this->courseErr = "Please fill out this field.";
                $valid = false; 
            }
            if (empty($this->teedate)) { 
                $this->dateErr = "Please enter an teedate.";
                $valid = false; 
            }
			if (empty($this->teetime)) { 
                $this->timeErr = "Please fill out this field.";
                $valid = false; 
            }
			if (empty($this->strokes01)) { 
                $this->Err1 = "Please fill out this field.";
                $valid = false; 
            }
			if (empty($this->strokes02)) { 
                $this->Err2 = "Please fill out this field.";
                $valid = false; 
            }
			if (empty($this->strokes03)) { 
                $this->Err3 = "Please fill out this field.";
                $valid = false; 
            }
			if (empty($this->strokes04)) { 
                $this->Err4 = "Please fill out this field.";
                $valid = false; 
            }
			if (empty($this->strokes05)) { 
                $this->Err5 = "Please fill out this field.";
                $valid = false; 
            }
			if (empty($this->strokes06)) { 
                $this->Err6 = "Please fill out this field.";
                $valid = false; 
            }
			if (empty($this->strokes07)) { 
                $this->Err7 = "Please fill out this field.";
                $valid = false; 
            }
			if (empty($this->strokes08)) { 
                $this->Err8 = "Please fill out this field.";
                $valid = false; 
            }
			if (empty($this->strokes09)) { 
                $this->Err9 = "Please fill out this field.";
                $valid = false; 
            }
			if (empty($this->strokes10)) { 
                $this->Err10 = "Please fill out this field.";
                $valid = false; 
            }
			if (empty($this->strokes11)) { 
                $this->Err11 = "Please fill out this field.";
                $valid = false; 
            }
			if (empty($this->strokes12)) { 
                $this->Err12 = "Please fill out this field.";
                $valid = false; 
            }
			if (empty($this->strokes13)) { 
                $this->Err13 = "Please fill out this field.";
                $valid = false; 
            }
			if (empty($this->strokes14)) { 
                $this->Err14 = "Please fill out this field.";
                $valid = false; 
            }
			if (empty($this->strokes15)) { 
                $this->Err15 = "Please fill out this field.";
                $valid = false; 
            }
			if (empty($this->strokes16)) { 
                $this->Err16 = "Please fill out this field.";
                $valid = false; 
            }
			if (empty($this->strokes17)) { 
                $this->Err17 = "Please fill out this field.";
                $valid = false; 
            }
			if (empty($this->strokes18)) { 
                $this->Err18 = "Please fill out this field.";
                $valid = false; 
            } print_r($valid);
            return $valid;
        }
    }
?>