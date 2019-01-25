<?php 
$this->flash();
?>

<?php $title = 'BO_AjoutChapitre'; ?>

<?php ob_start(); ?>

<div class="body_container">

    <a class="BO_back_link" href="index.php?action=BO_welcome">Retour à l'Accueil</a>

<div class="BO_index_pages_link">

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
    
        <div class="BO_chapter_container">
            <div class="BO_chapter">
                <h3>
                    <?= htmlspecialchars($data['post_title']) ?>
                    <em>ajouté le <?= $data['creation_date_fr'] ?></em>
                </h3>
                
                    <p>
                    <?=                    
                    nl2br(implode(' ', $contentPreview)) . '... ' ?> <em><a class="all_chapter" href="index.php?action=BO_post&amp;id=<?= $data['id'] ?>">Voir le chapitre entier</a></em>
                    </p>
                    <p>
                    <em><a class="modifPost" href="index.php?action=BO_updatePost&amp;id=<?= $data['id'] ?>">[Modifier le Chapitre]</a></em>
                    <em><a class="deletePost" href="index.php?action=BO_deletePost&amp;id=<?= $data['id'] ?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ce Chapitre ?'));">[Supprimer le Chapitre]</a></em>
                    <em><a class="deleteComment" href="index.php?action=BO_allComments&amp;id=<?= $data['id'] ?>">[Commentaires]</a></em>
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
<?php require('BO_template.php'); ?>