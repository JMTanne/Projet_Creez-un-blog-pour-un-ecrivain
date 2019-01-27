<?php
// Namespace creation
namespace P4\Projet\Model;
// Class used and required for the Model
require_once("model/Manager.php");

class PostManager extends Manager
{
    /**
     * Get all posts datas on posts table and return last one, by creation date
     * @return array $lastPost
     */
    public function getLastPost()
    {
        $db = $this->dbConnect();
        $lastPost = $db->query('SELECT id, chapter_id, post_title, post_content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 1');

        return $lastPost;
    }

    /**
     * Get all Posts datas on posts table 
     * @return array $req
     */
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, chapter_id, post_title, post_content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 10');

        return $req;
    }
    
    /**
     * Get all Post datas on posts table, depending to his id
     * @param int $postId
     *
     * @return array $post
     */
    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, chapter_id, post_title, post_content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    /**
     * Add new post on database/posts table
     * @param int $postId
     * @param string $postTitle
     * @param string $postContent
     *
     * @return array $newPost
     */
    public function postChapter($postId, $postTitle, $postContent)
    {
        $db = $this->dbConnect();
        $post = $db->prepare('INSERT INTO posts(chapter_id, post_title, post_content, creation_date) VALUES(?, ?, ?, NOW())');
        $post->execute(array($postId, $postTitle, $postContent));
        $newPost = $post->fetch();

        return $newPost;
    }

    /**
     * Get all Posts datas on posts table
     * @return array $req
     */
    public function BO_getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, chapter_id, post_title, post_content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 10');

        return $req;
    }

    /**
     * Get all Post datas on posts table, depending to his id
     * @param int $postId
     *
     * @return array $post
     */
    public function BO_getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, chapter_id, post_title, post_content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    /**
     * Delete Post on posts table
     * @param int $postId
     *
     * @return array $delete
     */
    public function BO_removePost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $delete = $req->fetch();

        return $delete;
    }

    /**
     * Update Post on posts table
     * @param int $postId
     * @param string $postTitle
     * @param string $postContent
     *
     * @return array $update
     */
    public function BO_updatePost($postId, $postTitle, $postContent)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE posts SET post_title = ?, post_content = ? WHERE id = ?');
        $req->execute(array($postTitle, $postContent, $postId));
        $update = $req->fetch();

        return $update;
    }
}