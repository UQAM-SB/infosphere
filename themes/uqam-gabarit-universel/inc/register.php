<?php
/**
 * register.php
 * Fichier pour enregistrer les différents élément du thème (Menu, Widget)
 */

/**
 * Register Custom Navigation Walker
 */
if ( ! function_exists( 'register_navwalker' ) ) {
    function register_navwalker() {
        require_once get_template_directory() . '/components/wpBootstrapNavwalker/class-wp-bootstrap-navwalker.php';
    }
}

add_action( 'after_setup_theme', 'register_navwalker' );
// MENUS
register_nav_menus( array(
    'main-menu' => __('Menu vertical'),
    'top-menu' => __('Menu horizontal'),
    'user-menu' => __('Menu secondaire (par public)'),
) );


// WIDGETS
add_action( 'widgets_init', 'registerWidgets' );
if ( ! function_exists( 'registerWidgets' ) ) {

    // Initializes themes widgets
    function registerWidgets() {
        register_sidebar( array(
            'name'          => __( 'En-tête : recherche', 'gabarit-universel' ),
            'id'            => 'main-search',
            'description'   => 'Zone pour la boîte de recherche.',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );
	    register_sidebar( array(
		    'name'          => __( 'En-tête : sélecteur de langue', 'gabarit-universel' ),
		    'id'            => 'language-switcher',
		    'description'   => 'Zone pour le sélecteur de langue.',
		    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		    'after_widget'  => '</aside>',
		    'before_title'  => '<h3 class="widget-title">',
		    'after_title'   => '</h3>',
	    ) );
        register_sidebar( array(
            'name'          => __( 'Section gauche : médias sociaux', 'gabarit-universel' ),
            'id'            => 'social-media-sidebar',
            'description'   => 'Zone pour l’affichage des médias sociaux.',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );
        register_sidebar( array(
            'name'          => __( 'Section gauche : vignettes promos', 'gabarit-universel' ),
            'id'            => 'promo-sidebar',
            'description'   => 'Zone pour l’affichage des vignettes promotionnelles.',
            'before_widget' => '<aside id="%1$s" class="promo-sidebar widget %2$s mx-3"><div class="promo">',
            'after_widget'  => '</div></aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );
        register_sidebar( array(
            'name'          => __( 'Section pleine largeur : bannière', 'gabarit-universel' ),
            'id'            => 'banner-area-full',
            'description'   => 'Zone qui prend la largeur de la fenêtre pour mettre en évidence une image, un caroussel, etc.',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );
        register_sidebar( array(
            'name'          => __( 'Section principale : bannière', 'gabarit-universel' ),
            'id'            => 'banner-area',
            'description'   => 'Zone pour mettre en évidence une image, un caroussel, etc.',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );
        register_sidebar( array(
            'name'          => __( 'Section principale : en vedette', 'gabarit-universel' ),
            'id'            => 'featured-area',
            'description'   => 'Zone pour les signalements importants (ex. messages d’alerte)',
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '<h4 class="alert-heading">',
            'after_title'   => '</h4>',
        ) );
        register_sidebar( array(
            'name'          => __( 'Section centrale : en-tête de contenu', 'gabarit-universel' ),
            'id'            => 'main-content-header-area',
            'description'   => 'Zone située dans l’en-tête de la section contenu.',
            'before_widget' => '<aside id="%1$s" class="widget %2$s mb-8">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title mt-0 mb-6">',
            'after_title'   => '</h3>',
        ) );
        register_sidebar( array(
            'name'          => __( 'Section centrale : pied de page de contenu', 'gabarit-universel' ),
            'id'            => 'main-content-footer-area',
            'description'   => 'Zone située dans le pied de page de la section contenu.',
            'before_widget' => '<aside id="%1$s" class="widget %2$s mb-6 pb-3">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title mt-0 mb-6">',
            'after_title'   => '</h3>',
        ) );
        register_sidebar( array(
            'name'          => __( 'Section droite : varia', 'gabarit-universel' ),
            'id'            => 'right-sidebar',
            'description'   => 'Zone pour l’affichage de contenus variés.',
            'before_widget' => '<aside id="%1$s" class="widget %2$s mb-6 pb-3">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title mt-0 mb-6">',
            'after_title'   => '</h3>',
        ) );
    }
}