<?php
/**
 * menuMain.php
 */

wp_nav_menu( array(
	'fallback_cb' => false,
	'menu' => 'main-menu',
	'container' => 'nav',
	'container_class' => 'menu-menu-container',
	'menu_id' => 'main-menu',
	'menu_class'=>'menu d-none d-lg-block',
	'theme_location'=>'main-menu'
) );