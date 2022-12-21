<?php
/**
 * single-services.php
 * Affichage d'un article seul pour les services offerts
 */

get_template_part( 'template-parts/partials/before', 'main-content' ); ?>

<article class="mb-lg-5 pb-3 row">
    <?php // a configurer selon les choix customizer
        get_template_part( 'template-parts/services', '' );
    ?>
</article>

<?php get_template_part( 'template-parts/partials/after', 'main-content' ); ?>