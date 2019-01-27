<?php
// Namespace creation
namespace P4\Projet\Model;
// Class used and required for the Model
require_once("model/Manager.php");

class CommentManager extends Manager
{
    /**
     * Get all comments of a Post
     * @param int $postId
     *
     * @return array $comments
     */
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, post_id, comment_author, comment_alert, comment_content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM comments WHERE post_id = ? ORDER BY creation_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    /**
     * Post new comment in database/comments table
     * @param int $postId
     * @param string $commentAuthor
     * @param string $commentContent
     *
     * @return array $newComment
     */
    public function postComment($postId, $commentAuthor, $commentContent)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, comment_author, comment_content, comment_alert, creation_date) VALUES(?, ?, ?, 0, NOW())');
        $comments->execute(array($postId, $commentAuthor, $commentContent));
        $newComment = $comments->fetch();
        
        return $newComment;
    }
    
    /**
     * Delete comment on comments table
     * @param int $commentId
     *
     * @return delete $newComment
     */
    public function removeComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id = ?');
        $req->execute(array($commentId));
        $delete = $req->fetch();

        return $delete;
    }

}