<?php $title = 'Liste des chapitres'; ?>

<?php ob_start(); ?>

<p>
    <a href="index.php">Retour à la liste des billets</a>
</p>

<div class="index_pages">

<section id="listPosts_index">

    <h1>Liste des chapitres:</h1>
    
        <p> "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p>

</section>


    <?php
    while ($data = $posts->fetch())
    {
    ?>
        <div class="chapter_container">
            <div class="chapter">
                <h3>
                    <?= htmlspecialchars($data['post_title']) ?>
                    <em>ajouté le <?= $data['creation_date_fr'] ?></em>
                </h3>
            
                    <p>
                    <?= nl2br(htmlspecialchars($data['post_content'])) ?>
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