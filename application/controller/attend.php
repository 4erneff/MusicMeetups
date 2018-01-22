<?php

/**
 * Class Attend
 */
class Attend extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://MusicMeetups/attend/index
     */
    public function index()
    {
        $events = $this->arrayCastRecursive($this->model->selectAllReadyEvents());

        for ($i = 0; $i < sizeof($events); ++$i)
        {
            $events[$i]['host'] = $this->arrayCastRecursive($this->model->selectHostWithId($events[$i]['hostid']));
            $events[$i]['performer'] = $this->arrayCastRecursive($this->model->selectPerformerWithId($events[$i]['performerid']));
        }
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/attend/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: exampleone
     * This method handles what happens when you move to http://yourproject/home/exampleone
     * The camelCase writing is just for better readability. The method name is case-insensitive.
     */
    public function event($event_id)
    {
        $event = $this->arrayCastRecursive($this->model->selectEventWithId($event_id));
        $event['host'] = $this->arrayCastRecursive($this->model->selectHostWithId($event['hostid']));
        $event['performer'] = $this->arrayCastRecursive($this->model->selectPerformerWithId($event['performerid']));

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/attend/event.php';
        require APP . 'view/_templates/footer.php';
    }

    public function addAttender($event_id) {
        $errors = array();
        $form_data = array();
        $event = $this->arrayCastRecursive($this->model->selectEventWithId($event_id));

        /* Validate the form on the server side */
        if (empty($_POST['name'])) {
            $errors['name'] = 'Name cannot be blank';
        }

        if (empty($_POST['email'])) {
            $errors['email'] = 'Email cannot be blank';
        }

        if (!empty($_POST['extra_people']) && (int)$_POST['extra_people'] + 1 > $event['remainingplaces']) {
            $errors['extra_people'] = 'There are only ' . $event['remainingplaces'] . ' places left for this event';
        }

        if (!empty($errors)) {
            $form_data['success'] = false;
            $form_data['errors']  = $errors;
        } else {
            $atternderAdderId = $this->model->addAttender($_POST['email'], $_POST['name'], $_POST['extra_people']);
            $attender = (array)$this->model->selectAttenderWithId($atternderAdderId);
            $this->model->addEventAttender($event_id, $attender['id'], $attender['countoffriends']);

            $form_data['success'] = true;
            $form_data['message'] = 'You are registered as an attender for the event successfully!';
        }

        echo json_encode($form_data);
    }
}
