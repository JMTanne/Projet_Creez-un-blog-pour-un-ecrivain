<?php $title = 'BO_Chapitre'; ?>

<?php ob_start(); ?>

<!-- <h1>Chapitre <?= $post['chapter_id']?></h1> -->

<div class="body_container">

        <a class="BO_back_link" href="index.php?action=BO_allPosts">Retour à la liste des chapitres</a>

    <div class="BO_index_pages_link">

        <div class="BO_chapter_container">
            <div class="BO_chapter">
                <h3>
                    <?= htmlspecialchars($post['post_title']) ?>
                    <em> ajouté le <?= $post['creation_date_fr'] ?></em>
                </h3>
                
                <p>
                    <?= nl2br($post['post_content']) ?>
                </p>
                <p>
                    <em><a class="modifPost" href="index.php?action=BO_updatePost&amp;id=<?= $post['id'] ?>">[Modifier le Chapitre]</a></em>
                    <em><a class="deletePost" href="index.php?action=BO_deletePost&amp;id=<?= $post['id'] ?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ce Chapitre ?'));">[Supprimer le Chapitre]</a></em>
                    <em><a class="deleteComment" href="index.php?action=BO_allComments&amp;id=<?= $post['id'] ?>">[Commentaires]</a></em>
                    <br />
                </p>
            </div>
        </div>

    </div>

<?php $content = ob_get_clean(); ?>
<?php require('BO_template.php'); ?>