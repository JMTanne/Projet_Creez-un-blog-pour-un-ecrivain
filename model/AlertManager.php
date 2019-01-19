<?php
// Création d'un namespace
namespace P4\Projet\Model;

// Chargement des classes
require_once("model/Manager.php");

class AlertManager extends Manager
{
    public function alertComment($commentId)
    {

        $db = $this->dbConnect();
        $alert = $db->prepare('UPDATE comments SET comment_alert = 1 WHERE id = ?');

        $alert->execute(array($commentId));
        $newAlert = $alert->fetch();
        
        return $newAlert;
    }

    public function getAlerts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, post_id, comment_author, comment_content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM comments WHERE comment_alert = 1 ORDER BY creation_date DESC');

        return $req;
    }

    public function removeAlert($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET comment_alert = 0 WHERE id = ?');
        $req->execute(array($commentId));
        $deleteAlert = $req->fetch();

        return $deleteAlert;
    }

    public function removeComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id = ?');
        $req->execute(array($commentId));
        $deleteComment = $req->fetch();

        return $deleteComment;
    }
}