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
            $_SESSION['userId'] = $loginUser['id'];

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

    public function registrationView()
    {
        require('view/registrationView.php');
    }

    public function registration($regUsername, $regPwd, $regConfirmPwd)
    {
        $loginManager = new LoginManager();
        $isUserExist = $loginManager->isUserExist($regUsername);

        if ($isUserExist) {
            $session = new Session();
            $session->setFlash('Votre pseudo est déjà utilisé, veuillez en choisir un nouveau.', 'danger'); 

            header('Location: index.php?action=registrationView');
        
        } else if ($this->checkRegPasswords($regPwd, $regConfirmPwd)){
            
            $loginManager = new LoginManager();
            $newReg = $loginManager->newRegistration($regUsername, $regPwd);

            session_start();
            $_SESSION['username'] = $regUsername;
            $_SESSION['role'] = $newReg['user_role'];

            $session = new Session();
            $session->setFlash('Bravo ! Vous êtes enregistrés !', 'success'); 

            header('Location: index.php?action=lastPost');
        } else {

            $session = new Session();
            $session->setFlash('Vos mots de passes ne sont pas identiques.', 'danger'); 

            header('Location: index.php?action=registrationView');
        }

    }

    private function checkRegPasswords($pwd, $confirmPwd)
    {
        return $pwd == $confirmPwd; //return boolean
    }
}