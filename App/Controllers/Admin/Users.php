<?php

namespace App\Controllers\Admin;

/**
 * Users Admin controller
 * 
 * PHP version 7.4.20
 */

class Users extends \Core\Controller
{
    /**
     * Before filter
     * 
     * @return void
     */
    protected function before()
    {
        echo "(before)";
    }

    /**
     * After filter
     * 
     * @return void
     */
    protected function after()
    {
        echo "(after)";
    }

    /**
     * Show index page
     * 
     * @return void
     */
    public function indexAction()
    {
        echo 'User admin index';
    }
}
