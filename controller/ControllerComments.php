<?php
// Création d'un namespace
namespace P4\Projet\Controller;

// Appel des namespaces
use \P4\Projet\Model\PostManager;
use \P4\Projet\Model\CommentManager;
use \P4\Projet\Controller\Session;

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('controller/ControllerSessionClass.php');

class ControllerComments
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

        $session = new Session();
        $session->setFlash('Votre commentaire a été ajouté !', 'success');
        
        if ($newComment === false) {
            throw new \Exception('Impossible d\'ajouter le commentaire !'); // \Exception : mettre un "\" permet d'utiliser le namespace PHP
        }
        else {
            header('Location: index.php?action=comments&id=' . $postId);
        } 
    }

    public function deleteComment($commentId, $postId)
    {
        $commentManager = new CommentManager();
        $delete = $commentManager->removeComment($commentId);

        $session = new Session();
        $session->setFlash('Le commentaire a été supprimé avec succès !', 'success');

        header('Location: index.php?action=comments&id=' . $postId);

    }
}