<?php
/**
 * enqueues.php
 * Ajoute les styles et les scripts
 */


add_action( 'wp_enqueue_scripts', function () {

    //Styles
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), filemtime( get_template_directory() .'/style.css' ), 'all' );
	wp_enqueue_style('main-style', get_template_directory_uri() . '/dist/main.css', array(), filemtime( get_template_directory() .'/dist/main.css' ), 'all' );

	//Scripts
	wp_enqueue_script('main-script', get_template_directory_uri() . '/dist/main.js', array('jquery'), filemtime( get_template_directory() .'/dist/main.js' ), true );

} );


add_action( 'admin_enqueue_scripts', function () {

    wp_enqueue_style( 'admin-style', get_stylesheet_directory_uri() . '/dist/admin.css', array(), filemtime( get_template_directory() .'/dist/admin.css' ) );
    wp_enqueue_script('admin-script', get_stylesheet_directory_uri() . '/dist/admin.js', array(), filemtime( get_template_directory() .'/dist/admin.js' ), true );

});