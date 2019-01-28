<?php $title = 'Liste des chapitres'; ?>

<?php ob_start(); ?>


<div class="body_container">

        <a class="back_link" href="index.php">Retour à l'Accueil</a>

<div class="index_pages_link">

    <?php
    while ($data = $posts->fetch())
    {
        // Script for chapters preview : number of words displayed (explode & implode)
        $contentPost = $data['post_content'];
        $limit = 200;
        $contentPreview = explode(' ', $contentPost, ($limit+1));
        if (count($contentPreview) > $limit) 
            { 
                array_pop($contentPreview); 
            }
    ?>
    
        <div class="chapter_container">
            <div class="chapter">
                <h3>
                    <?= htmlspecialchars($data['post_title']) ?>
                    <em>ajouté le <?= $data['creation_date_fr'] ?></em>
                </h3>
                
                    <p>
                    <?=                    
                    nl2br(implode(' ', $contentPreview)) . '... ' ?> <em><a class="all_chapter" href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire le chapitre entier</a></em>
                    </p>
                    <p>
                    <em><a class="comments" href="index.php?action=comments&amp;id=<?= $data['id'] ?>">[Commentaires]</a></em>
                    <br />
                    
                    </p>
            </div>
        </div>
    <?php
    }
    $posts->closeCursor();
    ?>

</div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>