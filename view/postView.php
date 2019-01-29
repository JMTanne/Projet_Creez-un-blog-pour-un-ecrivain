<?php $title = 'Post'; ?>

<?php ob_start(); ?>

<div class="body_container">

        <a class="back_link" href="index.php?action=allPosts">Retour aux chapitres</a>

    <div class="index_pages_link">

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