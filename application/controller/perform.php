<?php

/**
 * Class Perform
 */
class Perform extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://MusicMeetups/perform/index
     */
    public function index()
    {
        $events = $this->arrayCastRecursive($this->model->selectAllEventsWithoutPerformer());
        for ($i = 0; $i < sizeof($events); ++$i)
        {
            $events[$i]['host'] = $this->arrayCastRecursive($this->model->selectHostWithId($events[$i]['hostid']));
        }
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/perform/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function event($event_id)
    {
        $event = $this->arrayCastRecursive($this->model->selectEventWithId($event_id));
        $event['host'] = $this->arrayCastRecursive($this->model->selectHostWithId($event['hostid']));
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/perform/event.php';
        require APP . 'view/_templates/footer.php';
    }

    public function addPerformer($event_id)
    {
        $errors = array();
        $form_data = array();

        /* Validate the form on the server side */
        if (empty($_POST['name'])) {
            $errors['name'] = 'Name cannot be blank';
        }

        if (empty($_POST['email'])) {
            $errors['email'] = 'Email cannot be blank';
        }

        if (empty($_POST['mobile'])) {
            $errors['mobile'] = 'Please enter your mobile number';
        }

        if (empty($_POST['description'])) {
            $errors['addInfo'] = 'Please, provide some info about you';
        }

        if (empty($_POST['minimal_tax']) || (!is_numeric($_POST['minimal_tax'])) || ((int)$_POST['minimal_tax'] < 1) 
        || ((int)$_POST['minimal_tax'] > 10)) {
            $errors['minimal_tax'] = 'The tax should be a positive integer up to 10 euro';
        }

        if (!empty($errors)) {
            $form_data['success'] = false;
            $form_data['errors']  = $errors;
        }
        else {
            $performerId = $this->model->addPerformer($_POST['email'], $_POST['name'], $_POST['mobile'], $_POST['description']);
            $performer = $this->arrayCastRecursive($this->model->selectPerformerWithId($performerId));
            $event = $this->arrayCastRecursive($this->model->selectEventWithId($event_id));
            $this->model->addPerformerToEvent($event['id'], $performer['id'], $_POST['minimal_tax']);

            $form_data['success'] = true;
            $form_data['message'] = 'You are registered as a performer for the event successfully!';
        }

        echo json_encode($form_data);
    }

}
