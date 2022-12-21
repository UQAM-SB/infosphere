<?php
/**
 * front-page.php
 * Toujours la page d'accueil
 * Peu importe qu'on sélectionne "Page statique" ou "Les derniers articles" dans "Réglages" → "Lecture"
 */

get_template_part( 'template-parts/partials/before', 'main-content' );

if ( have_posts() ) :

    while ( have_posts() ) : the_post();
        get_template_part( 'template-parts/content', 'front-page' );
    endwhile;

endif;

wp_reset_query();

get_template_part( 'template-parts/partials/after', 'main-content' );