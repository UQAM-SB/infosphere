<?php
/**
 * activate.php
 */

/**
 * the_slug_exists()
 * param: $post_name
 * Regarde si le slug existe
 */
function the_slug_exists( $post_name ) {

    global $wpdb;
    if ( $wpdb->get_row("SELECT post_name FROM wp_posts WHERE (post_name = '" . $post_name . "') and (post_type = 'page')", 'ARRAY_A') ) {
        return true;
    } else {
        return false;
    }

}


/**
 * creation_page()
 * param: $titre, $slug, $content, $code_cx = NULL
 * Creation des pages
 */
function creation_page( $titre, $slug, $content, $code_cx = NULL ) {

    if (empty($content) && isset($code_cx)) {
        //creation d'une page de recherche
        $content = "<!-- wp:html --><script async src='https://cse.google.com/cse.js?cx=$code_cx'></script><div class='gcse-search'></div><!-- /wp:html -->";
    }
    $blog_page_title = $titre;
    $blog_page_content = $content;
    $blog_page_check = get_page_by_title($blog_page_title, OBJECT);
    $blog_page = array(
        'post_type' => 'page',
        'post_title' => $blog_page_title,
        'post_content' => $blog_page_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => $slug
    );
    if ( !isset($blog_page_check->ID) && !the_slug_exists($slug) ) {
        wp_insert_post($blog_page);
        error_log('if pass should insert post');
    }
}


/**
 * theme_setup_options()
 * param:
 * Setup des options de base du thème lors de l'activation
 */
function theme_setup_options() {

    // Page de présentation
    creation_page('Présentation du service', 'presentation', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar, enim sit amet dignissim feugiat, turpis leo tristique turpis, vel placerat nunc sapien suscipit metus. Fusce sagittis vulputate mauris, eget cursus lacus tristique sed. Curabitur nec porta neque. Cras ac lectus id dui commodo euismod. Nunc tempus volutpat semper.');

    // Page de recherche
    creation_page('Recherche', 'recherche', '', '++code:cse++');

    // Page de recherche UQAM
    creation_page('Recherche UQAM', 'recherche-uqam', '', '002288220259767585485:kxjw6chsxpo');

    // Page de recherche Web
    creation_page('Recherche web', 'recherche-web', '', '002288220259767585485:by6oj3_eleq');

    // Setup Yoast SEO
    if ( function_exists('wpseo_auto_load') ) {

        //Get entire array
        $wpseo_titles = get_option('wpseo_titles');
        $wpseo_titles['forcerewritetitle'] = 'on';
        $wpseo_titles['separator'] = 'sc-pipe';
        $wpseo_titles['title-home-wpseo'] = '%%sitename%% %%page%% %%sep%% UQAM';
        $wpseo_titles['breadcrumbs-enable'] = 'on';
        $wpseo_titles['breadcrumbs-sep'] = '';
        $wpseo_titles['breadcrumbs-home'] = '';

        //Update entire array
        update_option('wpseo_titles', $wpseo_titles);
    }

    //Widget Recherche dans la zone Recherche
    $active_sidebars = get_option('sidebars_widgets'); //get all sidebars and widgets
    if (isset($active_sidebars['main-search']) && empty($active_sidebars['main-search'])) {
        $active_sidebars['main-search'] = array('search-1'); //add a widget to sidebar
        update_option('sidebars_widgets', $active_sidebars);
    }

    //Configurer les permaliens
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure('/%category%/%postname%/');

}

add_action("after_switch_theme", "theme_setup_options");