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

    public function newRegistration($username, $password)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO users(user_name, user_password, user_role, user_creationDate) VALUES(?, ?, "regUser", NOW())');
        $req->execute(array($username, $password));

        return $this->getLogin($username, $password);
    }

    public function isUserExist($username)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT count(user_name) AS user_name FROM users WHERE user_name = ?'); // If count > 0 : username already exist
        $req->execute(array($username));
        $nbUsers = $req->fetch();

        return (int)$nbUsers['user_name'] > 0;
    }
}