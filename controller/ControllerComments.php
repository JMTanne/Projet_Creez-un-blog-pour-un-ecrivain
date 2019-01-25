<?php
// Namespace creation
namespace P4\Projet\Controller;

// namespaces used by the Controller
use \P4\Projet\Model\PostManager;
use \P4\Projet\Model\CommentManager;
use \P4\Projet\Model\AlertManager;

// files used and required for the Controller
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/AlertManager.php');
require_once('controller/Controller.php');

class ControllerComments extends Controller
{
    public function comments($postId, $comments)
    {
        $postManager = new PostManager();
        $post = $postManager->getPost($postId);

        $commentManager = new CommentManager();
        $comments = $commentManager->getComments($comments);

        require('view/commentsView.php');
    }

    public function newComment($postId, $commentAuthor, $commentContent)
    {
    	$commentManager = new CommentManager();
        $newComment = $commentManager->postComment($postId, $commentAuthor, $commentContent);

        $this->setFlash('Votre commentaire a été ajouté !', 'success');
        
        header('Location: index.php?action=comments&id=' . $postId);

    }

    public function deleteComment($commentId, $postId)
    {
        $commentManager = new CommentManager();
        $delete = $commentManager->removeComment($commentId);

        $this->setFlash('Le commentaire a été supprimé avec succès !', 'success');

        header('Location: index.php?action=comments&id=' . $postId);
    }

    public function BO_deleteComment($commentId, $postId)
    {
        $commentManager = new CommentManager();
        $delete = $commentManager->removeComment($commentId);

        $this->setFlash('Le commentaire a été supprimé avec succès !', 'success');
        
        header('Location: index.php?action=BO_allComments&id=' . $postId);
    }

    public function BO_comments($postId, $comments)
    {
        $postManager = new PostManager();
        $post = $postManager->getPost($postId);

        $commentManager = new CommentManager();
        $comments = $commentManager->getComments($comments);

        require('view/BO_commentsView.php');
    }
}