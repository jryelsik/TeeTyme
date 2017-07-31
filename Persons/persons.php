<?php
    require_once("database.php");
    require_once("table.php");
    
    class Persons implements Table {
        // DATA MEMBERS
        private $id;
        private $fname;
        private $fnameErr;
		private $lname;
        private $email;
        private $emailErr;
		private $password;
        private $phone;
		private $address;
		private $city;
		private $state;
		private $zip;
        
        // CONSTRUCTOR
        function __construct($id, $fname, $lname, $email, $password, $phone, $address, $city, $state, $zip) {
            $this->id     = $id;
            $this->fname   = $fname;
			$this->lname   = $lname;
            $this->email  = $email;
			$this->password   = $password;
            $this->phone = $phone;
			$this->address   = $address;
			$this->city   = $city;
			$this->state   = $state;
			$this->zip   = $zip;
        }
    
        // Display a table containing details about every record in the database.
        public function displayListScreen() {
            echo "
                <div class='container'>
                    <div class='span10 offset1'>
                        <div class='row'>
                            <h3>Persons</h3>
                        </div>
                        <div class='row'>
                            <a class='btn btn-primary' onclick='personsRequest(\"displayCreate\")'>Create</a>
                            <table class='table table-striped table-bordered' style='background-color: lightgrey !important'>
                                <thead>
                                    <tr>
                                        <th>First Name</th>
																				<th>Last Name</th>
																				<th>Email</th>
																				<th>Password</th>
																				<th>Phone</th>
																				<th>Address</th>
																				<th>City</th>
																				<th>State</th>
																				<th>Zip</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>";                                    
            foreach (Database::prepare('SELECT * FROM `tt_persons`', array()) as $row) {
                echo "
                    <tr>
                        <td>{$row['fname']  }</td>
                        <td>{$row['lname'] }</td>
						<td>{$row['email'] }</td>
						<td>{$row['password'] }</td>
						<td>{$row['phone'] }</td>
						<td>{$row['address'] }</td>
						<td>{$row['city'] }</td>
						<td>{$row['state'] }</td>
						<td>{$row['zip'] }</td>
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
                            <h3>Create Persons</h3>
                        </div>
                        <div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->fnameErr))?'':' error') ."'>First Name</label>
                                <div class='controls'>
                                    <input id='fname' type='text' required>
                                    <span class='help-inline'>{$this->fnameErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->fnameErr))?'':' error') ."'>Last Name</label>
                                <div class='controls'>
                                    <input id='lname' type='text' required>
                                    <span class='help-inline'>{$this->fnameErr}</span>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->emailErr))?'':' error') ."'>email</label>
                                <div class='controls'>
                                    <input id='email' type='text' placeholder='name@svsu.edu' required>
                                    <span class='help-inline'>{$this->emailErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->fnameErr))?'':' error') ."'>Password</label>
                                <div class='controls'>
                                    <input id='password' type='password' required>
                                    <span class='help-inline'>{$this->nameErr}</span>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->phoneErr))?'':' error') ."'>Phone</label>
                                <div class='controls'>
                                    <input id='phone' type='text' placeholder='555-5555-555' required>
                                    <span class='help-inline'>{$this->phoneErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->fnameErr))?'':' error') ."'>Address</label>
                                <div class='controls'>
                                    <input id='address' type='text' required>
                                    <span class='help-inline'>{$this->fnameErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->fnameErr))?'':' error') ."'>City</label>
                                <div class='controls'>
                                    <input id='city' type='text' required>
                                    <span class='help-inline'>{$this->fnameErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->fnameErr))?'':' error') ."'>State</label>
                                <div class='controls'>
                                    <input id='state' type='text' required>
                                    <span class='help-inline'>{$this->fnameErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->fnameErr))?'':' error') ."'>Zip</label>
                                <div class='controls'>
                                    <input id='zip' type='text' required>
                                    <span class='help-inline'>{$this->fnameErr}</span>
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
                    "INSERT INTO tt_persons (fname, lname, email, password, phone, address, city, state, zip) VALUES (?,?,?,?,?,?,?,?,?)",
                    array($this->fname, $this->lname,$this->email, $this->password, $this->phone, $this->address, $this->city, $this->state, $this->zip)
                );
                $this->displayListScreen();
            } else {
                $this->displayCreateScreen();
            }
        }
        
        // Display a form containing information about a specified record in the database.
        public function displayReadScreen() {
            $rec = Database::prepare(
                "SELECT * FROM tt_persons WHERE id = ?", 
                array($this->id)
            )->fetch(PDO::FETCH_ASSOC);
            echo "
                <div class='container'>
                    <div class='span10 offset1'>
                        <div class='row'>
                            <h3>Person Details</h3>
                        </div>
                        <div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label'>First Name</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['fname']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Last Name</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['lname']}
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
                                <label class='control-label'>Phone</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['phone']}
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
                "SELECT * FROM tt_persons WHERE id = ?", 
                array($this->id)
            )->fetch(PDO::FETCH_ASSOC);
            echo "
                <div class='container'>
                    <div class='span10 offset1'>
                        <div class='row'>
                            <h3>Update Person</h3>
                        </div>
                        <div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->fnameErr))?'':' error') ."'>First Name</label>
                                <div class='controls'>
                                    <input id='fname' type='text' value='{$rec['fname']}' required>
                                    <span class='help-inline'>{$this->fnameErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->fnameErr))?'':' error') ."'>Last Name</label>
                                <div class='controls'>
                                    <input id='lname' type='text' value='{$rec['lname']}' required>
                                    <span class='help-inline'>{$this->fnameErr}</span>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->emailErr))?'':' error') ."'>Email</label>
                                <div class='controls'>
                                    <input id='email' type='text' value='{$rec['email']}' required>
                                    <span class='help-inline'>{$this->emailErr}</span>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->phoneErr))?'':' error') ."'>Phone</label>
                                <div class='controls'>
                                    <input id='phone' type='text' value='{$rec['phone']}' required>
                                    <span class='help-inline'>{$this->phoneErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->fnameErr))?'':' error') ."'>Address</label>
                                <div class='controls'>
                                    <input id='address' type='text' value='{$rec['address']}' required>
                                    <span class='help-inline'>{$this->fnameErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->fnameErr))?'':' error') ."'>City</label>
                                <div class='controls'>
                                    <input id='city' type='text' value='{$rec['city']}' required>
                                    <span class='help-inline'>{$this->fnameErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->fnameErr))?'':' error') ."'>State</label>
                                <div class='controls'>
                                    <input id='state' type='text' value='{$rec['state']}' required>
                                    <span class='help-inline'>{$this->fnameErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->fnameErr))?'':' error') ."'>Zip</label>
                                <div class='controls'>
                                    <input id='zip' type='text' value='{$rec['zip']}' required>
                                    <span class='help-inline'>{$this->fnameErr}</span>
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
                    "UPDATE tt_persons SET fname = ?, lname = ?, email = ?, phone = ?, address = ?, city = ?, state = ?, zip = ? WHERE id = ?",
                    array($this->fname, $this->lname, $this->email, $this->phone, $this->address, $this->city, $this->state, $this->zip, $this->id)
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
                            <h3>Delete Person</h3>
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
                "DELETE FROM tt_persons WHERE id = ?",
                array($this->id)
            );
            $this->displayListScreen();
        }
        
        // Validates user input.
        private function validate() {
            $valid = true;
            // Validate Mobile
            /*if (!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $this->phone)) {
                $this->phoneErr = "Please enter a valid phone number.";
                $valid = false;
            }
            // Validate Email
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $this->emailErr = "Please enter a valid email address.";
                $valid = false;
            }*/
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