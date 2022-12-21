<?php
/**
 * footer-uqam.php
 */
?>

<div id="foot-uqam" class="col-lg-3 py-2 d-flex align-items-center order-1 order-lg-0">
    <p class="mb-0"><a href="https://uqam.ca"><?php _e('UQAM - Université du Québec à Montréal', 'gabarit-universel'); ?></a></p>
</div>
<div id="foot-info" class="col-lg-5 py-2 d-flex align-items-center order-0 order-lg-1">
    <ul class="list-inline mb-0">
        <li class="list-inline-item">
            <a href="<?php bloginfo('url'); ?>"><?php echo getTitreAbrege(); ?></a>
        </li>

        <?php
        if (this_post_exists('nous-joindre', 'page')) {
            echo '<li class="list-inline-item"><a href="' . get_bloginfo('url') . '/nous-joindre">Nous joindre</a></li>';
        } elseif (get_theme_mod('courriel')) {
            echo '<li class="list-inline-item"><a href="mailto:' . get_theme_mod('courriel') . '">' . get_theme_mod('courriel') . '</a></li>';
        } else {
            echo '<li class="list-inline-item d-none"><a href="https://uqam.ca/nous-joindre/">UQAM</a></li>';
        };
        ?>

    </ul>
</div>
<div id="foot-a11y" class="col-lg-4 pt-2 pb-sp d-flex align-items-center order-2 justify-content-end">
    <p class="mb-0"><a href="https://uqam.ca/accessibilite" class="link-a11y"><?php _e('Accessibilité Web', 'gabarit-universel'); ?></a></p>
</div>