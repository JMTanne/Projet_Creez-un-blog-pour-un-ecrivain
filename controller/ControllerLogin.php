<?php
// Namespace creation
namespace P4\Projet\Controller;
// Namespaces used by the Controller
use \P4\Projet\Model\PostManager;
use \P4\Projet\Model\CommentManager;
use \P4\Projet\Model\LoginManager;
// Class used and required for the Controller
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/LoginManager.php');
require_once('controller/Controller.php');

class ControllerLogin extends Controller
{
    /**
     * Login page function : redirection to Authent View
     */
    public function loginPage()
    {
        require('view/authentView.php');
    }
    
    /**
     * Check Login infos function : Verify if $username + $password are presents on table & Display contextual message
     * @param string $username
     * @param string $password
     */
    public function checkLogin($username, $password)
    {
        $loginManager = new LoginManager();
        $hashPwd = hash("md5", $password);
        $loginUser = $loginManager->getLogin($username, $hashPwd);
        
        if ($loginUser === false) {
            $this->setFlash('Attention ! Vos identifiants sont incorrects.', 'danger');
            
            require('view/authentView.php');
            
        } else {
            $this->setFlash('Vous êtes connecté !', 'success');
            
            $_SESSION['userId'] = $loginUser['id'];
            
            header('Location: index.php?action=lastPost');
        }
    }
    
    /**
     * logout function : destry session & redirection to home page
     */
    public function logout()
    {
        session_destroy();
        header('Location: index.php?action=lastPost');
    }
    
    /**
     * Registration page function : redirection to Registration View
     */
    public function registrationView()
    {
        require('view/registrationView.php');
    }
    
    /**
     * Registration function : Verify if 'username' already presents in database.
     * If is not the case, check if 'password' and 'confirm password' are the same.
     * @param int $regUsername
     * @param string $regPwd
     * @param string $regConfirmPwd
     */
    public function registration($regUsername, $regPwd, $regConfirmPwd)
    {
        $loginManager = new LoginManager();
        $isUserExist  = $loginManager->isUserExist($regUsername);
        
        if ($isUserExist) { // $regUsername > 0 = $isUserExist condition is "true"
            $this->setFlash('Votre pseudo est déjà utilisé, veuillez en choisir un nouveau.', 'danger');
            
            header('Location: index.php?action=registrationView');
            
        } else if ($this->checkRegPasswords($regPwd, $regConfirmPwd)) {
            /* Use Private function "checkRegPasswords"
             * Check if password and confirm password are uniforms 
             * If the condition respected, Registration OK and Login with 'userId'
             */
            $hashPwd = hash("md5", $regPwd);
            $loginManager = new LoginManager();
            $newReg = $loginManager->newRegistration($regUsername, $hashPwd);

            session_start();
            $_SESSION['userId'] = $newReg['id'];
            $this->userName     = $newReg['user_name'];
            $this->userRole     = $newReg['user_role'];
            
            $this->setFlash('Bravo ! Vous êtes enregistrés !', 'success');
            
            header('Location: index.php?action=lastPost');
            
        } else { // Error message displayed if password and confirm password are not uniforms & redirection to Registration view
            $this->setFlash('Vos mots de passes ne sont pas identiques.', 'danger');
            
            header('Location: index.php?action=registrationView');
        }
        
    }
    
    /**
     * Check passwords registration function validity
     * @param string $pwd
     * @param string $confirmPwd
     * @return boolean 
     */
    private function checkRegPasswords($pwd, $confirmPwd)
    {
        return $pwd == $confirmPwd;
    }
}