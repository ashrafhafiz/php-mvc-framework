<?php

namespace App\Models;

use PDO;

/**
 * Post model
 * 
 * PHP version 7.4.20
 */

class Post extends \Core\Model
{
    /**
     * Get all the posts as an associative array
     * 
     * @return array
     */
    public static function getAll()
    {
        // $host = 'localhost';
        // $dbname = 'php_mvc_framework';
        // $username = 'root';
        // $password = 'example';

        try {
            // $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
            
            $db = static::connectDB();

            $stmt = $db->query("SELECT id, title, content FROM posts ORDER BY created_at");
            
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}