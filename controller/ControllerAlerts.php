<?php
// Namespace creation
namespace P4\Projet\Controller;
// Namespaces used by the Controller
use \P4\Projet\Model\PostManager;
use \P4\Projet\Model\CommentManager;
use \P4\Projet\Model\AlertManager;
// Class used and required for the Controller
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/AlertManager.php');
require_once('controller/Controller.php');

class ControllerAlerts extends Controller
{
    /**
     * Alert Comment function : call alertComment Model function & display contextual message flash
     * @param int $commentId
     * @param int $postId
     */
    public function alert($commentId, $postId)
    {
        $alertManager = new AlertManager();
        $newAlert     = $alertManager->alertComment($commentId);
        
        $this->setFlash('Le commentaire a été signalé. Merci!', 'info');
        
        header('Location: index.php?action=comments&id=' . $postId);
    }
    
    /**
     * allAlerts function : call getAlerts Model function on Bo_welcomeView
     */
    public function allAlerts()
    {
        $alertManager = new AlertManager();
        $alerts       = $alertManager->getAlerts();
        
        require('view/BO_welcomeView.php');
    }
    
    /**
     * Delete Alert function : Remove alert & display contextual message flash
     * @param int $alertId
     */
    public function deleteAlert($alertId)
    {
        $alertManager = new AlertManager();
        $deleteAlert  = $alertManager->removeAlert($alertId);
        
        $this->setFlash('Le signalement a été supprimé avec succès !', 'success');
        
        header('Location: index.php?action=BO_welcome');
    }
    
    /**
     * Confirm Alert function : Remove Alert, Delete alerted comment & display contextual message flash
     * @param int $commentId
     */
    public function confirmAlert($commentId)
    {
        $alertManager  = new AlertManager();
        $deleteComment = $alertManager->removeComment($commentId);
        
        $this->setFlash('Le commentaire signalé a été supprimé avec succès !', 'success');
        
        header('Location: index.php?action=BO_welcome');
    }
    
    /**
     * Delete Comment function : Delete comment (Only Admin & Modo can use it) & display contextual message flash
     * @param int $commentId
     */
    public function deleteComment($commentId)
    {
        $alertManager  = new AlertManager();
        $deleteComment = $alertManager->removeComment($commentId);
        
        $this->setFlash('Le commentaire a été supprimé avec succès !', 'success');
        
        header('Location: index.php?action=BO_welcome');
    }
}