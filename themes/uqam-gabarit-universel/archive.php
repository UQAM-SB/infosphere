<?php
/**
 * archives.php
 * Page qui affiche la liste des articles d'une catégorie
 */

get_template_part('template-parts/partials/before', 'main-content'); ?>

<div class="mb-lg-5">
    <?php
    the_archive_title('<h1 class="mb-5">', '</h1>');
    the_archive_description('<div class="taxonomy-description alert alert-secondary mb-5">', '</div>');
    if ( have_posts()) :

        while (have_posts() ) : the_post(); ?>
            <div <?php post_class('mb-5 pb-3 border-bottom'); ?> id="post-<?php the_ID(); ?>">
                <h2 class="entry-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                <?php the_excerpt(); ?>
            </div>
        <?php endwhile;

        get_template_part('template-parts/pagination/pagination', '');

    else : ?>

        <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
            <h2><?php _e('Aucun résultat trouvé', 'gabarit-universel'); ?></h2>
        </div>

    <?php endif; ?>

</div>

<?php get_template_part('template-parts/partials/after', 'main-content'); ?>