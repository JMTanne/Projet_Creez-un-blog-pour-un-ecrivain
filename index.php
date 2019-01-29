<?php
session_start();
// Namespaces used by the Controller
use \P4\Projet\Controller\ControllerPosts;
use \P4\Projet\Controller\ControllerComments;
use \P4\Projet\Controller\ControllerAlerts;
use \P4\Projet\Controller\ControllerLogin;
// Class used and required for the Controller
require('controller/ControllerPosts.php');
require('controller/ControllerComments.php');
require('controller/ControllerAlerts.php');
require('controller/ControllerLogin.php');
// New Objects instances
$initControllerPosts = new ControllerPosts;
$initControllerComments = new ControllerComments;
$initControllerAlerts = new ControllerAlerts;
$initControllerLogin = new ControllerLogin;

try {
    // Rooter init
    if (isset($_GET['action'])){
        switch ($_GET['action']) {
            // All FrontEnd Actions cases :
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
                $initControllerComments->newComment($_GET['id'], /*$_POST['comment_author'],*/ $_POST['comment_content']);
                break;
            case "alertComment":
                $initControllerAlerts->alert($_GET['commentId'], $_GET['postId']);
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
            case "registrationView":
                $initControllerLogin->registrationView();
                break;
            case "registration":
                $initControllerLogin->registration($_POST['regUsername'], $_POST['regPwd'], $_POST['regConfirmPwd']);
                break;     

            // All BackEnd Actions cases :
            case "BO_welcome":
                $initControllerAlerts->allAlerts();
                break;
            case "BO_deleteAlert": // valid comment
                $initControllerAlerts->deleteAlert($_GET['commentId']);
                break;
            case "BO_validAlert": // delete comment
                $initControllerAlerts->confirmAlert($_GET['commentId']);
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
                $initControllerPosts->BO_postModified($_GET['id'], $_POST['postTitle'], $_POST['postContent']);
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