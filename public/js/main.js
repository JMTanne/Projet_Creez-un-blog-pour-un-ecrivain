jQuery(function($) {

    var alert = $('#alert');
    if (alert.length > 0) {
        // Definition of alert message closing (delay)
        alert.hide().slideDown(600);

        // Closing alert message with click event on 'x'
        alert.find('.close').click(function(e) {
            e.preventDefault();
            alert.slideUp();
        })
    }
});
// TinyMCE init on '#mytextarea' html tags id
tinymce.init({
    selector: '#mytextarea'
});