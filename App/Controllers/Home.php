<?php

namespace App\Controllers;

use \Core\View;

/**
 * Home controller
 * 
 * PHP version 7.4.20
 */

class Home extends \Core\Controller
{
    /**
     * Before filter
     *
     * @return void
     */
    protected function before()
    {
        // echo "(before) ";
        //return false;
    }

    /**
     * After filter
     *
     * @return void
     */
    protected function after()
    {
        // echo " (after)";
    }

    /**
     * Show the index page
     * 
     * @return void
     */
    public function indexAction()
    {
        // echo 'Hello from the index action in th Home controller!';
        View::renderTemplate('/Home/index.html.twig', [
            'name' => 'Ashraf Hafiz',
            'colors' => ['green', 'red', 'yello'],
        ]);
    }
}
