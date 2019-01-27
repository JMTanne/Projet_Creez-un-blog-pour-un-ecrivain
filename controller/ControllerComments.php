<?php
// Namespace creation
namespace P4\Projet\Controller;
// Namespaces used by the Controller
use \P4\Projet\Model\PostManager;
use \P4\Projet\Model\CommentManager;
use \P4\Projet\Model\AlertManager;
// Files used and required for the Controller
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/AlertManager.php');
require_once('controller/Controller.php');

class ControllerComments extends Controller
{
    /**
     * Comments function : Display all comments of a Post/Chapter
     * @param int $postId
     * @param array $comments
     */
    public function comments($postId, $comments)
    {
        $postManager = new PostManager();
        $post        = $postManager->getPost($postId);
        
        $commentManager = new CommentManager();
        $comments       = $commentManager->getComments($comments);
        
        require('view/commentsView.php');
    }
    
    /**
     * New Comment function : Add new comment to a Post/chapter & Display contextual message flash
     * @param int $postId
     * @param string $commentAuthor
     * @param string $commentContent
     */
    public function newComment($postId, $commentAuthor, $commentContent)
    {
        $commentManager = new CommentManager();
        $newComment     = $commentManager->postComment($postId, $commentAuthor, $commentContent);
        
        $this->setFlash('Votre commentaire a été ajouté !', 'success');
        
        header('Location: index.php?action=comments&id=' . $postId);
    }
    
    /**
     * Delete Comment function : Delete comment (Only Admin & Modo can use it) & display contextual message flash
     * @param int $commentId
     * @param int $postId
     */
    public function deleteComment($commentId, $postId)
    {
        $commentManager = new CommentManager();
        $delete         = $commentManager->removeComment($commentId);
        
        $this->setFlash('Le commentaire a été supprimé avec succès !', 'success');
        
        header('Location: index.php?action=comments&id=' . $postId);
    }
    
    /**
     * Delete Comment function (Back office) : Delete comment (Only Admin) & display contextual message flash
     * @param int $commentId
     * @param int $postId
     */
    public function BO_deleteComment($commentId, $postId)
    {
        $commentManager = new CommentManager();
        $delete         = $commentManager->removeComment($commentId);
        
        $this->setFlash('Le commentaire a été supprimé avec succès !', 'success');
        
        header('Location: index.php?action=BO_allComments&id=' . $postId);
    }
    
    /**
     * Delete Comment function (Back office) : Display all comments of a Post/Chapter
     * @param int $postId
     * @param array $comments
     */
    public function BO_comments($postId, $comments)
    {
        $postManager = new PostManager();
        $post        = $postManager->getPost($postId);
        
        $commentManager = new CommentManager();
        $comments       = $commentManager->getComments($comments);
        
        require('view/BO_commentsView.php');
    }
}