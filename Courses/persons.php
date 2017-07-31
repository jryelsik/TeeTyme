<?php
    require_once("database.php");
    require_once("table.php");
    
    class Persons implements Table {
        // DATA MEMBERS
        private $id;
        private $name;
        private $nameErr;
		private $description;
        private $email;
        private $emailErr;
		private $address;
        private $city;
		private $state;
		private $zip;
		private $phone;
        private $phoneErr;
		private $par01;
		private $par02;
		private $par03;
		private $par04;
		private $par05;
		private $par06;
		private $par07;
		private $par08;
		private $par09;
		private $par10;
		private $par11;
		private $par12;
		private $par13;
		private $par14;
		private $par15;
		private $par16;
		private $par17;
		private $par18;
        
        // CONSTRUCTOR
        function __construct($id, $name, $description, $email, $address, $city, $state, $zip, $phone, $par01, $par02, $par03, $par04, $par05, $par06, $par07, $par08, $par09, $par10, $par11, $par12, $par13, $par14, $par15, $par16, $par17, $par18) {
            $this->id     = $id;
            $this->name   = $name;
			$this->description   = $description;
            $this->email  = $email;
			$this->address   = $address;
            $this->city = $city;
			$this->state   = $state;
			$this->zip   = $zip;
			$this->phone   = $phone;
			$this->par01   = $par01;
			$this->par02   = $par02;
			$this->par03   = $par03;
			$this->par04   = $par04;
			$this->par05   = $par05;
			$this->par06   = $par06;
			$this->par07   = $par07;
			$this->par08   = $par08;
			$this->par09   = $par09;
			$this->par10   = $par10;
			$this->par11   = $par11;
			$this->par12   = $par12;
			$this->par13   = $par13;
			$this->par14   = $par14;
			$this->par15   = $par15;
			$this->par16   = $par16;
			$this->par17   = $par17;
			$this->par18   = $par18;
        }
    
        // Display a table containing details about every record in the database.
        public function displayListScreen() {
            echo "
                <div class='container'>
                    <div class='span10 offset1'>
                        <div class='row'>
                            <h3>Courses</h3>
                        </div>
                        <div class='row'>
                            <a class='btn btn-primary' onclick='personsRequest(\"displayCreate\")'>Add Course</a>
                            <table class='table table-striped table-bordered' style='background-color: lightgrey !important'>
                                <thead>
                                    <tr>
                                        <th>Course Name</th>
										<th>Description</th>
										<th>Email</th>
										<th>Address</th>
										<th>City</th>
										<th>State</th>
										<th>Zip</th>
										<th>Phone</th>
										<th>Par 1</th>
										<th>Par 2</th>
										<th>Par 3</th>
										<th>Par 4</th>
										<th>Par 5</th>
										<th>Par 6</th>
										<th>Par 7</th>
										<th>Par 8</th>
										<th>Par 9</th>
										<th>Par 10</th>
										<th>Par 11</th>
										<th>Par 12</th>
										<th>Par 13</th>
										<th>Par 14</th>
										<th>Par 15</th>
										<th>Par 16</th>
										<th>Par 17</th>
										<th>Par 18</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>";                                    
            foreach (Database::prepare('SELECT * FROM `tt_courses`', array()) as $row) {
                echo "
                    <tr>
                        <td>{$row['name']  }</td>
                        <td>{$row['description'] }</td>
						<td>{$row['email'] }</td>
						<td>{$row['address'] }</td>
						<td>{$row['city'] }</td>
						<td>{$row['state'] }</td>
						<td>{$row['zip'] }</td>
						<td>{$row['phone'] }</td>
						<td>{$row['par01'] }</td>
						<td>{$row['par02'] }</td>
						<td>{$row['par03'] }</td>
						<td>{$row['par04'] }</td>
						<td>{$row['par05'] }</td>
						<td>{$row['par06'] }</td>
						<td>{$row['par07'] }</td>
						<td>{$row['par08'] }</td>
						<td>{$row['par09'] }</td>
						<td>{$row['par10'] }</td>
						<td>{$row['par11'] }</td>
						<td>{$row['par12'] }</td>
						<td>{$row['par13'] }</td>
						<td>{$row['par14'] }</td>
						<td>{$row['par15'] }</td>
						<td>{$row['par16'] }</td>
						<td>{$row['par17'] }</td>
						<td>{$row['par18'] }</td>
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
                            <h3>Create Courses</h3>
                        </div>
                        <div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Course Name</label>
                                <div class='controls'>
                                    <input id='name' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Description</label>
                                <div class='controls'>
                                    <input id='description' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Email</label>
                                <div class='controls'>
                                    <input id='email' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Address</label>
                                <div class='controls'>
                                    <input id='address' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>City</label>
                                <div class='controls'>
                                    <input id='city' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>State</label>
                                <div class='controls'>
                                    <input id='state' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Zip</label>
                                <div class='controls'>
                                    <input id='zip' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Phone</label>
                                <div class='controls'>
                                    <input id='phone' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 1</label>
                                <div class='controls'>
                                    <input id='par01' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 2</label>
                                <div class='controls'>
                                    <input id='par02' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 3</label>
                                <div class='controls'>
                                    <input id='par03' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 4</label>
                                <div class='controls'>
                                    <input id='par04' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 5</label>
                                <div class='controls'>
                                    <input id='par05' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 6</label>
                                <div class='controls'>
                                    <input id='par06' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 7</label>
                                <div class='controls'>
                                    <input id='par07' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 8</label>
                                <div class='controls'>
                                    <input id='par08' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 9</label>
                                <div class='controls'>
                                    <input id='par09' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 10</label>
                                <div class='controls'>
                                    <input id='par10' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 11</label>
                                <div class='controls'>
                                    <input id='par11' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 12</label>
                                <div class='controls'>
                                    <input id='par12' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 13</label>
                                <div class='controls'>
                                    <input id='par13' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 14</label>
                                <div class='controls'>
                                    <input id='Par14' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 15</label>
                                <div class='controls'>
                                    <input id='par15' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 16</label>
                                <div class='controls'>
                                    <input id='par16' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 17</label>
                                <div class='controls'>
                                    <input id='par17' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 18</label>
                                <div class='controls'>
                                    <input id='par18' type='text' required>
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
                    "INSERT INTO tt_courses (name, description, email, address, city, state, zip, phone, par01, par02, par03, par04, par05, par06, par07, par08, par09, par10, par11, par12, par13, par14, par15, par16, par17, par18) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",
                    array($this->name, $this->description, $this->email, $this->address,  $this->city,  $this->state, $this->zip, $this->phone, $this->par01, $this->par02, $this->par03, $this->par04, $this->par05, $this->par06, $this->par07, $this->par08, $this->par09, $this->par10, $this->par11, $this->par12, $this->par13, $this->par14, $this->par15, $this->par16, $this->par17, $this->par18)
                );
                $this->displayListScreen();
            } else {
                $this->displayCreateScreen();
            }
        }
        
        // Display a form containing information about a specified record in the database.
        public function displayReadScreen() {
            $rec = Database::prepare(
                "SELECT * FROM tt_courses WHERE id = ?", 
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
                                <label class='control-label'>Course Name</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['name']}
                                    </label>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label'>Description</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['description']}
                                    </label>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label'>Email</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['email']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Address</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['address']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>City</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['city']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>State</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['state']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Zip</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['zip']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Phone</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['phone']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par 1</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par01']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par 2</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par02']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par 3</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par03']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par 4</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par04']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par 5</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par05']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par 6</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par06']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par 7</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par07']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par 8</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par08']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par 9</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par09']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par 10</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par10']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par 11</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par11']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par 12</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par12']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par 13</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par13']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par 14</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par14']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par 15</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par15']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par 16</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par16']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par 17</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par17']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par 18</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par18']}
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
                "SELECT * FROM tt_courses WHERE id = ?", 
                array($this->id)
            )->fetch(PDO::FETCH_ASSOC);
            echo "
                <div class='container'>
                    <div class='span10 offset1'>
                        <div class='row'>
                            <h3>Update Course</h3>
                        </div>
                        <div class='form-horizontal'>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Course Name</label>
                                <div class='controls'>
                                    <input id='name' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Description</label>
                                <div class='controls'>
                                    <input id='description' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Email</label>
                                <div class='controls'>
                                    <input id='email' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Address</label>
                                <div class='controls'>
                                    <input id='address' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>City</label>
                                <div class='controls'>
                                    <input id='city' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>State</label>
                                <div class='controls'>
                                    <input id='state' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Zip</label>
                                <div class='controls'>
                                    <input id='zip' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Phone</label>
                                <div class='controls'>
                                    <input id='phone' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 1</label>
                                <div class='controls'>
                                    <input id='par01' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 2</label>
                                <div class='controls'>
                                    <input id='par02' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 3</label>
                                <div class='controls'>
                                    <input id='par03' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 4</label>
                                <div class='controls'>
                                    <input id='par04' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 5</label>
                                <div class='controls'>
                                    <input id='par05' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 6</label>
                                <div class='controls'>
                                    <input id='par06' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 7</label>
                                <div class='controls'>
                                    <input id='par07' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 8</label>
                                <div class='controls'>
                                    <input id='par08' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 9</label>
                                <div class='controls'>
                                    <input id='par09' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 10</label>
                                <div class='controls'>
                                    <input id='par10' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 11</label>
                                <div class='controls'>
                                    <input id='par11' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 12</label>
                                <div class='controls'>
                                    <input id='par12' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 13</label>
                                <div class='controls'>
                                    <input id='par13' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 14</label>
                                <div class='controls'>
                                    <input id='par14' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 15</label>
                                <div class='controls'>
                                    <input id='par15' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 16</label>
                                <div class='controls'>
                                    <input id='par16' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 17</label>
                                <div class='controls'>
                                    <input id='par17' type='text' required>
                                    <span class='help-inline'>{$this->Err}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->Err))?'':' error') ."'>Par 18</label>
                                <div class='controls'>
                                    <input id='par18' type='text' required>
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
                    "UPDATE tt_rounds SET name = ?, description = ?, email = ?, address = ?, city = ?, state = ?, zip = ?, phone = ?, par01 = ?, par02 = ?, par03 = ?, par04 = ?, par05 = ?, par06 = ?, par07 = ?, par08 = ?, par09 = ?, par10 = ?, par11 = ?, par12 = ?, par13 = ?, par14 = ?, par15 = ?, par16 = ?, par17 = ?, par18 = ? WHERE id = ?",
                    array(array($this->name, $this->description, $this->email, $this->address, $this->city, $this->state, $this->zip, $this->phone, $this->par01, $this->par02, $this->par03, $this->par04, $this->par05, $this->par06, $this->par07, $this->par08, $this->par09, $this->par10, $this->par11, $this->par12, $this->par13, $this->par14, $this->par15, $this->par16, $this->par17, $this->par18))
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
                            <h3>Delete Course</h3>
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
                "DELETE FROM tt_courses WHERE id = ?",
                array($this->id)
            );
            $this->displayListScreen();
        }
        
        // Validates user input.
        private function validate() {
            $valid = true;
            // Validate Mobile
            if (!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $this->phone)) {
                $this->phoneErr = "Please enter a valid phone number.";
                $valid = false;
            }
            // Validate Email
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $this->emailErr = "Please enter a valid email address.";
                $valid = false;
            }
            // Check for empty input.
            if (empty($this->fname)) { 
                $this->fnameErr = "Please enter a name.";
                $valid = false; 
            }
            if (empty($this->email)) { 
                $this->emailErr = "Please enter an email.";
                $valid = false; 
            }
            if (empty($this->phone)) { 
                $this->phoneErr = "Please enter a phone number.";
                $valid = false; 
            } print_r($valid);
            return $valid;
        }
    }
?>