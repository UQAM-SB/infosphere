/**
 * Podio
 * Inserts shortcode based on url from textbox
 */
(function($){

    // Modal Dialog
    tinymce.PluginManager.add( 'podio_shortcode', function( editor, url ) {

        var site_url = window.location.hostname;
        //var podio_id = '';

        // Add button that inserts shortcode into the current position of the editor
        editor.addButton( 'podio_shortcode', {
            title: 'Formulaire Podio',
            tooltip: 'Insérer un formulaire Podio',
            image : url+'/podio-icon.svg',
            onclick: function(e) {
                // Open a TinyMCE modal
                editor.windowManager.open({
                    title: 'Formulaire Podio',
                    body: [{
                        type   : 'container',
                        layout : 'stack',
                        name   : 'container',
                        label  : '',
                        items: [
                            {
                                type: 'label',
                                text: 'URL du formulaire',
                                style: 'font-weight:bold; padding: 0 0 10px 0;',
                            },
                            {
                                type: 'textbox',
                                name: 'podio_url',
                                label: '',
                                value: 'https://podio.com/...',
                                size: 60,
                            },
                            {
                                type: 'label',
                                text: site_url + '/ doit être préalablement permis dans les paramètres du formulaire.',
                                style: 'font-style: italic;padding: 10px 0 0;',
                            },
                        ],
                    }],
                    width: 500,
                    height: 130,
                    onsubmit: function( e ) {
                        editor.insertContent( '[podio src="' + e.data.podio_url + '"]' );
                    }
                });
            }
        });

    })

});