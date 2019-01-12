<?php
// Appel des namespaces
use \P4\Projet\Model\PostManager;
use \P4\Projet\Model\CommentManager;

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function welcome()
{
    require('view/welcomeView.php');
}
