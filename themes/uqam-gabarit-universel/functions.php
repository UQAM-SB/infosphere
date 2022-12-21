<?php
/**
 * functions.php
 * Fichier qui appel les éléments du dossier "inc"
 */

// On activate - Create Search Pages
require get_template_directory() . '/inc/activate.php';

// Cleanup the <head> for theme development
require get_template_directory() . '/inc/cleanup.php';

// Customizer additions
require get_template_directory() . '/inc/customizer.php';

// Register widget area
require get_template_directory() . '/inc/register.php';

// Fonctions utilitaires pour le thème
require get_template_directory() . '/inc/theme-functions.php';

// Fonctions pour l'éditeur en Admin
require get_template_directory() . '/inc/editor.php';

// Widget pour l'affichage des médias sociaux
require get_template_directory() . '/inc/widget-social-media.php';

// Enqueue scripts and styles
require get_template_directory() . '/inc/enqueues.php';

// Yoast - SEO, Breadcrumbs
require get_template_directory() . '/inc/seo.php';

// Shortcodes
require get_template_directory() . '/inc/shortcodes.php';

// Component Podio.
require get_template_directory() . '/components/podio/podio.init.php';

//Component babillard
require get_template_directory() . '/components/babillard/babillard.php';

//Component actualités
require get_template_directory() . '/components/actualites/actualites.php';

//Component evenements
require get_template_directory() . '/components/evenements/evenements.php';
