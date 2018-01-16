<?php
class Model {
	function __construct($db) {
		try {
			$this->db = $db;
		} catch (PDOException $e) {
			exit('Databse connection could not be established.');
		}
	}

	public function addHost($email, $name, $number, $location, $maxGuests, $description) {
		$sql = "INSERT INTO host (email, name, number, location, maxguests, description) VALUES (:email, :name, :number, :location, :maxguests, :description)";
		$query = $this->db->prepare($sql);
		$parameters = array(':email' => $email, ':name' => $name, ':number' => $number, ':location' => $location, ':maxguests' => $maxGuests, ':description' => $description);

		$query->execute($parameters);
	}

	public function selectHostWithId($hostId) {
		$sql = "SELECT id, email, name, number, location, maxguests, description FROM host WHERE id = :hostid";
		$query = $this->db->prepare($sql);

		$parameters = array(':hostid' => $hostId);

		$query->execute($parameters);

		return $query->fetch(PDO::FETCH_ASSOC);
	}

	public function selectHostWithEmail($email) {
		$sql = "SELECT id, email, name, number, location, maxguests, description FROM host WHERE email = :email";
		$query = $this->db->prepare($sql);

		$parameters = array(':email' => $email);

		$query->execute($parameters);

		return $query->fetch(PDO::FETCH_ASSOC);
	}

	public function addPerformer($email, $name, $number, $description) {
		$sql = "INSERT INTO performer (email, name, number, description) VALUES (:email, :name, :number, :description)";
		$query = $this->db->prepare($sql);

		$parameters = array(':email' => $email, ':name' => $name, ':number' => $number, ':description' => $description);

		$query->execute($parameters);
	}

	public function selectPerformerWithId($performerId) {
		$sql = "SELECT id, email, name, number, description FROM performer WHERE id = :performerid";
		$query = $this->db->prepare($sql);

		$parameters = array(':performerid' => $performerId);

		$query->execute($parameters);

		return $query->fetch(PDO::FETCH_ASSOC);
	}

	public function selectPerformerWithEmail($performerEmail) {
		$sql = "SELECT id, email, name, number, description FROM performer WHERE email = :email";
		$query = $this->db->prepare($sql);

		$parameters = array(':email' => $performerEmail);

		$query->execute($parameters);

		return $query->fetch(PDO::FETCH_ASSOC);
	}

	public function addAttender($email, $name, $countOfFriends) {
		$sql = "INSERT INTO attender (email, name, countoffriends) VALUES (:email, :name, :countoffriends)";
		$query = $this->db->preprare($sql);

		$parameters = array(':email' => $email, ':name' => $name, ':countoffriends' => $countOfFriends );
		
		$query->execute($parameters);
	}

	public function selectAttenderWithId($attenderId) {
		$sql = "SELECT id, email, name, countoffriends FROM attender WHERE id = :attenderid";
		$query = $this->db->prepare($sql);

		$parameters = array('attenderid' => $attenderId);

		$query->execute($parameters);

		return $query->fetch(PDO::FETCH_ASSOC);
	}

	public function selectAttenderWithEmail($attenderEmail) {
		$sql = "SELECT id, email, name, countoffriends FROM attender WHERE email = :email";
		$query = $this->db->prepare($sql);

		$parameters = array('email' => $attenderEmail);

		$query->execute($parameters);

		return $query->fetch(PDO::FETCH_ASSOC);
	}

	public function addEvent($hostId, $date, $availablePlaces) {
		$sql = "INSERT INTO event (hostid, date, remainingplaces) VALUES (:hostid, :date, :remainingplaces)";
		$query = $this->db->prepare($sql);

		$parameters = array(':hostid' => $hostId, ':date' => $date, ':remainingplaces' => $availablePlaces);

		$query->execute($parameters);
	}

	public function addPerformerToEvent($eventId, $performerId, $minPayment) {
		$sql = "UPDATE event SET performerid = :performerid, minpayment = :minpayment WHERE id = :eventid";
		$query = $this->db->prepare($sql);
		$parameters = array(':performerid' => $performerId, ':minpayment' => $minPayment, ':eventid' => $eventId);

		$query->execute($parameters);
	}

	public function selectEventWithId($eventId) {
		$sql = "SELECT id, hostid, date, performerid, minpayment, remainingplaces FROM event WHERE id = :eventid";
		$query = $this->db->prepare($sql);

		$parameters = array(':eventid' => $eventId);

		$query->execute($parameters);

		return $query->fetch(PDO::FETCH_ASSOC);
	}

	public function selectAllEventsWithoutPerformer() {
		$sql = "SELECT id, hostid, date FROM event WHERE performerid IS NULL";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}

	public function selectAllReadyEvents() {
		$sql = "SELECT id, hostid, date, performerid, minpayment, remainingplaces FROM event WHERE performerid IS NOT NULL";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}

	public function selectAllAttendersToEvent($eventId) {
		$sql = "SELECT attenderid FROM eventattender WHERE eventid = :eventid";
		$query = $this->db->prepare($sql);

		$parameters = array(':eventid' => $eventId);

		$query->execute($parameters);

		return $query->fetchAll();
	}

	public function addUser($email, $name, $number, $password) {
		$sql = "INSERT INTO user (email, name, number, password) VALUES (:email, :name, :number, :password)";
		$query = $this->db->prepare($sql);
		$parameters = array(':email' => $email, ':name' => $name, ':number' => $number, ':password' => $password);

		$query->execute($parameters);
	}

	public function selectUserByEmailAndPassword($email, $password) {
		$sql = "SELECT id, email, name FROM user WHERE email = :email AND password = :password";
		$query = $this->db->prepare($sql);

		$parameters = array('email' => $email, 'password' => $password);

		$query->execute($parameters);

		return $query->fetch(PDO::FETCH_ASSOC);
	}
}

?>