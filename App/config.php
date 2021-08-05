<?php

namespace App;

/**
 * Application configuration
 * 
 * PHP version 7.4.20
 * 
 * @category App class
 * @package  PHP-MVC-Framework
 * @author   Ashraf Hafiz <ashraf.hafiz@yahoo.com>
 * @license  MIT License - http://NA
 * @link     NA
 */

class Config
{
    /**
     * Database host
     * 
     * @var string
     */
    const DB_HOST = 'localhost';

    /**
     * Database name
     * 
     * @var string
     */
    const DB_NAME = 'php_mvc_framework';

    /**
     * Database user
     * 
     * @var string
     */
    const DB_USER = 'root';

    /**
     * Database password
     * 
     * @var string
     */
    const DB_PASSWORD = 'secret';

    /**
     * Show/Hide error messages.
     * 
     * @var boolean     If false a detailed error will be wrttien to file, 
     *                  if true the error will be wrttien to browser
     */
    const SHOW_ERROR = false;
}
