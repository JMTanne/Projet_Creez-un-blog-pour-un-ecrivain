<?php 
$this->flash();
?>

<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>

<div class="index_pages">

	<section id="welcome_index">
		
		<h1>Bienvenue sur mon Livre en ligne</h1>
	
		<p> "Chers lecteurs, chers lectrices,</p>
		<p>Pour mon prochain roman, j'ai décidé d'éviter la formule traditionnelle et souvent longue qu'est l'entière écriture d'un livre. Vous imaginez bien, qu'entre les différentes étapes de création, de l'écriture, jusqu'à la publication, en passant par les processus de relecture, que le procédé peut parfois être vraiment long. C'est ce que je voulais absolument éviter et ainsi innover en vous proposant mon prochain bouquin : 'Billet simple pour l'Alaska', sous forme de livre en ligne.<br/>
		Je publierai ce dernier épisode par épisode, sous formes de chapitres que vous pourrez consulter quand bon vous semblera et ça, gratuitement. N'hésitez d'ailleurs pas à laisser des commentaires.</p>

		<p>Je vous souhaite une bonne lecture à toutes et à tous !"</p>

	</section>

		<section id="welcome_lastPosts">

			<h3>Dernier Chapitre</h3>

			<?php
			while ($data = $lastChapter->fetch())
			{
			?>
		    	<div class="chapter">
		        	<h3>
		            	<?= htmlspecialchars($data['post_title']) ?>
		            	<em>ajouté le <?= $data['creation_date_fr'] ?></em>
		        	</h3>
		        
			        <p>
			            <?= nl2br(substr($data['post_content'], 0, 1000)) . '... ' ?> <em><a class="all_chapter" href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire le chapitre entier</a></em>
			        </p>
			        <p>
			            <em><a class="comments" href="index.php?action=comments&amp;id=<?= $data['id'] ?>">[Commentaires]</a></em>
			            <br />
			        </p>
			    </div>
			<?php
			}
			$lastChapter->closeCursor();
			?>

		</section>

</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>