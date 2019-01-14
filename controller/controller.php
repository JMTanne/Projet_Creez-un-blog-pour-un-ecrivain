<?php
// Appel des namespaces
use \P4\Projet\Model\PostManager;

// Chargement des classes
require_once('model/PostManager.php');

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