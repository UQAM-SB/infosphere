<?php
/**
 * recherche.php
 */
?>

<form class="uqamRecherche a11y d-none d-lg-block" action="<?php echo home_url() . getSearchType('location'); ?>" method="get" role="search">
    <input class="uqamRecherche__champ" type="text" name="<?php echo getSearchType('term'); ?>" value="<?php the_search_query(); ?>" placeholder="<?php _e('Chercher dans ce site', 'gabarit-universel'); ?>" aria-label="<?php _e('Chercher dans ce site', 'gabarit-universel'); ?>">
    <button class="uqamRecherche__choix uqamRecherche_button d-none dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="<?php _e('Choix du type de recherche', 'gabarit-universel'); ?>" type="button"></button>
    <div class="uqamRecherche__choix_conteneur dropdown-menu dropdown-menu-right">
        <button type="button" class="dropdown-item" name="recherche" class="select">
            <span><?php _e('Chercher dans ce site', 'gabarit-universel'); ?></span>
        </button>
        <button type="button" class="dropdown-item" name="recherche-uqam">
            <span><?php _e('Chercher sur uqam.ca', 'gabarit-universel'); ?></span>
        </button>
        <button type="button" class="dropdown-item" name="recherche-web">
            <span><?php _e('Chercher sur le web', 'gabarit-universel'); ?></span>
        </button>
    </div><!--#uqam_conteneur_recherche_choix-->
    <button type="submit" class="uqamRecherche__envoie uqamRecherche_button" aria-label="<?php _e('Soumettre la recherche', 'gabarit-universel'); ?>"></button>
</form>

<form class="uqamRecherche-mobile a11y d-lg-none container py-3 px-0" action="<?php echo home_url() . getSearchType('location'); ?>" method="get" role="search">
    <input class="uqamRecherche__champ-mobile w-100" type="text" name="<?php echo getSearchType('term'); ?>" value="<?php the_search_query(); ?>" placeholder="<?php _e('Chercher dans ce site', 'gabarit-universel'); ?>" aria-label="<?php _e('Chercher dans ce site', 'gabarit-universel'); ?>">
    <button type="submit" class="uqamRecherche__envoie-mobile" aria-label="<?php _e('Soumettre la recherche', 'gabarit-universel'); ?>"></button>
</form>