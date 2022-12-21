<?php
/**
 * single.php
 * Affichage d'un article seul
 */

get_template_part( 'template-parts/partials/before', 'main-content' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class("mb-lg-5 pb-3 pr-lg-3"); ?>>
    <?php // a configurer selon les choix customizer
    if (have_posts()) : while (have_posts()) :
        the_title('<h1 class="mb-4">', '</h1>');
        the_post();
        the_content();

        edit_post_link(
            sprintf(
            // translators: %s: Name of current post
                __( 'Edit<span class="screen-reader-text"> "%s"</span>', 'gabarit-universel' ),
                get_the_title()
            ),
            '<p class="edit-link">',
            '</p>'
        );

    endwhile;endif;
    // Output comments wrapper if it's a post, or if comments are open,
    // or if there's a comment number – and check for password.
    if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
        ?>

        <div class="comments-wrapper section-inner">
            <?php comments_template(); ?>
        </div><!-- .comments-wrapper -->

        <?php
    }
    ?>
</article>

<?php get_template_part( 'template-parts/partials/after', 'main-content' ); ?>