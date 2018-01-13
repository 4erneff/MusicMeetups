<?php

abstract class Role {
	const Host = 0;
	const Performer = 1;
	const Attender = 2;

	 final private function __construct() {
        throw new Exception('Cannot be instantiated.');
    }
}

class User {
	function __construct($id, $role, $name, $email) {
		$this->id = $id;
		$this->role = $role;
		$this->name = $name;
		$this->email = $email;
	}
}

class Host extends User {
	function __construct($id, $name, $email, $number, $location, $maxGuests, $description) {
		parent::__construct($id, Role::Host, $name, $email);
		$this->number = $number;
		$this->location = $location;
		$this->maxGuests = $maxGuests;
		$this->description = $description;
	}
}

class Performer extends User {
	function __construct($id, $name, $email, $number, $description) {
		parent::__construct($id, Role::Performer, $name, $email);
		$this->number = $number;
		$this->description = $description;
	}
}

class Attender extends User {
	function __contrstruct($id, $role, $name, $email, $countOfFriends) {
		parent::__construct($id, Role::Attender, $name, $email);
		$this->countOfFriends = $countOfFriends;
	}
}

?>