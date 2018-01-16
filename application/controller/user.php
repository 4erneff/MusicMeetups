<?php

/**
 * Class User
 */
class User extends Controller
{
    /**
     * PAGE: login
     * This method handles what happens when you move to http://MusicMeetups/user/login
     */
    public function login($error = "")
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/user/login.php';
        require APP . 'view/_templates/footer.php';
    }

    public function register()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/user/register.php';
        require APP . 'view/_templates/footer.php';
    }

    public function signin()
    {
        $user = $this->arrayCastRecursive($this->model->selectUserByEmailAndPassword($_POST['email'], $_POST['password']));
        if ($user) {
            $_SESSION['user'] = $user;
            header('Location: ' . URL . 'host', true, $permanent ? 301 : 302);
            exit();
        } else {
            header('Location: ' . URL . 'user/login/Wrong.email.or.password', true, $permanent ? 301 : 302);
            exit();
        }
    }

    public function signout()
    {
        $_SESSION['user'] = NULL;
        header('Location: ' . URL, true, $permanent ? 301 : 302);
        exit();
    }

    public function createUser()
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

        if (empty($_POST['password'])) {
            $errors['password'] = 'Password is required';
        }

        if ((!empty($_POST['password']) && $_POST['password_re'] != $_POST['password'])) {
            $errors['password_re'] = 'The two passwords do not match';
        }
        
        if (empty($_POST['mobile'])) {
            $errors['mobile'] = 'Please enter your mobile number';
        }

        if (!empty($errors)) {
            $form_data['success'] = false;
            $form_data['errors']  = $errors;
        }
        else {
            $this->model->addUser($_POST['email'], $_POST['name'], $_POST['mobile'],  $_POST['password']);
            $form_data['success'] = true;
            $form_data['message'] = 'You registered successfully!';
        }

        echo json_encode($form_data);
    }
    
}
