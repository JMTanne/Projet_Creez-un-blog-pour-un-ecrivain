<?php 
use \P4\Projet\Controller\Session;
require_once('controller/ControllerSessionClass.php');

$session = new Session();
$session->flash();
?>

<?php $title = 'Modification du Chapitre'; ?>

<?php ob_start(); ?>

<div class="index_pages">

		<section id="BO_modifPost">
		
			<h1>Modifiez facilement un chapitre de votre livre ici:</h1>
		
				<p> "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium."</p>

		</section>

			<form method="post" action="index.php?action=BO_postUpdated&amp;id=<?=$post['id']?>">
				<div>
		    		<label for="chapterContent">Contenu du Chapitre</label><br />
		    		<textarea id="mytextarea" rows="20" cols="50" name="postContent"><?=$post["post_content"]?></textarea>
				</div>
				<div>
		    		<input type="submit" value="Valider la modification du Chapitre"/>
				</div>
			</form>
	</div>

<?php $content = ob_get_clean(); ?>
<?php require('BO_template.php'); ?>