<?php 
$this->flash();
?>

<?php $title = 'Modification du Chapitre'; ?>

<?php ob_start(); ?>

<div class="index_pages">

		<section id="BO_modifPost">
		
			<h1>Modifiez facilement un chapitre de votre livre ici:</h1>

		</section>

			<form method="post" action="index.php?action=BO_postUpdated&amp;id=<?=$post['id']?>">
				<div>
		    		<label for="chapterContent">Titre du Chapitre</label><br />
		    		<input type="text" id="chapterName" name="postTitle" value="<?=$post["post_title"]?>"/>
				</div>
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