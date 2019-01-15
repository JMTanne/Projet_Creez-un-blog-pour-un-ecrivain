<?php 
use \P4\Projet\Controller\Session;
require_once('controller/ControllerSessionClass.php');

$session = new Session();
$session->flash();
?>

<?php $title = 'Gestion des commentaires'; ?>

<?php ob_start(); ?>

<h1>Commentaires du Chapitre <?= $post['chapter_id']?></h1>

<p>
    <a class="back_link" href="index.php?action=BO_post&amp;id=<?= $post['id'] ?>">Retour au Chapitre <?= $post['chapter_id']?></a>
</p>

<div class="BO_index_pages">

	<p>Les commentaires du chapitre :</p>

	<?php
	while ($comment = $comments->fetch())
	{
	?>
		<div class="BO_commentsContainer">

			    <p><strong><?= htmlspecialchars($comment['comment_author']) ?></strong> le <?= $comment['creation_date_fr'] ?></p>
			    <p><em class="italic">"<?= nl2br(htmlspecialchars($comment['comment_content'])) ?>"</em>

			   	<a class="deleteComment" href="index.php?action=commentDeleted&amp;id=<?= $comment['id'] ?>&amp;postId=<?= $post['id'] ?>">Supprimer</a></p>
		</div>
	<?php
	}
	?>

<?php $content = ob_get_clean(); ?>
<?php require('BO_template.php'); ?>