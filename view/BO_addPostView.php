<?php $this->flash(); ?>

<?php $title = 'BO_AjoutChapitre'; ?>

<?php ob_start(); ?>

	<div class="index_pages">

		<section id="BO_addPost">
		
			<h1>Ajoutez facilement un chapitre à votre livre :</h1>
		
				<p> "Ici, postez un nouveau chapitre en ligne après avoir ajouté son <strong>numéro</strong>, son <strong>titre</strong> ainsi que son <strong>contenu</strong>."</p>

		</section>

			<form action="index.php?action=BO_postAdded" method="post">
				<div>
		    		<label for="chapterNumber">N° de Chapitre</label><br />
		    		<input type="number" id="chapterNumber" name="chapter_id" required />
				</div>
				<div>
		    		<label for="chapterName">Titre du Chapitre</label><br />
		    		<input type="text" id="chapterName" name="post_title" required />
				</div>
				<div>
		    		<label for="chapterContent">Contenu du Chapitre</label><br />
		    		<textarea id="mytextarea" rows="20" cols="50" name="post_content"></textarea>
				</div>
				<div>
					<br />
		    		<input type="submit" value="Ajouter le nouveau Chapitre"/>
				</div>
			</form>

	</div>

<?php $content = ob_get_clean(); ?>
<?php require('BO_template.php'); ?>