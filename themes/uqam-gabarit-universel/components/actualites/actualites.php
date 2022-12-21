<?php
/*
 *  Widget - Actualites
 */
function actualites_widget() {
	include('actualites-widget.php' );
	register_widget( 'WP_Widget_actualites' );
}
add_action( 'widgets_init', 'actualites_widget' );