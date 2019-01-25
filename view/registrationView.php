<?php 
$this->flash();
?>

<?php $title = 'Registration'; ?>

<?php ob_start(); ?>

<div class="index_pages">

  <h1>S'enregistrer</h1>

  <form id="regForm" action="index.php?action=registration" method="post">
    
    	<div class="regForm_container">
      	<label for="uname"><b>Pseudo</b></label>
      	<input type="text" placeholder="Entrez votre Pseudo" name="regUsername" required>

      	<label for="password"><b>Mot de Passe</b></label>
      	<input type="password" placeholder="Entrez votre Mot de Passe" name="regPwd" required>

        <label for="password"><b>Confirmez votre Mot de Passe</b></label>
        <input type="password" placeholder="Confirmez votre Mot de Passe" name="regConfirmPwd" required>

        <div class="logRegButtons_container">
          <button id="regButton" type="submit">S'enregistrer</button>

        </div>
    	</div>
  </form>

  <a class="back_link" href="index.php">Retour à l'Accueil</a>
</div>


<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>