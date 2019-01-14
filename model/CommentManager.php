<?php
// Création d'un namespace
namespace P4\Projet\Model;

// Chargement des classes
require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, post_id, comment_author, comment_content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM comments WHERE post_id = ? ORDER BY creation_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $commentAuthor, $commentContent)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, comment_author, comment_content, creation_date) VALUES(?, ?, ?, NOW())');
        $newComment = $comments->execute(array($postId, $commentAuthor, $commentContent));

        return $newComment;
    }

    // Fonction permettant la suppression du commentaire
    public function removeComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id = ?');
        $req->execute(array($commentId));
        $delete = $req->fetch();

        return $delete;
    }
}