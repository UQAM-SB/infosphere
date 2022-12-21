<?php
/**
 * home.php
 * Page de la liste des articles lorsqu'on sélectionne "Page statique" dans "Réglages" → "Lecture"
 * et qu'on attribut une page à "Page des articles"
 */

get_template_part( 'template-parts/partials/before', 'main-content' ); ?>

<h1 class="mb-5"><?php echo apply_filters( 'the_title', get_the_title( get_option( 'page_for_posts' ) ) );?></h1>

<?php if(is_home() && !is_front_page())
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>

            <article <?php post_class('mb-5 pb-5 border-bottom'); ?> id="post-<?php the_ID(); ?>">
                <h2 class="entry-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                <?php the_excerpt(); ?>
            </article>

        <?php endwhile; ?>

        <?php get_template_part( 'template-parts/pagination/pagination', '' ); ?>

    <?php else : ?>

        <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
            <h2><?php _e('Aucun résultat trouvé', 'gabarit-universel'); ?></h2>
        </div>

    <?php endif; ?>

<?php get_template_part( 'template-parts/partials/after', 'main-content' ); ?>