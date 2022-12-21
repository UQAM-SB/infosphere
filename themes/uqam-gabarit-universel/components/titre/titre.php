<?php
/**
 * titre.php
 */

$subtitle = '';

if (get_theme_mod('sous-titre') && get_theme_mod('sous-titre') !== '') {
    $subtitle = 'class=\'large\'';
    ?>
    <h2><?php echo get_theme_mod('sous-titre'); ?></h2>
<?php } ?>

<span <?php echo $subtitle; ?>>
    <a href="<?php echo get_bloginfo('url'); ?>">
        <?php echo get_bloginfo('name'); ?>
    </a>
</span>