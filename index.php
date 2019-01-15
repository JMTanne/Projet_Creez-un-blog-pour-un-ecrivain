<?php
session_start();
// Création d'un namespace
use \P4\Projet\Controller\ControllerPosts;
use \P4\Projet\Controller\ControllerComments;
use \P4\Projet\Controller\ControllerAlerts;
use \P4\Projet\Controller\ControllerLogin;

// Chargement des classes
require('controller/ControllerPosts.php');
require('controller/ControllerComments.php');
require('controller/ControllerAlerts.php');
require('controller/ControllerLogin.php');

// Création d'un objet "Controller"
$initControllerPosts = new ControllerPosts;
$initControllerComments = new ControllerComments;
$initControllerAlerts = new ControllerAlerts;
$initControllerLogin = new ControllerLogin;

try {
    // Mise en place du routeur:
    if (isset($_GET['action'])){
        switch ($_GET['action']) {
            // Ajout des pages "Front":
            case "allPosts":
                $initControllerPosts->allPosts();
                break;
            case "post":
                $initControllerPosts->post($_GET['id']);
                break;
            case "comments":
                $initControllerComments->comments($_GET['id'], $_GET['id']);
                break;
            case "addComment":
                $initControllerComments->newComment($_GET['id'], $_POST['comment_author'], $_POST['comment_content']);
                break;
            case "alertComment":
                $initControllerAlerts->alert($_GET['commentId'], $_GET['commentPostId'], $_GET['commentAuthor'], $_GET['commentContent'], $_GET['commentDate'], $_GET['postId']);
                break;
            case "commentDeleted":
                $initControllerComments->deleteComment($_GET['id'], $_GET['postId']);
                break;
            case "login":
                $initControllerLogin->loginPage();
                break;
            case "checkLogin":
                $initControllerLogin->checkLogin($_POST['username'], $_POST['password']);
                break;
            case "logout":
                $initControllerLogin->logout();
                break;

            // Ajout des pages "Back Office":
            case "BO_welcome":
                $initControllerAlerts->allAlerts();
                break;
            case "BO_deleteAlert": // valid comment
                $initControllerAlerts->deleteAlert($_GET['alertId']);
                break;
            case "BO_validAlert": // delete comment
                $initControllerAlerts->confirmAlert($_GET['commentId'], $_GET['alertId']);
                break;
            case "BO_commentDeleted":
                $initControllerComments->BO_deleteComment($_GET['id'], $_GET['postId']);
                break;
            case "BO_addPost":
                $initControllerPosts->addPost();
                break;
            case "BO_postAdded":
                $initControllerPosts->newPost($_POST['chapter_id'], $_POST['post_title'], $_POST['post_content']);
                break;
            case "BO_allPosts":
                $initControllerPosts->BO_allPosts();
                break;
            case "BO_post":
                $initControllerPosts->BO_post($_GET['id'], $_GET['id']);
                break;
            case "BO_modifPost":
                echo "Redirection vers la page 'BO_modifPost Back Office'";
                break;
            case "BO_deletePost":
                $initControllerPosts->BO_deletePost($_GET['id']);
                break;
            case "BO_allComments":
                $initControllerComments->BO_comments($_GET['id'], $_GET['id']);
                break;
            case "BO_updatePost":
                $initControllerPosts->BO_editPost($_GET['id']);
                break;
            case "BO_postUpdated":
                $initControllerPosts->BO_postModified($_GET['id'], $_POST['postContent']);
                break;
            default:
            $initControllerPosts->lastPost();
        }
    } else {
        $initControllerPosts->lastPost();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}