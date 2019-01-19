<?php
// Création d'un namespace
namespace P4\Projet\Controller;

// Appel des namespaces
use \P4\Projet\Model\PostManager;
use \P4\Projet\Model\CommentManager;
use \P4\Projet\Model\AlertManager;
use \P4\Projet\Controller\Session;

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/AlertManager.php');
require_once('controller/ControllerSessionClass.php');

class ControllerAlerts
{
    public function alert($commentId, $postId)
    {
        $alertManager = new AlertManager();
        $newAlert = $alertManager->alertComment($commentId);
        
        $session = new Session();
        $session->setFlash('Le commentaire a été signalé. Merci!', 'info');

        header('Location: index.php?action=comments&id=' . $postId);
    }

    public function allAlerts()
    {
        $alertManager = new AlertManager();
        $alerts = $alertManager->getAlerts();

        require('view/BO_welcomeView.php');
    }

    public function deleteAlert($alertId)
    {
        $alertManager = new AlertManager();
        $deleteAlert = $alertManager->removeAlert($alertId);

        $session = new Session();
        $session->setFlash('Le signalement a été supprimé avec succès !', 'success');

        header('Location: index.php?action=BO_welcome');
    }

    public function confirmAlert($commentId)
    {
        $alertManager = new AlertManager();
        $deleteComment = $alertManager->removeComment($commentId);

        $session = new Session();
        $session->setFlash('Le commentaire signalé a été supprimé avec succès !', 'success');

        header('Location: index.php?action=BO_welcome');
    }

    public function deleteComment($commentId)
    {
        $alertManager = new AlertManager();
        $deleteComment = $alertManager->removeComment($commentId);

        $session = new Session();
        $session->setFlash('Le commentaire a été supprimé avec succès !', 'success');

        header('Location: index.php?action=BO_welcome');
    }
}