<?php

// Création d'un namespace
namespace P4\Projet\Controller;

// Appel des namespaces
use \P4\Projet\Model\PostManager;
use \P4\Projet\Model\CommentManager;

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

class ControllerPosts
{
    public function lastPost()
    {
        $postManager = new PostManager();
        $lastChapter = $postManager->getLastPost();

        require('view/welcomeView.php');
    }

    public function allPosts()
    {
        $postManager = new PostManager();
        $posts = $postManager->getPosts();

        require('view/listPostsView.php');
    }

    public function post($postId)
    {
        $postManager = new PostManager();
        $post = $postManager->getPost($postId);

        require('view/postView.php');
    }
}