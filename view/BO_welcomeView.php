<?php 
use \P4\Projet\Controller\Session;
require_once('controller/ControllerSessionClass.php');

$session = new Session();
$session->flash();
?>

<?php $title = 'BO_Accueil'; ?>

<?php ob_start(); ?>

<div class="index_pages">

	<section id="BO_welcome_index">
		
		<h1>Bienvenue sur l'espace Administration du site !</h1>
	
		<p class="welcome_description"> "Dans ce Back Office, vous pourrez administrer toutes les catégories de votre site : gérer le signalement des commentaires, ajouter ou modifier un chapitre, ou encore en supprimer un."<br/><br/>

		Plus bas, vous verrez les différents commentaires signalés.
		</p>

	</section>

		<section id="BO_welcome_allAlerts">

			<h3>Les derniers Signalements</h3>

			<?php
			while ($data = $alerts->fetch())
			{
			?>
		    	<div class="alerts">
		        	<h3>
		        		Commentaire de <strong><?= htmlspecialchars($data['comment_author']) ?></strong>
		        		<em>, publié le <?= $data['creation_date_fr'] ?></em><br/>
		            	<em>
		            	
		            </h3>
		            <p>
		            	Voici son commentaire : <em>"<?= $data['comment_content'] ?>"</em>
		            	<br/><em><a class="validComment" href="index.php?action=BO_deleteAlert&amp;commentId=<?= $data['id'] ?>" onclick="return(confirm('Etes-vous sûr de vouloir valider ce commentaire signalé ?'));">[Valider le commentaire]</a></em>
		            	
		            	<em> - </em>

		            	<em><a class="deleteComment" href="index.php?action=BO_validAlert&amp;commentId=<?= $data['id'] ?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ce commentaire signalé ?'));">[Supprimer le commentaire]</a></em></p>
		            </p>
			    </div>
			<?php
			}
			$alerts->closeCursor();
			?>

		</section>

		<section id="BO_welcome_footer">
		
			<p><a class="BO_links_footer" href="index.php">Retour au site</a></p>

		</section>

</div>

<?php $content = ob_get_clean(); ?>
<?php require('BO_template.php'); ?>