<?php
// Création d'un namespace
namespace P4\Projet\Model;

// Chargement des classes
require_once("model/Manager.php");

class LoginManager extends Manager
{
	public function getLogin($username, $password)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, user_name, user_password, user_role FROM users WHERE user_name = ? AND user_password = ?');
        $req->execute(array($username, $password));
        $loginUser = $req->fetch();

        return $loginUser;
    }
}