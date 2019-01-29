<?php $this->flash(); ?>

<?php $title = 'Authentification'; ?>

<?php ob_start(); ?>

<div class="index_pages">

  <h1>Identification</h1>

  <form id="loginForm" action="index.php?action=checkLogin" method="post">
    
    	<div class="loginForm_container">
      	<label for="uname"><b>Pseudo</b></label>
      	<input type="text" placeholder="Entrez votre Pseudo" name="username" required>

      	<label for="password"><b>Mot de Passe</b></label>
      	<input type="password" placeholder="Entrez votre Mot de Passe" name="password" required>

        <div class="logRegButtons_container">
        	<button id="loginButton" type="submit">Se Connecter</button>
          <a id="regButton" href="index.php?action=registrationView">S'enregistrer</a>

        </div>
    	</div>
  </form>

  <a class="back_link" href="index.php">Retour à l'Accueil</a>
</div>


<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>