<?php
// Namespace creation
namespace P4\Projet\Controller;

// namespaces used by the Controller
use \P4\Projet\Model\LoginManager;

// files used and required for the Controller
require_once('model/LoginManager.php');

class Controller{
	public function __construct(){
		if(isset($_SESSION['userId'])){
			$loginManager = new LoginManager();
        	$user = $loginManager->getUserById($_SESSION['userId']);
        	$this->userName = $user['user_name']; 
        	$this->userRole = $user['user_role'];
		} else {
			$this->userName = "";
			$this->userRole = "";
		}
	}
	/**
    * Add notification flash message in Session
    * @param string $message
    * @param Request $type
    */
	public function setFlash($message, $type){
		$_SESSION['flash'] = array(
			'message' => $message,
			'type'	  => $type 
		);
	}

	// Affiche un message si message présent en session & suppression après affichage
	public function flash(){
		if(isset($_SESSION['flash'])){
			?>
			<div id="alert" class="alert alert-<?php echo $_SESSION['flash']['type']; ?>">
				<a class="close">x</a>
			<?php echo $_SESSION['flash']['message']; ?>
			</div>
			<?php
			unset($_SESSION['flash']);
		}
	}
}