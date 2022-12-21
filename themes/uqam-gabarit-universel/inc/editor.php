<?php
/**
 * editor.php
 * Permet de controler les éditeur en Admin
 */

// GUTENBERG
// -- disable custom colors
add_theme_support( 'disable-custom-colors' );
// -- remove color palette
add_theme_support( 'editor-color-palette' );
// -- Disabling custom gradients
add_theme_support( 'disable-custom-gradients' );
// -- disable manual font size slider and input box
add_theme_support( 'disable-custom-font-sizes' );
add_theme_support( 'editor-font-sizes', array() );



// TINY MCE
/**
 * Enleve les boutons non désirés de l'éditeur wordpress
 * @link     http://thestizmedia.com/remove-buttons-items-wordpress-tinymce-editor/
 *
 * @param    array    $buttons    The default array of buttons
 * @return   array                The updated array of buttons that exludes some items
 */
function removeMceButtons( $buttons ) {
    $remove_buttons = array(
        'blockquote',
        'alignleft',
        'aligncenter',
        'alignright',
        'spellchecker',
        'dfw',
        'wp_adv',
    );
    foreach ( $buttons as $button_key => $button_value ) {
        if ( in_array( $button_value, $remove_buttons ) ) {
            unset( $buttons[ $button_key ] );
        }
    }
    return $buttons;
}
add_filter( 'mce_buttons', 'removeMceButtons');


/**
 * Enlève les boutons non désirés de la deuxième rangée de l'éditeur de wordpress
 * @link     http://thestizmedia.com/remove-buttons-items-wordpress-tinymce-editor/
 *
 * @param    array    $buttons    The default array of buttons in the kitchen sink
 * @return   array                The updated array of buttons that exludes some items
 */
function removeMceButtons2( $buttons ) {
    $remove_buttons = array(
        'alignjustify',
        'forecolor',
        'strikethrough'
    );
    foreach ( $buttons as $button_key => $button_value ) {
        if ( in_array( $button_value, $remove_buttons ) ) {
            unset( $buttons[ $button_key ] );
        }
    }
    return $buttons;
}
add_filter( 'mce_buttons_2', 'removeMceButtons2');


/**
 * Ajouter les formats CUSTOMS dans l'éditeur de texte
 *
 * @param $styles
 * @return mixed
 */
function addCustomFormats($styles) {
    array_unshift($styles, 'styleselect');
    return $styles;
}
add_filter('mce_buttons_2', 'addCustomFormats');


/**
 * Forcer l'affichage de la deuxième rangée du MCE
 *
 * @param $args
 * @return mixed
 */
function displaySecondRowMCE($args) {
    $args['wordpress_adv_hidden'] = false;
    return $args;
}
add_filter( 'tiny_mce_before_init', 'displaySecondRowMCE' );


/**
 * Les différents formats customs ajoutés à l'éditeur
 *
 * @param $formats
 * @return mixed
 */
function customFormats($formats) {
    $styles = array(
        array(
            'title' => 'Bouton',
            'block' => 'span',
            'classes' => 'button',
            'wrapper' => false
        ),
        array(
            'title' => 'Lien externe',
            'block' => 'span',
            'classes' => 'externe',
            'wrapper' => false
        ),
        array(
            'title' => 'Encadré',
            'block' => 'div',
            'classes' => 'encadre',
            'wrapper' => false
        ),
    );
    $formats['style_formats'] = json_encode($styles);
    return $formats;
}
add_filter( 'tiny_mce_before_init', 'customFormats' );