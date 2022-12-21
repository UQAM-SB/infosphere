<?php
/**
 * content-front-page.php
 * Template part - content front page
 * Appelé par front-page.php
 * Toujours la page d'accueil
 * Peu importe qu'on sélectionne "Page statique" ou "Les derniers articles" dans "Réglages" → "Lecture"
 */

if(!get_theme_mod('hide-home-content')){ ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('content-front-page mb-6 pb-3 border-bottom'); ?>>

        <header class="entry-header">
            <?php the_title( '<h1>', '</h1>' ); ?>
        </header><!-- .entry-header -->

        <?php the_post_thumbnail(); ?>

        <div class="entry-content">
            <?php
            // translators: %s: Name of current post
            the_content( sprintf(
                __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'gabarit-universel' ),
                get_the_title()
            ) );

            wp_link_pages( array(
                'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'gabarit-universel' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
                'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'gabarit-universel' ) . ' </span>%',
                'separator'   => '<span class="screen-reader-text">, </span>',
            ) );
            ?>
        </div><!-- .entry-content -->

        <footer class="entry-footer">
            <?php
            edit_post_link(
                sprintf(
                /* translators: %s: Name of current post */
                    __( 'Edit<span class="screen-reader-text"> "%s"</span>', 'gabarit-universel' ),
                    get_the_title()
                ),
                '<p class="edit-link">',
                '</p>'
            );
            ?>
        </footer><!-- .entry-footer -->

    </article><!-- #post-## -->

<?php }
