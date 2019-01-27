<?php
// Namespace creation
namespace P4\Projet\Model;
// Class used and required for the Model
require_once("model/Manager.php");

class LoginManager extends Manager
{
    /**
     * Get user informations, depending on 2 params : user_name & user_password
     * @param string $username
     * @param string $password
     *
     * @return array $loginUser
     */
    public function getLogin($username, $password)
    {
        $db  = $this->dbConnect();
        $req = $db->prepare('SELECT id, user_name, user_password, user_role FROM users WHERE user_name = ? AND user_password = ?');
        $req->execute(array(
            $username,
            $password
        ));
        $loginUser = $req->fetch();
        
        return $loginUser;
    }
    
    /**
     * Get user informations, depending on his id
     * @param int $id
     *
     * @return array $user
     */
    public function getUserById($id)
    {
        $db  = $this->dbConnect();
        $req = $db->prepare('SELECT id, user_name, user_role FROM users WHERE id = ?');
        $req->execute(array(
            $id
        ));
        $user = $req->fetch();
        
        return $user;
    }
    
    /**
     * Add new user in table & call getLogin function 
     * @param string $id
     * @param string $id
     *
     * @return request $this->getLogin($username, $password);
     */
    public function newRegistration($username, $password)
    {
        $db  = $this->dbConnect();
        $req = $db->prepare('INSERT INTO users(user_name, user_password, user_role, user_creationDate) VALUES(?, ?, "regUser", NOW())');
        $req->execute(array(
            $username,
            $password
        ));
        
        return $this->getLogin($username, $password);
    }
    
    /**
     * Get user informations, depending on his username and return an int > 0 if this one already exist
     * @param string $username
     *
     * @return int $nbUsers;
     */
    public function isUserExist($username)
    {
        $db  = $this->dbConnect();
        $req = $db->prepare('SELECT count(user_name) AS user_name FROM users WHERE user_name = ?'); // If count > 0 : username already exist
        $req->execute(array(
            $username
        ));
        $nbUsers = $req->fetch();
        
        return (int) $nbUsers['user_name'] > 0;
    }
}