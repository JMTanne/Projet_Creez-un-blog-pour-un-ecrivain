<?php
session_start();
// Création d'un namespace
use \P4\Projet\Controller\ControllerPosts;
use \P4\Projet\Controller\ControllerComments;
use \P4\Projet\Controller\ControllerAlerts;

// Chargement des classes
require('controller/ControllerPosts.php');
require('controller/ControllerComments.php');
require('controller/ControllerAlerts.php');

// Création d'un objet "Controller"
$initControllerPosts = new ControllerPosts;
$initControllerComments = new ControllerComments;
$initControllerAlerts = new ControllerAlerts;

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
                $initControllerAlerts->alert($_GET['commentId'], $_GET['commentPostId'], $_GET['commentAuthor'], $_GET['commentContent'], $_GET['postId']);
                break;
            case "commentDeleted":
                $initControllerComments->deleteComment($_GET['id'], $_GET['postId']);
                break;
            case "registrationLogin":
                echo "Redirection vers la page 'login";
                break;

            // Ajout des pages "Back Office":
            case "BO_welcome":
                $initControllerAlerts->allAlerts();
                break;
            case "BO_deleteAlert":
                $initControllerAlerts->deleteAlert($_GET['alertId']);
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
                $initControllerPosts->BO_post($_GET['id']);
                break;
            case "BO_modifPost":
                echo "Redirection vers la page 'BO_modifPost Back Office'";
                break;
            case "BO_deletePost":
                echo "Redirection vers la page 'BO_modifPost Back Office'";
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
