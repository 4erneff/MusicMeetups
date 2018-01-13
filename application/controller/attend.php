<?php

/**
 * Class Attend
 */
class Attend extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://MusicMeetups/perform/index
     */
    public function index()
    {
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
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/attend/event.php';
        require APP . 'view/_templates/footer.php';
    }
}
