<?php
/**
 * menuUsers.php
 */

wp_nav_menu( array(
    'menu' => 'user-menu',
    'container' => 'nav',
    'container_class' => 'menu-menu-container',
    'container_id' => 'complement-nav',
    'menu_id' => 'user-menu',
    'menu_class'=>'menu',
    'theme_location'=>'user-menu',
    'fallback_cb'    => false,
    'items_wrap' => '<h2>En complément</h2><ul id="%1$s" class="%2$s">%3$s</ul>'
) );