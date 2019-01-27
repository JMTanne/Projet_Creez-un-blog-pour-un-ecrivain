<?php
// Namespace creation
namespace P4\Projet\Controller;
// Namespaces used by the Controller
use \P4\Projet\Model\PostManager;
use \P4\Projet\Model\CommentManager;
// Files used and required for the Controller
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('controller/Controller.php');

class ControllerPosts extends Controller
{
    /**
     * Last Post function : Display last chapter on home page
     */
    public function lastPost()
    {
        $postManager = new PostManager();
        $lastChapter = $postManager->getLastPost();
        
        require('view/welcomeView.php');
    }
    
    /**
     * All posts function : Display all Posts/Chapters on list posts view
     */
    public function allPosts()
    {
        $postManager = new PostManager();
        $posts       = $postManager->getPosts();
        
        require('view/listPostsView.php');
    }
    
    /**
     * Post function : Display one Post/Chapter 
     * @param int $postId
     */
    public function post($postId)
    {
        $postManager = new PostManager();
        $post        = $postManager->getPost($postId);
        
        require('view/postView.php');
    }
    
    /**
     * Add post function : Redirection to Add new post/Chapter view
     */
    public function addPost()
    {
        require('view/BO_addPostView.php');
    }
    
    /**
     * New post function (Back Office) : Add new Chapter & Display contextual message flash
     * @param int $postId
     * @param string $postTitle
     * @param string $postContent
     */
    public function newPost($postId, $postTitle, $postContent)
    {
        
        $postManager = new PostManager();
        $newPost     = $postManager->postChapter($postId, $postTitle, $postContent);
        
        $this->setFlash('Votre nouveau Chapitre a été ajouté au site !', 'success');
        
        header('Location: index.php?action=BO_allPosts');
    }
    
    /**
     * All posts function (Back office) : Display all Posts/Chapters on Back office list Posts/Chapters view
     */
    public function BO_allPosts()
    {
        $postManager = new PostManager();
        $posts       = $postManager->BO_getPosts();
        
        require('view/BO_listPostsView.php');
    }
    
    /**
     * Post function : Display one Post/Chapter & get his comments
     * @param int $postId
     * @param string $comments
     */
    public function BO_post($postId, $comments)
    {
        $postManager = new PostManager();
        $post        = $postManager->BO_getPost($postId);
        
        $commentManager = new CommentManager();
        $comments       = $commentManager->getComments($comments);
        
        require('view/BO_postView.php');
    }
    
    /**
     * Delete a Post/Chapter, Display contextual message & redirection to Back office All Posts/Chapters view
     * @param int $postId
     */
    public function BO_deletePost($postId)
    {
        $postManager = new PostManager();
        $delete      = $postManager->BO_removePost($postId);
        
        $this->setFlash('Le Chapitre a été supprimé avec succès !', 'success');
        
        header('Location: index.php?action=BO_allPosts');
    }
    
    /**
     * Edit a Post/Chapter on Modif Post/Chapter view
     * @param int $postId
     */
    public function BO_editPost($postId)
    {
        $postManager = new PostManager();
        $post        = $postManager->getPost($postId);
        
        require('view/BO_modifPostView.php');
    }
    
    /**
     * Valid Post/Chapter modification
     * @param int $postId
     * @param string $postTitle
     * @param string $postContent
     */
    public function BO_postModified($postId, $postTitle, $postContent)
    {
        $postManager = new PostManager();
        $update      = $postManager->BO_updatePost($postId, $postTitle, $postContent);
        
        header('Location: index.php?action=BO_allPosts&id=' . $postId);
    }
}