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
        $event['location'] = (string)$event['host']['location'];
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/attend/event.php';
        require APP . 'view/_templates/footer.php';
    }

    public function addAttender($event_id) {
        $errors = array();
        $form_data = array();

        /* Validate the form on the server side */
        if (empty($_POST['name'])) {
            $errors['name'] = 'Name cannot be blank';
        }

        if (empty($_POST['email'])) {
            $errors['email'] = 'Email cannot be blank';
        }
        echo($_POST['extra-people-input']);
        if (!empty($errors)) {
            $form_data['success'] = false;
            $form_data['errors']  = $errors;
        } else {
            $this->model->addAttender($_POST['email'], $_POST['name'], $_POST['extra-people-input']);
            $attender = (array)$this->model->selectAttenderWithEmail($_POST['email']);
            $this->model->addEventAttender($event_id, $attender['id']);
            $event = $this->arrayCastRecursive($this->model->selectEventWithId($event_id));

            $form_data['success'] = true;
            $form_data['message'] = 'You are registered as an attender for the event successfully!';
        }

        echo json_encode($form_data);
    }
}
