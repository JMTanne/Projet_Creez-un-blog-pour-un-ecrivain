<?php
// Appel des namespaces
use \P4\Projet\Model\PostManager;
use \P4\Projet\Model\CommentManager;

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function lastPost()
{
    $postManager = new PostManager();
    $lastChapter = $postManager->getLastPost();

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
    /*$commentManager = new CommentManager();*/

    $post = $postManager->getPost($_GET['id']);
    /*$comments = $commentManager->getComments($_GET['id']);*/

    require('view/postView.php');
}

function comments()
{
    $postManager = new PostManager();
    $post = $postManager->getPost($_GET['id']);

    $commentManager = new CommentManager();
    $comments = $commentManager->getComments($_GET['id']);

    require('view/commentsView.php');
}