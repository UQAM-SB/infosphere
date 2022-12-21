<?php
/**
 * cleanup.php
 * Enlever des éléemnt dans le <head>
 */

function gu_cleanup_head() {
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
    remove_action('wp_head', 'wp_shortlink_wp_head', 10);
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
}
add_action('init', 'gu_cleanup_head');


// Show less info to users on failed login for security.
// (Will not let a valid username be known.)
function show_less_login_info() {
    $login_error = __('<strong>ERREUR</strong> : les informations de connexion sont invalides ou vous avez oublié de remplir le captcha', 'gabarit-universel');
    return $login_error;
}
add_filter( 'login_errors', 'show_less_login_info' );


// Do not generate and display WordPress version
function gu_remove_generator()  {
    return '';
}
add_filter( 'the_generator', 'gu_remove_generator' );

//Clear unused widgets
function unregister_default_widgets() {
	unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Meta');
	unregister_widget('WP_Widget_Recent_Posts');
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Tag_Cloud');
	unregister_widget('Twenty_Eleven_Ephemera_Widget');
}
add_action('widgets_init', 'unregister_default_widgets', 11);