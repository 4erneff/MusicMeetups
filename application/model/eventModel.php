<?php

class Event {
	public function __contrsuct($id, $host, $date, $remainingPlaces) {
		$this->id = $id;
		$this->host = $host;
		$this->date = $date;
		$this->remainingPlaces = $remainingPlaces;
	}

	public static function withPerformer($id, $host, $date, $remainingPlaces, $performer, $minPayment, $attenders) {
		$instance = new self($id, $host, $date, $remainingPlaces);
		$instance->performer = $performer;
		$instance->minPayment = $minPayment;
		$instance->attenders = $attenders;

		return $instance;
	}
}

?>