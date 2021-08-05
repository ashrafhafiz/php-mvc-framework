<?php

namespace Core;

use App\Config;
use PDO;

/**
 * Base Model class
 * 
 * PHP version 7.4.20
 */

abstract class Model
{
    /**
     * Get the PDO database connection
     * 
     * @return mixed
     */
    protected static function connectDB()
    {
        static $db = null;

        if (null === $db) {
            // $host = 'localhost';
            // $dbname = 'php_mvc_framework';
            // $username = 'root';
            // $password = 'example';

            try {
                // $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

                $dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8mb4';
                $db = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $db;

            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

}