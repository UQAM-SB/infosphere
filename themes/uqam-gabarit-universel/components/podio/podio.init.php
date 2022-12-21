<?php
/**
 * SHORTCODE POUR Formulaires Podio
 *
 * @param $att['src'] = URL to podio form. Ex: https://podio.com/webforms/2837570/211517
 */
function podioSC($att, $content) {
    $form_id = array_reverse( explode('/', $att['src']) );
    if( is_user_logged_in() && !isset($att['src']) ){
        return '<div class="alert alert-danger">Erreur, veuillez mettre le lien vers le formulaire dans l\'attribut src.<pre> Ex : [podio src="https://podio.com/webforms/1234567/123456"]</pre></div>';
    } elseif( is_user_logged_in() && wp_remote_retrieve_response_code( wp_remote_get( $att['src'] ) ) != '200' ){
        $podio_error_code = wp_remote_retrieve_response_code( wp_remote_get( $att['src'] ) );
        return '<div class="alert alert-danger">Erreur Podio : ' . $podio_error_code . '<br> Le formulaire n\'a pu être intégré.</div>';
    } else{
        if($att['src']){
            return '<!-- BEGIN Podio web form -->
				<script src="' . $att["src"] . '.js"></script>
				<script type="text/javascript">
				  _podioWebForm.render("' . $form_id[0] . '")
				</script>
				<noscript>
				  <a href="' . $att["src"] . '" target="_blank">Veuillez remplir le formulaire</a>
				</noscript>
				<!-- END Podio web form -->';
        }
    }
}
add_shortcode('podio', 'podioSC');

/**
 *  Adds Podio JS file to the TinyMCE / Visual Editor instance
 *	https://stackoverflow.com/questions/33454966/tinymce-dialog-with-ajax-content
 */
function podio_register_tinymce( $plugin_array ) {
    $plugin_array['podio_shortcode'] = get_template_directory_uri() .'/components/podio/podio-tinymce.js';
    return $plugin_array;
}
add_filter( 'mce_external_plugins', 'podio_register_tinymce' );

/**
 * Adds a button to the TinyMCE / Visual Editor which the user can click
 * to insert a link with a custom CSS class.
 *
 * @param array $buttons Array of registered TinyMCE Buttons
 * @return array Modified array of registered TinyMCE Buttons
 */
function podio_tinymce_toolbar_button( $buttons ) {
    array_push( $buttons, '|', 'podio_shortcode' );
    return $buttons;
}
add_filter( 'mce_buttons', 'podio_tinymce_toolbar_button' );