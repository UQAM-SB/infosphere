<?php
/**
 * menuHorizontal.php
 */
wp_nav_menu( array(
    'fallback_cb' => false,
    'menu' => 'top-menu',
    'container' => 'nav',
    'container_class' => 'top-menu container',
    'menu_id' => 'horizontal-menu',
    'menu_class'=> 'horizontal-menu nav justify-content-start d-none d-lg-flex ',
    'theme_location'=> 'top-menu',
    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
    'walker' => new WP_Bootstrap_Navwalker(),
) );