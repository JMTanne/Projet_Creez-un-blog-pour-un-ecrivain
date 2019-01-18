<?php
// Création d'un namespace
namespace P4\Projet\Model;

class Manager
{
	protected function dbConnect()
	{
		$db = new \PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
        return $db;
        /*$db = new \PDO('mysql:host=db769942789.hosting-data.io;dbname=db769942789;charset=utf8', 'dbo769942789', 'Azertyu1/');*/
	}
}