<?php $title = 'Modifier votre commentaire'; ?>

<?php ob_start(); ?>
<h1>Commentaires du Chapitre <?= $post['chapter_id']?></h1>

<p>
    <a class="back_link" href="index.php?action=allPosts">Retour à la liste des chapitres</a>
</p>

<div class="index_pages">

	<p>Les commentaires du chapitre :</p>

	<?php
	while ($comment = $comments->fetch())
	{
	?>
		<div class="comments_container">

			    <p><strong><?= htmlspecialchars($comment['comment_author']) ?></strong> le <?= $comment['creation_date_fr'] ?></p>
			    <p><em class="italic">"<?= nl2br(htmlspecialchars($comment['comment_content'])) ?>"</em></p>

		</div>
	<?php
	}
	?>
	
</div>


<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>