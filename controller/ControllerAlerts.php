<?php
// Namespace creation
namespace P4\Projet\Controller;

// namespaces used by the Controller
use \P4\Projet\Model\PostManager;
use \P4\Projet\Model\CommentManager;
use \P4\Projet\Model\AlertManager;

// files used and required for the Controller
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/AlertManager.php');
require_once('controller/Controller.php');

class ControllerAlerts extends Controller
{
    public function alert($commentId, $postId)
    {
        $alertManager = new AlertManager();
        $newAlert = $alertManager->alertComment($commentId);
        
        $this->setFlash('Le commentaire a été signalé. Merci!', 'info');

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

        $this->setFlash('Le signalement a été supprimé avec succès !', 'success');

        header('Location: index.php?action=BO_welcome');
    }

    public function confirmAlert($commentId)
    {
        $alertManager = new AlertManager();
        $deleteComment = $alertManager->removeComment($commentId);

        $this->setFlash('Le commentaire signalé a été supprimé avec succès !', 'success');

        header('Location: index.php?action=BO_welcome');
    }

    public function deleteComment($commentId)
    {
        $alertManager = new AlertManager();
        $deleteComment = $alertManager->removeComment($commentId);

        $this->setFlash('Le commentaire a été supprimé avec succès !', 'success');

        header('Location: index.php?action=BO_welcome');
    }
}