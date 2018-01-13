<?php

require_once('userModels.php');
require_once('eventModel.php');
require_once('model.php');

class Builder {

	function __constructor($model) {
		$this->model = $model;
	}

	public function buildHost($fetchedResult) {
		$id = (int)$fetchedResult["id"];
		$name = $fetchedResult["name"];
		$email = $fetchedResult["email"];
		$number = $fetchedResult["number"];
		$location = $fetchedResult["location"];
		$maxGuests = (int)$fetchedResult["maxguests"];
		$description = $fetchedResult["description"];
		$host = new Host($id, $name, $email, $number, $location, $maxGuests, $description);

		return $host;
	}

	public function buildPerformer($fetchedResult) {
		$id = (int)$fetchedResult["id"];
		$name = $fetchedResult["name"];
		$email = $fetchedResult["email"];
		$description = $fetchedResult["description"];

		$performer = new Performer($id, $name, $email, $description);

		return $performer;
	}


	public function buildAttender($fetchedResult) {
		$id = (int)$fetchedResult["id"];
		$name = $fetchedResult["name"];
		$email = $fetchedResult["email"];
		$countOfFriends = (int)$fetchedResult["countoffriends"];

		$attender = new Attender($id, $name, $email, $countOfFriends);

		return attender;
	}


	public function buildEventWithoutAttenders($fetchedResult) {
		$id = (int)$fetchedResult["id"];
		$hostId = (int)$fetchedResult["hostid"];
		$date = $fetchedResult["date"];
		$availablePlaces = (int)$fetchedResult["availableplaces"];

		$hostResult = $this->model->selectHost($hostId);
		$host = $this->buildHost($hostResult);

		$event = new Event($id, $host, $date, $availablePlaces);

		return $event;
	}

	public function buildEvent($fetchedResult) {
		$id = (int)$fetchedResult["id"];
		$hostId = (int)$fetchedResult["hostid"];
		$performerId = (int)$fetchedResult["performerid"];
		$date = $fetchedResult["date"];
		$minPayment = (float)$fetchedResult["minpayment"];
		$availablePlaces = (int)$fetchedResult["availableplaces"];

		$attenders = $this->selectAllEventAttenders($id);

		$hostResult = $this->model->selectHost($hostId);
		$host = $this->buildHost($hostResult);

		$performerResult = $this->model->selectPerformer($performerId);
		$performer = $this->buildPerformer($performerResult);

		$event = Event::withPerformer($id, $host, $performer, $date, $maxGuests, $minPayment, $attenders);

		return event;
	}


	private function selectAllEventAttenders($eventId) {
		$fetched = $this->model->selectAllAttendersToEvent($eventId);

		foreach ($fetched as $key => $events) {
			foreach ($$events as $key => $attenderId) {
				$attenderResult = $this->model->selectAttender($attenderId);
				$attender = $this->buildAttender($attenderResult);
				$attenders.push($attender);	
			}
		}

		return $attenders;
	}
}

?>