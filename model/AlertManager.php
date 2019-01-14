<?php
// Création d'un namespace
namespace P4\Projet\Model;

// Chargement des classes
require_once("model/Manager.php");

class AlertManager extends Manager
{
    public function alertComment($commentId, $commentPostId, $commentAuthor, $commentContent)
    {
        $db = $this->dbConnect();
        $alert = $db->prepare('INSERT INTO alerts(alert_commentId, alert_postId, alert_commentAuthor, alert_commentContent, creation_date) VALUES(?, ?, ?, ?, NOW())');

        $alert->execute(array($commentId, $commentPostId, $commentAuthor, $commentContent));
        $newAlert = $alert->fetch();
        return $newAlert;
    }

    public function getAlerts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, alert_commentId, alert_postId, alert_commentAuthor, alert_commentContent, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM alerts ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    public function removeAlert($alertId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM alerts WHERE id = ?');
        $req->execute(array($alertId));
        $delete = $req->fetch();

        return $delete;
    }
}