<?php
// Namespace creation
namespace P4\Projet\Model;
// Class used and required for the Model
require_once("model/Manager.php");

class AlertManager extends Manager
{
    /**
     * Update comments table line when comment is "alerted"
     * @param int $commentId
     *
     * @return array $newAlert
     */
    public function alertComment($commentId)
    {
        $db    = $this->dbConnect();
        $alert = $db->prepare('UPDATE comments SET comment_alert = 1 WHERE id = ?');
        
        $alert->execute(array(
            $commentId
        ));
        $newAlert = $alert->fetch();
        
        return $newAlert;
    }
    
    /**
     * Get all alerted comments
     * @return array $req
     */
    public function getAlerts()
    {
        $db  = $this->dbConnect();
        $req = $db->query('SELECT id, post_id, comment_author, comment_content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM comments WHERE comment_alert = 1 ORDER BY creation_date DESC');
        
        return $req;
    }
    
    /**
     * Remove an Alert : uptade comment_alert int to '0'
     * @param int $commentId
     *
     * @return array $deleteAlert
     */
    public function removeAlert($commentId)
    {
        $db  = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET comment_alert = 0 WHERE id = ?');
        $req->execute(array(
            $commentId
        ));
        $deleteAlert = $req->fetch();
        
        return $deleteAlert;
    }
    
    /**
     * Remove a Comment : Delete a comment id
     * @param int $commentId
     *
     * @return array $deleteComment
     */
    public function removeComment($commentId)
    {
        $db  = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id = ?');
        $req->execute(array(
            $commentId
        ));
        $deleteComment = $req->fetch();
        
        return $deleteComment;
    }
}