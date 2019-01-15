<?php 
use \P4\Projet\Controller\Session;
require_once('controller/ControllerSessionClass.php');

$session = new Session();
$session->flash();
?>

<?php $title = 'Authentification'; ?>

<?php ob_start(); ?>

<p>
    <a class="back_link" href="index.php">Retour à l'Accueil</a>
</p>

<div class="index_pages">

  <h1>Authentification</h1>

  <form id="loginForm"action="#" method="post">
    	<div class="loginForm_container">
      	<label for="uname"><b>Pseudo</b></label>
      	<input type="text" placeholder="Entrez votre Pseudo" name="uname" required>

      	<label for="password"><b>Mot de Passe</b></label>
      	<input type="password" placeholder="Entrez votre Mot de Passe" name="psw" required>

      	<button id="loginButton" type="submit">Se Connecter</button>
        <div class="loginForm_error" style="background-color:#f1f1f1">
    	</div>
  </form>
</div>


<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>