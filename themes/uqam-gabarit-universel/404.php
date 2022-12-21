<?php
/**
 * 404.php
 * Page qui s'affiche lors d'une erreur 404
 */

get_header(); ?>
<div id="mainframe-body-outer" class="<?php bannerFeatures() ;?>">
    <div id="mainframe-body-inner" class="menu-bg-color">
        <div id="mainframe-body" class="container mainframe-body">
            <div class="row">
                <div id="content-left" class="col-lg-3 d-none d-lg-block">
                    <?php locate_template( '/components/menuMain/menuMain.php', true ); ?>
                    <?php locate_template( '/components/menuUsers/menuUsers.php', true ); ?>
                    <?php locate_template( '/components/sidebarSocialMedia/sidebarSocialMedia.php', true ); ?>
                    <?php locate_template( '/components/sidebarPromo/sidebarPromo.php', true ); ?>
                </div><!-- content-left -->
                <div id="content-center" class="content-center col-lg-9">
                    <section class="row mt-7 mt-lg-10">
                        <main id="main-content" class="col-lg-12 <?php colOrderMain(); ?>mb-6 mb-lg-6">
                            <div class="wrap">
                                <div id="primary" class="content-area">
                                    <main id="main" class="site-main" role="main">
                                        <section class="error-404 not-found">
                                            <div class="page-content">
                                                <div class="message">
                                                    <div class="col-12 message_texte">
                                                        <h2><?php _e('La page que vous cherchez n\'a pas été trouvée sur notre serveur.', 'Gabarit_Universel'); ?></h2>
                                                        <ul>
                                                            <li><?php _e('Si vous avez saisi l\'adresse vous-même, vérifiez que vous n\'avez pas commis de faute de frappe.', 'Gabarit_Universel'); ?></li>
                                                            <li><?php _e('S\'il s\'agit d\'un lien sur lequel vous avez cliqué, vous pouvez informer le responsable de la page où se trouve ce lien.', 'Gabarit_Universel'); ?></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-xs-3 hidden-sm col-md-3 col-lg-3"></div>
                                                    <div class="clear"></div>
                                                </div>
                                                <div id="options-404" class="text-center">
                                                <a class="btn btn-primary text-white btn-block" href="<?php echo esc_url( home_url( '/' ) ); ?>" role="button"><?php _e('Page d’accueil', 'Gabarit_Universel'); ?></a>
                                                <a class="btn btn-primary text-white btn-block" href="<?php echo esc_url( home_url( '/' ) ); ?>recherche-uqam" role="button"><?php _e('Moteur de recherche', 'Gabarit_Universel'); ?></a>
                                                <a class="btn btn-primary text-white btn-block" href="http://www.repertoire.uqam.ca/" role="button" style="min-width: 12.6rem"><?php _e('Bottin', 'Gabarit_Universel'); ?></a>
                                                <?php
                                                if ( this_post_exists('nous-joindre', 'page') ) { ?>
                                                    <a class="btn btn-primary text-white btn-block" role="button" href="<?php get_bloginfo( 'url' ); ?>/nous-joindre"><?php _e('Nous joindre', 'Gabarit_Universel'); ?></a>
                                                <?php } elseif ( get_theme_mod('courriel')) { ?>
                                                    <a class="btn btn-primary text-white btn-block" role="button" href="mailto:<?php get_theme_mod('courriel') ?>"><?php _e('Nous joindre', 'Gabarit_Universel'); ?></a>
                                                <?php } ?>
                                                </div>
                                            </div><!-- .page-content -->
                                        </section><!-- .error-404 -->
                                    </main><!-- #main -->
                                </div><!-- #primary -->
                            </div><!-- .wrap -->
                        </main>
                    </section>
                </div><!-- #content-center -->
            </div>
        </div><!-- #mainframe-body -->
<?php
get_footer();