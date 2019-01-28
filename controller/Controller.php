<?php
// Namespace creation
namespace P4\Projet\Controller;
// Namespaces used by the Controller
use \P4\Projet\Model\LoginManager;
// Class used and required for the Controller
require_once('model/LoginManager.php');

class Controller
{
	/* @var $userName String */
	public $userName = "";
	public $userRole = "";

    /* Constructor method call automatically when new object created.
    -> This method check if a $_SESSION['userId'] is present and return user's infos in instances*/
    public function __construct()
    {
        if (isset($_SESSION['userId'])) {
            $loginManager   = new LoginManager();
            $user           = $loginManager->getUserById($_SESSION['userId']);
            $this->userName = $user['user_name'];
            $this->userRole = $user['user_role'];
        }
    }
    /**
     * Add notification flash message in Session
     * @param string $message
     * @param string $type
     */
    public function setFlash($message, $type)
    {
        $_SESSION['flash'] = array(
            'message' => $message,
            'type'    => $type
        );
    }
    
    /**
     * Display Session Flash message with strings parameters & Destroy Session
     */
    public function flash()
    {
        if (isset($_SESSION['flash'])) {
		?>
           <div id="alert" class="alert alert-<?php
            echo $_SESSION['flash']['type'];
			?>">
                <a class="close">x</a>
            <?php
            echo $_SESSION['flash']['message'];
			?>
           </div>
            <?php
            unset($_SESSION['flash']);
        }
    }
}