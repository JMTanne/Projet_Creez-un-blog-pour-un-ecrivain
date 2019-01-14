<?php
// Création d'un namespace
namespace P4\Projet;

class Session{

	// Mise en session un message de notification (alert) a afficher sur la prochaine page
	public function setFlash($message, $type){
		$_SESSION['flash'] = array(
			'message' => $message,
			'type'	  => $type 
		);
	}

	// Affiche un message si message présent en session & suppression après affichage
	public function flash(){
		if(isset($_SESSION['flash'])){
			?>
			<div id="alert" class="alert alert-<?php echo $_SESSION['flash']['type']; ?>">
				<a class="close">x</a>
			<?php echo $_SESSION['flash']['message']; ?>
			</div>
			<?php
			unset($_SESSION['flash']);
		}
	}
}