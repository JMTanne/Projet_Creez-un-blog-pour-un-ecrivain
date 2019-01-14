<?php $title = 'BO_Chapitre'; ?>

<?php ob_start(); ?>
    <p>
        <a class="back_link" href="index.php?action=BO_allPosts">Retour à la liste des chapitres</a>
    </p>

    <h1>Chapitre <?= $post['chapter_id']?></h1>

    <div class="BO_index_pages">

        <div class="BO_chapter_container">
            <div class="BO_chapter">
                <h3>
                    <?= htmlspecialchars($post['post_title']) ?>
                    <em> ajouté le <?= $post['creation_date_fr'] ?></em>
                </h3>
                
                <p>
                    <?= nl2br(htmlspecialchars($post['post_content'])) ?>
                </p>
                <p>
                    <em><a class="modifPost" href="#">[Modifier le Chapitre]</a></em>
                    <em><a class="deletePost" href="#">[Supprimer le Chapitre]</a></em>
                    <br />
                </p>
            </div>
        </div>

    </div>

<?php $content = ob_get_clean(); ?>
<?php require('BO_template.php'); ?>