<?php 
use \P4\Projet\Controller\Session;
require_once('controller/ControllerSessionClass.php');

$session = new Session();
$session->flash();
?>

<?php $title = 'BO_AjoutChapitre'; ?>

<?php ob_start(); ?>

	<div class="index_pages">

		<section id="BO_addPost">
		
			<h1>Ajoutez facilement un chapitre à votre livre ici:</h1>
		
				<p> "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium."</p>

		</section>

			<form action="index.php?action=BO_postAdded" method="post">
				<div>
		    		<label for="chapterNumber">N° de Chapitre</label><br />
		    		<input type="number" id="chapterNumber" name="chapter_id" />
				</div>
				<div>
		    		<label for="chapterName">Nom du Chapitre</label><br />
		    		<input type="text" id="chapterName" name="post_title" />
				</div>
				<div>
		    		<label for="chapterContent">Contenu du Chapitre</label><br />
		    		<textarea id="mytextarea" rows="20" cols="50" name="post_content"></textarea>
				</div>
				<div>
		    		<input type="submit" value="Ajouter le nouveau Chapitre"/>
				</div>
			</form>

	</div>

<?php $content = ob_get_clean(); ?>
<?php require('BO_template.php'); ?>