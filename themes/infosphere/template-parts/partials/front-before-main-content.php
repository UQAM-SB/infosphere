<?php
/**
 * before-main-content.php
 * Template part -- before-main-content
 * Fichier qui est toujours appelé avant le contenu principal
 */

 get_header(); ?>
<!-- before-main-content.php -->
<?php if ( has_nav_menu( 'top-menu' ) === true ) : ?>
<div class="top-menu-wrapper"><?php locate_template( '/components/menuHorizontal/menuHorizontal.php', true ); ?></div>
<!-- top-menu-wrapper -->
<?php endif; ?>
<div id="mainframe-body-outer" class="<?php bannerFeatures() ;?>">
    <div id="mainframe-body-inner" class="menu-bg-color">
        <?php if ( is_active_sidebar( 'banner-area-full' ) ) : ?>
            <div id="banner-zone-full" role="banner" class="banner-zone-full">
                <?php dynamic_sidebar( 'banner-area-full' ); ?>
            </div>
        <?php endif; ?>
        <div id="mainframe-body" class="container mainframe-body">
            <div class="row">
            <?php if( gu_has_left_col() ) : ?>
             <!--   <div id="content-left" class="col-lg-3 order-2 order-lg-1 pt-lg-10 <?php if(get_theme_mod('majuscule-menu')) : ?>majuscule-menu<?php endif; ?>">
                    <?php locate_template( '/components/menuMain/menuMain.php', true ); ?>
                    <?php locate_template( '/components/menuUsers/menuUsers.php', true ); ?>
                    <?php locate_template( '/components/sidebarSocialMedia/sidebarSocialMedia.php', true ); ?>
                    <?php locate_template( '/components/sidebarPromo/sidebarPromo.php', true ); ?>
                </div>--><!-- content-left -->
            <?php endif; ?>

                <div id="content-center" class="content-center order-1 <?php echo (gu_has_left_col() === true ? 'order-1 col-lg-8 order-lg-2 offset-md-2' : 'col-lg-12'); ?>">

                    <?php if ( is_active_sidebar( 'banner-area' ) ) : ?>
                        <header id="banner-zone" role="banner" class="banner-zone row <?php echo is_active_sidebar( 'featured-area' ) ? 'mb-6' : 'mb-6 mb-lg-10'; ?>">
                            <?php dynamic_sidebar( 'banner-area' ); ?>
                        </header>
                    <?php endif; ?>

                    <?php if ( is_active_sidebar( 'featured-area' ) ) : ?>
                        <section class="row">
                            <div id="notice" class="col-md-12 <?php echo is_active_sidebar( 'banner-area' ) ? 'mt-0 mb-6' : 'mt-6 mt-lg-10'; ?>">
                                <?php dynamic_sidebar( 'featured-area' ); ?>
                            </div>
                        </section>
                    <?php endif; ?>

                    <section class="row <?php echo is_active_sidebar( 'banner-area' ) ? 'mt-0' : 'mt-6 mt-lg-10'; ?>">
                        <main id="<?php echo 'main-content'; ?>" class="<?php echo is_active_sidebar( 'right-sidebar' ) ? 'col-lg-8' : 'col-lg-12'; ?> <?php echo ( is_home() || is_front_page() ) ? 'main-content-front ' : 'main-content '; ?><?php echo ( is_front_page() ) ? colOrderMain() : ' pl-lg-7 pr-lg-0'; ?> mb-0 mb-lg-6">
                            <?php if ( is_active_sidebar( 'main-content-header-area' ) ) : ?>
                                <div id="main-content-header">
                                    <?php dynamic_sidebar( 'main-content-header-area' ); ?>
                                </div>
                            <?php endif; ?>