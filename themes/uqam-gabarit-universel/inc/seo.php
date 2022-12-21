<?php

/**
 * Use Yoast Title & Breadcrumbs
 */

current_theme_supports(  'yoast-seo-breadcrumbs' );
add_theme_support('title-tag', 'yoast-seo-breadcrumbs');

add_filter( 'wpseo_breadcrumb_separator', function( $separator ) {
    return '</li><li>';
} );

//Ajouter UQAM au début du fil ariane
add_filter( 'wpseo_breadcrumb_links', function ( $links ) {
    $name = getTitreAbrege();
    $url = get_bloginfo('url');
    array_unshift($links,
                  ['text' => 'UQAM', 'url' => 'https://uqam.ca', 'allow_html' => true],
                  ['text' => 'Bibliothèques', 'url' => 'https://bibliotheques.uqam.ca', 'allow_html' => true],
                  ['text' => $name, 'url' => $url, 'allow_html' => true]
    );

    if(is_front_page()){
        array_pop($links);
        array_push($links, ['text' => 'Accueil']);
    }

    return $links;
} );


// Config https://developers.google.com/search/docs/data-types/sitelinks-searchbox
add_filter( 'wpseo_json_ld_search_url', function () {
    return home_url() . getSearchType('location') . '?' . getSearchType('term') . '={search_term_string}';
} );

// WPSEO defaults
add_filter( 'wpseo_defaults', function( $defaults, $option_name ) {
    if( 'wpseo_titles' === $option_name ){
        //UQAM
        $defaults['company_or_person'] = 'company';
        $defaults['company_name'] = get_bloginfo('name');
        $defaults['company_logo'] = 'https://gabarit-adaptatif.uqam.ca/statique/images/logo-uqam.jpg';
        $defaults['company_logo_id'] = '1';
        $defaults['separator'] = 'sc-pipe';
        $defaults['title-home-wpseo'] = '%%sitename%% %%sep%% UQAM';
        $defaults['title-author-wpseo'] = '%%name%% %%sep%% %%sitename%% %%sep%% UQAM';
        $defaults['title-archive-wpseo'] = '%%page%% %%sep%% %%sitename%% %%sep%% UQAM';
        $defaults['title-search-wpseo'] = 'Résultats pour "%%searchphrase%%" %%sep%% %%sitename%% %%sep%% UQAM';
        $defaults['title-404-wpseo'] = 'Page non trouvée %%sep%% %%sitename%% %%sep%% UQAM';
        $defaults['title-post'] = '%%title%% %%page%% %%sep%% %%sitename%% %%sep%% UQAM';
        $defaults['title-page'] = '%%title%% %%page%% %%sep%% %%sitename%% %%sep%% UQAM';
        $defaults['title-tax-category'] = '%%term_title%% %%page%% %%sep%% %%sitename%% %%sep%% UQAM';
        $defaults['title-tax-post_tag'] = '%%term_title%% %%page%% %%sep%% %%sitename%% %%sep%% UQAM';
        $defaults['title-tax-post_format'] = '%%term_title%% %%page%% %%sep%% %%sitename%% %%sep%% UQAM';
        $defaults['breadcrumbs-enable'] = '1';
        $defaults['breadcrumbs-sep'] = '';
        $defaults['disable-author'] = '1';
        $defaults['disable-date'] = '1';
        $defaults['disable-post_format'] = '1';
        $defaults['display-metabox-tax-post_format'] = '0';
        $defaults['noindex-tax-post_tag'] = '1';
        $defaults['stripcategorybase'] = true;
    }
    return $defaults;
}, 20, 2);

// Ajouter UQAM comme organisation parente
add_filter( 'wpseo_schema_organization', function ( $data ) {
    $logo_uqam = 'https://gabarit-adaptatif.uqam.ca/statique/images/logo-uqam.jpg';
    if ( empty( $data['logo']['url']) ) {
        $data['logo']['url'] = $logo_uqam;
    }
    if ( get_bloginfo('name') != getTitreAbrege() ) {
        $data['alternateName'] = getTitreAbrege();
    }
    $data['parentOrganization'] = array(
        '@type'             => 'EducationalOrganization',
        '@id'               => 'https://uqam.ca/#organization',
        'name'              => 'Université du Québec à Montréal',
        'url'               => 'https://uqam.ca',
        'alternateName'     => 'UQAM',
        'logo'              => $logo_uqam,
    );
    return $data;
}, 20 );

// Accronyme d'unité
add_filter( 'wpseo_schema_website', function( $data ) {
    if ( get_bloginfo('name') != getTitreAbrege() ) {
        $data['alternateName'] = getTitreAbrege();
    }
    return $data;
}, 20 );

//add_filter( 'yoast_seo_development_mode', '__return_true' );

// Metabox Yoast en bas
add_filter( 'wpseo_metabox_prio', function () {
    return 'low';
} );
