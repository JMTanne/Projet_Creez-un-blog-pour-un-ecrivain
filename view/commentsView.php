<?php 
use \P4\Projet\Controller\Session;
require_once('controller/ControllerSessionClass.php');

$session = new Session();
$session->flash();
?>

<?php $title = 'Modifier votre commentaire'; ?>

<?php ob_start(); ?>

<h1>Commentaires du Chapitre <?= $post['chapter_id']?></h1>

<p>
    <a class="back_link" href="index.php?action=post&amp;id=<?= $post['id'] ?>">Retour au Chapitre <?= $post['chapter_id']?></a>
</p>

<div class="index_pages">

	<p>Les commentaires du chapitre :</p>

	<?php
	while ($comment = $comments->fetch())
	{
	?>
		<div class="comments_container">

			    <p><strong><?= htmlspecialchars($comment['comment_author']) ?></strong> le <?= $comment['creation_date_fr'] ?></p>
			    <p><em class="italic">"<?= nl2br($comment['comment_content']) ?>"</em>

			   	<a class="deleteComment" href="index.php?action=commentDeleted&amp;id=<?= $comment['id'] ?>&amp;postId=<?= $post['id'] ?>"" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ce commentaire ?'));">Supprimer</a></p>

			    <p><a class="signal" href="index.php?action=alertComment&amp;commentId=<?= $comment['id'] ?>&amp;commentPostId=<?= $comment['post_id'] ?>&amp;commentAuthor=<?= $comment['comment_author'] ?>&amp;commentContent=<?= $comment['comment_content'] ?>&amp;commentDate=<?= $comment['creation_date_fr'] ?>&amp;postId=<?= $post['id'] ?>" onclick="return(confirm('Etes-vous sûr de vouloir signaler ce commentaire ?'));">Signaler le commentaire</a></p>

		</div>
	<?php
	}
	?>

	<p>Ajouter un commentaire ?</p>

	<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
		<div>
    		<label for="author">Auteur</label><br />
    		<input type="text" id="author" name="comment_author" />
		</div>
		<div>
    		<label for="comment">Commentaire</label><br />
    		<textarea id="comment" name="comment_content"></textarea>
		</div>
		<div>
    		<input type="submit" />
		</div>
	</form>
	
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>