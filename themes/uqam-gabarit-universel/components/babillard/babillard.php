<?php
/*
 *  Widget - Babillard
 */
function babillard_widget() {
	include('babillard-widget.php' );
	register_widget( 'WP_Widget_babillard' );
}
add_action( 'widgets_init', 'babillard_widget' );