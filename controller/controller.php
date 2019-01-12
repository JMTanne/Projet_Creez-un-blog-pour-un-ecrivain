<?php
// Appel des namespaces
use \P4\Projet\Model\PostManager;
use \P4\Projet\Model\CommentManager;

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function welcome()
{
    require('view/welcomeView.php');
}

function allPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require('view/listPostsView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/postView.php');
}

function addComment($postId, $author, $comment)
{
	$commentManager = new CommentManager();
	
    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    } 
}

function comment()
{
    $commentManager = new CommentManager();
    $comment = $commentManager->getComment($_GET['id']);

    require('view/commentView.php');
}

function modifComment($comment, $commentId)
{
    $commentManager = new CommentManager();

    $newLine = $commentManager->updateComment($comment, $commentId);

    if ($newLine === false) {
        throw new Exception('Impossible de modifier le commentaire !');
    }
    else {
        header('Location: index.php?action=getComment&id=' . $commentId);
    } 
}