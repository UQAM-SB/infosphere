/* Si on n'a pas besoin d'utiliser webpack, on écrit le JS ici */
(function($) {
    // console.log('sous-theme');

    if ( $('.page-citer-ses-sources').length || $('.page-naviguer-site').length ) {
        $('[data-toggle="tooltip"]').tooltip()
    }
    
})( jQuery );