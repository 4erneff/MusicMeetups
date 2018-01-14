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

    public function arrayCastRecursive($array)
    {
        if (is_array($array)) {
            foreach ($array as $key => $value) {
                if (is_array($value)) {
                    $array[$key] = $this->arrayCastRecursive($value);
                }
                if ($value instanceof stdClass) {
                    $array[$key] = $this->arrayCastRecursive((array)$value);
                }
            }
        }
        if ($array instanceof stdClass) {
            return $this->arrayCastRecursive((array)$array);
        }
        return $array;
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
