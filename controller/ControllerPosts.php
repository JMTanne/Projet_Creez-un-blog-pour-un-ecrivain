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

    public function addPost()
    {
        require('view/BO_addPostView.php');
    }
    
    public function newPost($postId, $postTitle, $postContent)
    {
    
    $postManager = new PostManager();
    $newPost = $postManager->postChapter($postId, $postTitle, $postContent);

    $session = new Session();
    $session->setFlash('Votre nouveau Chapitre a été ajouté au site !', 'success');

    header('Location: index.php?action=BO_addPost');
    
    }

    public function BO_allPosts()
    {
        $postManager = new PostManager();
        $posts = $postManager->BO_getPosts();

        require('view/BO_listPostsView.php');
    }

    public function BO_post($postId)
    {
        $postManager = new PostManager();
        $post = $postManager->BO_getPost($postId);

        require('view/BO_postView.php');
    }
}
