jQuery(function($){

	var alert = $('#alert');
	if (alert.length > 0){
		
		// Fonction gérant la fermeture de l'alerte avec un delay
		alert.hide().slideDown(600)/*.delay(3000).slideUp()*/;
		
		// Fonction gérant la fermeture de l'alerte avec le "x" close
		alert.find('.close').click(function(e){
			e.preventDefault();
			alert.slideUp();
		})
	}
});

tinymce.init({
    selector: '#mytextarea'
  });