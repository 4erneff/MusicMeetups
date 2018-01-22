<?php

/**
 * Class Problem
 *
 */
class Problem extends Controller
{
    /**
     * PAGE: index
     * This method handles the error page that will be shown when a page is not found
     */
    public function index()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/problem/index.php';
        require APP . 'view/_templates/footer.php';
    }
}
