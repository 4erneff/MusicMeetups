<?php

/**
 * Class Host
 */
class Host extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://MusicMeetups/host/index
     */
    public function index()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/host/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function addHost()
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

        if (empty($_POST['location'])) {
            $errors['location'] = 'Location is required';
        }

        if (empty($_POST['slots']) || (!is_numeric($_POST['slots'])) || ((int)$_POST['slots'] < 1)) {
            $errors['slots'] = 'Slots should be a positive integer';
        }

        if (empty($_POST['addInfo'])) {
            $errors['addInfo'] = 'Event description is required';
        }

        if (empty($_POST['datetime'])) {
            $errors['datetime'] = 'Date and time are required to create an event';
        }

        if (!empty($errors)) {
            $form_data['success'] = false;
            $form_data['errors']  = $errors;
        }
        else {
            $hostId = $this->model->addHost($_POST['email'], $_POST['name'], $_POST['mobile'], 
                $_POST['location'], $_POST['slots'], $_POST['addInfo']);
            $host = $this->model->selectHostWithId($hostId);
            $this->model->addEvent($host['id'], $_POST['datetime'], $_POST['slots']);
            $form_data['success'] = true;
            $form_data['message'] = 'Event was created successfully!';
        }

        echo json_encode($form_data);
    }

}
