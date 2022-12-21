<?php
/**
 * header-uqam.php
 */
?>

<header id="mainframe-header" <?php addFaculteClass(); ?>>

    <div id="header-uqam" class="header-uqam container">

        <nav id="skip-links" aria-label="Navigation rapide dans la page">
            <a class="sr-only sr-only-focusable" href="#main-content"><?php _e('Accéder au contenu', 'gabarit-universel'); ?></a>
            <a class="sr-only sr-only-focusable" href="#main-menu"><?php _e('Accéder au menu principal', 'gabarit-universel'); ?></a>
            <a class="sr-only sr-only-focusable" href="#recherche"><?php _e('Accéder à la recherche', 'gabarit-universel'); ?></a>
        </nav>
        <nav id="mobile-skip-links" class="d-block d-md-none" aria-label="Navigation rapide dans la page mobile">
            <a class="sr-only sr-only-focusable" href="#main-content"><?php _e('Accéder au contenu', 'gabarit-universel'); ?></a>
            <a class="sr-only sr-only-focusable" href="#mobileMenuTrigger"><?php _e('Accéder au menu principal', 'gabarit-universel'); ?></a>
        </nav>

        <!-- HEADER FULL SCREEN-->
        <div class="row" id="header-large">
            <div class="col-lg-3 d-none d-lg-block" id="header-left">
                <div class="row">
                    <div class="logo"><?php afficherLogoUqam(); ?></div>
                    <nav id="quick-links" aria-label="Liens rapides"
                         class="align-right d-none d-sm-block"><?php include(get_template_directory() . '/components/liensPlus/liensPlus.php'); ?></nav>
                </div>
            </div>
            <div class="col-lg-9 d-none d-lg-block" id="header-title">
                <div class="row">
                    <div class="site-title col-md-6 col-lg-8"><?php include(get_template_directory() . '/components/titre/titre.php'); ?></div>
                    <div id="recherche" class="col-md-6 col-lg-4 align-right p-0">
                        <?php if (is_active_sidebar('main-search')) {
                            dynamic_sidebar('main-search');
                        } ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- HEADER MOBILE -->
        <div id="header-mobile">
            <div class="d-block d-lg-none">
                <div class="row logo d-flex justify-content-between">
                    <?php afficherLogoUqam(); ?>
                    <?php if ( is_active_sidebar( 'language-switcher' ) ) : ?>
                        <span id="language-switcher"  class="d-block d-lg-none">
		                    <?php dynamic_sidebar( 'language-switcher' ); ?>
                        </span>
                    <?php endif; ?>
                </div>

            </div>
            <div class="d-block d-lg-none" id="sub-header">
                <nav class="row navbar dropdown">
                    <div class="site-title navbar-brand"><?php include(get_template_directory() . '/components/titre/titre.php'); ?></div>
                    <?php include(get_template_directory() . '/components/menuMobile/menuMobile.php'); ?>
                </nav>
            </div>
        </div>

    </div>

</header>