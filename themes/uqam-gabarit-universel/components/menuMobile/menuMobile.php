<?php
/**
 * menuMobile.php
 * Tout ce qui concerne le menu principal lorsque nous somme dans la version mobile
 */

if (is_active_sidebar('main-search') || is_nav_menu("principal")) {
    ?>

    <button type="button" id="mobileMenuTrigger" class="mobileMenuTrigger menu d-lg-none mr-1 navbar-toggler dropdown-toggle navbar-toggler-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="sr-only"><?php _e('Menu', 'gabarit-universel'); ?></span>
    </button>

    <nav id="mobileMenu" class="mobileMenu dropdown-menu">
        <div class="d-lg-none container">
            <?php if ( is_active_sidebar('main-search') ) {
                get_template_part( 'components/recherche/recherche', 'recherche' );//dynamic_sidebar('main-search');
            } ?>
        </div>

        <?php
        wp_nav_menu(array(
            'fallback_cb' => false,
            'menu' => 'top-menu',
            'container_class' => 'container-fluid',
            'menu_id' => 'mobile-menu',
            'menu_class' => 'menu d-lg-none',
            'theme_location' => 'top-menu'
        ));

        wp_nav_menu(array(
            'fallback_cb' => false,
            'menu' => 'main-menu',
            'container_class' => 'container-fluid',
            'menu_id' => 'mobile-menu',
            'menu_class' => 'menu d-lg-none',
            'theme_location' => 'main-menu'
        ));

        wp_nav_menu(array(
            'fallback_cb' => false,
            'menu' => 'user-menu',
            'container_class' => 'container-fluid',
            'menu_id' => 'mobile-user-menu',
            'menu_class' => 'menu d-lg-none',
            'theme_location' => 'user-menu'
        ));
        ?>
        <button type="button" class="menuMobile_button-fermer close container" aria-label="<?php _e('Fermer le menu', 'gabarit-universel'); ?>"></button>
    </nav>

    <?php
}