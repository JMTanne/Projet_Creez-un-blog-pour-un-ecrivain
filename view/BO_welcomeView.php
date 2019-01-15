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
	
		<p> "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa quae ab illo perspiciatis unde omnis iste. eque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur."</p>

	</section>

		<section id="BO_welcome_allAlerts">

			<h3>Les derniers Signalements</h3>

			<?php
			while ($data = $alerts->fetch())
			{
			?>
		    	<div class="alerts">
		        	<h3>
		        		<em>Signalement du <?= $data['creation_date_fr'] ?></em><br/>
		            	<em>Le commentaire de <strong><?= htmlspecialchars($data['alert_commentAuthor']) ?></strong> publié le <?= htmlspecialchars($data['alert_commentDate']) ?></em>
		            	
		            </h3>
		            <p>
		            	Voici son commentaire : <em>"<?= htmlspecialchars($data['alert_commentContent']) ?>"</em>
		            	<br/><em><a class="validComment" href="index.php?action=BO_deleteAlert&amp;alertId=<?= $data['id'] ?>">[Valider le commentaire]</a></em><em> - </em><em><a class="deleteComment" href="index.php?action=BO_validAlert&amp;commentId=<?= $data['alert_commentId'] ?>&amp;alertId=<?= $data['id'] ?>">[Supprimer le commentaire]</a></em></p>
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