<?php
// Namespace creation
namespace P4\Projet\Controller;

// namespaces used by the Controller
use \P4\Projet\Model\PostManager;
use \P4\Projet\Model\CommentManager;
use \P4\Projet\Model\LoginManager;

// files used and required for the Controller
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/LoginManager.php');
require_once('controller/Controller.php');

class ControllerLogin extends Controller
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
    		$this->setFlash('Attention ! Vos identifiants sont incorrects.', 'danger');

			require('view/authentView.php');

		} else {
    		$this->setFlash('Vous êtes connecté !', 'success');
    		
            $_SESSION['userId'] = $loginUser['id'];

			header('Location: index.php?action=lastPost');
		}
    }

    public function logout()
    {
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
            $this->setFlash('Votre pseudo est déjà utilisé, veuillez en choisir un nouveau.', 'danger'); 

            header('Location: index.php?action=registrationView');
        
        } else if ($this->checkRegPasswords($regPwd, $regConfirmPwd)){
            
            $loginManager = new LoginManager();
            $newReg = $loginManager->newRegistration($regUsername, $regPwd);

            session_start();
            $_SESSION['userId'] = $newReg['id'];
            $this->userName = $newReg['user_name']; 
            $this->userRole = $newReg['user_role'];

            $this->setFlash('Bravo ! Vous êtes enregistrés !', 'success'); 

            header('Location: index.php?action=lastPost');
        } else {

            $this->setFlash('Vos mots de passes ne sont pas identiques.', 'danger'); 

            header('Location: index.php?action=registrationView');
        }

    }

    private function checkRegPasswords($pwd, $confirmPwd)
    {
        return $pwd == $confirmPwd; //return boolean
    }
}