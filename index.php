<?php
require('controller/controller.php');

try {
    // Mise en place du routeur:
    if (isset($_GET['action'])){
        switch ($_GET['action']) {
            // Ajout des pages "Front":
            case "allPosts":
                allPosts();
                break;
            case "post":
                echo "Redirection vers la page 'post'";
                break;
            case "addComment":
                echo "Redirection vers la page 'addComment'";
                break;
            case "updateComment":
                echo "Redirection vers la page 'updateComment'";
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
            lastPost();
        }
    } else {
        lastPost();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
