<?php
// Namespace creation
namespace P4\Projet\Model;

class Manager
{
    /**
     * Protected function : access to database with PDO (PHP Data Object) method
     * @return array $db
     */
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
        /*$db = new \PDO('mysql:host=db769942789.hosting-data.io;dbname=db769942789;charset=utf8', 'dbo769942789', 'Azertyu1/');*/
        return $db;
    }
}