<?php 
$this->flash();
?>

<?php $title = 'Ajout des commentaires'; ?>

<?php ob_start(); ?>

<h1>Commentaires du Chapitre <?= $post['chapter_id']?></h1>

<div class="body_container">

    <a class="back_link" href="index.php?action=post&amp;id=<?= $post['id'] ?>">Retour au Chapitre <?= $post['chapter_id']?></a>

<div class="index_pages_link">

	<?php
	while ($comment = $comments->fetch())
	{
	?>
		<div class="comments_container">

			    <p><strong><?= htmlspecialchars($comment['comment_author']) ?></strong> le <?= $comment['creation_date_fr'] ?></p>
			    <p><em class="italic">"<?= nl2br($comment['comment_content']) ?>"</em>

			    <?php
                  if (($this->userRole != "")) {
                  	if (($this->userRole === 'admin') || ($this->userRole === 'moderator')) {
                  	?>
			   	<a class="deleteComment" href="index.php?action=commentDeleted&amp;id=<?= $comment['id'] ?>&amp;postId=<?= $post['id'] ?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ce commentaire ?'));">Supprimer</a></p>
			   	<?php
			   		}
			   	} 
			   	if ($comment['comment_alert'] == 0) {
			   		?>
			    <p><a class="signal" href="index.php?action=alertComment&amp;commentId=<?= $comment['id'] ?>&amp;postId=<?= $post['id'] ?>"" onclick="return(confirm('Etes-vous sûr de vouloir signaler ce commentaire ?'));">Signaler le commentaire</a></p>
			    <?php
			} else {
				?>
				<p>Ce commentaire a été signalé. Il sera modéré dans les plus brefs délais.</p>
				<?php
			}
			?>
		</div>
	<?php
	}
	?>
	<?php
      	if ($this->userRole !== "") {
      		/*if (($this->userRole === 'moderator') || ($this->userRole === 'regUser') || ($this->userRole === 'admin')) {*/
      	?>
    <div class="newComment_container">

	<h4>Ajouter un commentaire ?</h4>

	<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
		<div>
    		<label for="author">Auteur</label><br />
    		<input type="text" id="author" name="comment_author" value="<?= $this->userName ?>" />
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
	<?php
		}
	/*}*/
	?>
	
</div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>