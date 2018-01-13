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
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/perform/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: exampleone
     * This method handles what happens when you move to http://yourproject/home/exampleone
     * The camelCase writing is just for better readability. The method name is case-insensitive.
     */
    public function event($event_id)
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/perform/event.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: exampletwo
     * This method handles what happens when you move to http://yourproject/home/exampletwo
     * The camelCase writing is just for better readability. The method name is case-insensitive.
     */
    public function exampleTwo()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/example_two.php';
        require APP . 'view/_templates/footer.php';
    }
}
