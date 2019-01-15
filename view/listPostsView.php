<?php $title = 'Liste des chapitres'; ?>

<?php ob_start(); ?>

<p>
    <a class="back_link" href="index.php">Retour à l'Accueil</a>
</p>

<div class="index_pages">

    <?php
    while ($data = $posts->fetch())
    {
        // Script permettant de renvoyer un nombre donné de mots pour prévisualisation des chapitres (explode & implode)
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

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>