<?php $title = 'Post'; ?>

<?php ob_start(); ?>
    <p>
        <a class="back_link" href="index.php?action=allPosts">Retour à la liste des chapitres</a>
    </p>
    <br/>

    <h1>Chapitre <?= $post['chapter_id']?></h1>

    <div class="index_chapitre">

        <div class="chapter_container">
            <div class="chapter">
                <h3>
                    <?= htmlspecialchars($post['post_title']) ?>
                    <em> ajouté le <?= $post['creation_date_fr'] ?></em>
                </h3>
                
                <p>
                    <?= nl2br($post['post_content']) ?>
                </p>
                <p>
                    <em><a class="comments" href="index.php?action=comments&amp;id=<?= $post['id'] ?>">[Commentaires]</a></em>
                    <br />
                </p>
            </div>
        </div>

    </div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>