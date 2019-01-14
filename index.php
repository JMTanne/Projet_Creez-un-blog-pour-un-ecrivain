<?php
session_start();
// Création d'un namespace
use \P4\Projet\Controller\ControllerPosts;
use \P4\Projet\Controller\ControllerComments;

// Chargement des classes
require('controller/ControllerPosts.php');
require('controller/ControllerComments.php');

// Création d'un objet "Controller"
$initControllerPosts = new ControllerPosts;
$initControllerComments = new ControllerComments;

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
                $initControllerComments->alertComment($_GET['id'], $_POST['comment_author'], $_POST['comment_content']);
                break;
            case "commentDeleted":
                $initControllerComments->deleteComment($_GET['id'], $_GET['postId']);
                break;
            case "registrationLogin":
                echo "Redirection vers la page 'login";
                break;

            // Ajout des pages "Back Office":
            case "BO_welcome":
                echo "Redirection vers la page 'welcome Back Office'";
                break;
            case "BO_allPosts":
                echo "Redirection vers la page 'allPosts Back Office'";
                break;
            case "BO_addPost":
                echo "Redirection vers la page 'addPost Back Office'";
                break;
            case "BO_modifPost":
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
