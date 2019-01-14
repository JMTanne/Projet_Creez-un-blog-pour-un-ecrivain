<?php
// Création d'un namespace
namespace P4\Projet\Model;

// Chargement des classes
require_once("model/Manager.php");

class PostManager extends Manager
{
    public function getLastPost()
    {
        $db = $this->dbConnect();
        $lastPost = $db->query('SELECT id, chapter_id, post_title, post_content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 1');

        return $lastPost;
    }

    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, chapter_id, post_title, post_content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 10');

        return $req;
    }
}