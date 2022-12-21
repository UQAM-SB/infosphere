<?php
/**
 * services.php
 * Template part -- services
 */
?>

<div class="col-md-8">

    <?php the_title('<h1 class="mb-4">', '</h1>'); ?>

    <div class="usagers row">
        <div class="col-md-1 usagers-label pl-md-1">Pour</div>
        <div class="col-md-11">
            <?php
            $terms = get_the_terms( get_the_ID(), 'usagers' );
            if ( $terms && ! is_wp_error( $terms ) ) :
                foreach ( $terms as $term ){ ?>
                    <span class="usagers-term"><?php echo $term->name; ?></span>
                    <?php
                }
            endif; ?>
        </div>
    </div>

    <?php
    the_post();
    the_content();

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

</div>

<div class="col-md-4 pr-md-2">
    <?php if( get_field('obt_telephone') || get_field('obt_courriel') || get_field('obt_formulaire') ): ?>
        <div class="bloc_service">
            <h2 class="bloc_service-titre icone_service icone_service-obtenir">Obtenir le service ??? </h2>
            <div class="bloc_service-content">
                <?php if( get_field('obt_telephone') || get_field('obt_courriel') ): ?>
                    <h3>Informations :</h3>
                    <?php if( get_field('obt_telephone') ): ?>
                        <p>
                            <span class="bloc_service-label icone_service icone_service-telephone">Par téléphone</span>
                            <span><?php the_field('obt_telephone'); ?></span>
                        </p>
                    <?php endif; ?>
                    <?php if( get_field('obt_courriel') ): ?>
                        <p>
                            <span class="bloc_service-label icone_service icone_service-courriel">Par courriel</span>
                            <span><a href="mailto:<?php the_field('obt_courriel'); ?>"><?php the_field('obt_courriel'); ?></a></span>
                        </p>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if( get_field('obt_formulaire') ): ?>
                    <h3><?php the_field('label_formulaire'); ?></h3>
                    <p>
                        <span class="icone_service icone_service-formulaire">
                            Remplissez ce <a href="<?php the_field('obt_formulaire'); ?>">formulaire</a>
                        </span>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if( get_field('horaire') ): ?>
        <div class="bloc_service">
            <h2 class="bloc_service-titre icone_service icone_service-horaire">Horaire</h2>
            <div class="bloc_service-content">
                <span><?php the_field('horaire'); ?></span>
            </div>
        </div>
    <?php endif; ?>
    <?php if( get_field('tarifs') ): ?>
        <div class="bloc_service">
            <h2 class="bloc_service-titre icone_service icone_service-tarifs">Tarifs</h2>
            <div class="bloc_service-content">
                <span><?php the_field('tarifs'); ?></span>
            </div>
        </div>
    <?php endif; ?>
    <?php if( get_field('partenaires') ): ?>
        <div class="bloc_service">
            <h2 class="bloc_service-titre icone_service icone_service-partenaires">Partenaires</h2>
            <div class="bloc_service-content">
                <?php if( have_rows('partenaires') ): ?>
                    <ul>
                        <?php while( have_rows('partenaires') ): the_row(); ?>
                            <li>
                                <a href="<?php the_sub_field('url_du_partenaire'); ?>"><?php the_sub_field('nom_du_partenaire'); ?></a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</div>