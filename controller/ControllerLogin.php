<?php
// Création d'un namespace
namespace P4\Projet\Controller;

// Appel des namespaces
use \P4\Projet\Model\PostManager;
use \P4\Projet\Model\CommentManager;
use \P4\Projet\Model\LoginManager;
use \P4\Projet\Controller\Session;

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/LoginManager.php');
require_once('controller/ControllerSessionClass.php');

class ControllerLogin
{
	public function loginPage()
    {
        require('view/authentView.php');
    }

    public function checkLogin($username, $password)
    {

    	$loginManager = new LoginManager();
        $loginUser = $loginManager->getLogin($username, $password);
		
		if ($loginUser === false) {
			$session = new Session();
    		$session->setFlash('Attention ! Vos identifiants sont incorrects.', 'danger');

			require('view/authentView.php');

		} else {
			$session = new Session();
    		$session->setFlash('Vous êtes connecté !', 'success');
    		
    		session_start();
        	$_SESSION['username'] = $username;
        	$_SESSION['role'] = $loginUser['user_role'];

			header('Location: index.php?action=lastPost');
		}
    }

    public function logout()
    {
    	$session = new Session();
    	$session->setFlash('Vous êtes déconnecté !', 'info');

    	session_destroy();

        header('Location: index.php?action=lastPost');
    }
}