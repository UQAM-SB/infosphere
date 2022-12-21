<?php
/**
 * menuUsers.php
 */

wp_nav_menu( array(
    'menu' => 'user-menu',
    'container' => 'nav',
    'menu_id' => 'user-menu',
    'menu_class'=>'menu d-none d-lg-block',
    'theme_location'=>'user-menu',
    'fallback_cb'    => false
) );