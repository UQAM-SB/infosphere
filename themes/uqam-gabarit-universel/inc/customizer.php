<?php
/**
 * customizer.php
 * Permet d'ajouter/éditer des élément dans la section "Personaliser" de l'admin de Wordpress
 */


/**
 * removeCustomizerControls()
 * @param $wp_customize
 * Retire les paramêtres par défaut inutiles du customizer de Wordpress
 */
function removeCustomizerControls($wp_customize) {

    $wp_customize->remove_control('blogdescription');
    $wp_customize->remove_section('static_front_page');

}
add_action('customize_register', 'removeCustomizerControls');


/**
 * Identité du site Web
 * addHeaderControls()
 * @param $wp_customize
 * Ajoute les contrôles dans la section "Identité du site Web"
 */
function addHeaderControls($wp_customize) {

    //Sous-titre
    $wp_customize->add_setting('sous-titre', array(
        'default' => '',
    ));
    $wp_customize->add_control('sous-titre', array(
        'label' => __('Sous-titre du site Web (optionnel)', 'gabarit-universel'),
        'section' => 'title_tagline',
        'settings' => 'sous-titre',
        'type' => 'text',
    ));

	//Sous-titre
	$wp_customize->add_setting('titre-abrege', array(
		'default' => '',
	));
	$wp_customize->add_control('titre-abrege', array(
		'label' => __('Titre abrégé / acronyme', 'gabarit-universel'),
		'section' => 'title_tagline',
		'settings' => 'titre-abrege',
		'type' => 'text',
	));

    //Choix de faculté
    $wp_customize->add_setting('faculte', array(
        'default' => 'uqam',
    ));
    $wp_customize->add_control('faculte', array(
        'label' => __('Choix de faculté', 'gabarit-universel'),
        'section' => 'title_tagline',
        'settings' => 'faculte',
        'type' => 'select',
        'choices' => array(
            'uqam' => __('UQAM', 'gabarit-universel'),
            'esg' => __('École des sciences de la gestion', 'gabarit-universel'),
            'com' => __('Faculté de communication', 'gabarit-universel'),
            'pol' => __('Faculté de science politique et de droit', 'gabarit-universel'),
            'art' => __('Faculté des arts', 'gabarit-universel'),
            'sci' => __('Faculté des sciences', 'gabarit-universel'),
            'edu' => __('Faculté des sciences de l\'éducation', 'gabarit-universel'),
            'fsh' => __('Faculté des sciences humaines', 'gabarit-universel'),
            'vie' => __('Vie étudiante', 'gabarit-universel'),
        ),
    ));

    //Courriel du footer
    $wp_customize->add_setting('courriel', array(
        'default' => 'soutienweb@uqam.ca',
    ));
    $wp_customize->add_control('courriel', array(
        'label' => __('Courriel du footer', 'gabarit-universel'),
        'section' => 'title_tagline',
        'settings' => 'courriel',
        'type' => 'text',
    ));

}
add_action('customize_register', 'addHeaderControls');


/**
 * Options générales
 * addLayoutGeneralControls()
 * @param $wp_customize
 * Ajoute les contrôles pour le visuel général
 */
function addLayoutGeneralControls($wp_customize) {

    $wp_customize->add_section('layout-general', array(
        'title' => __('Options générales', 'gabarit-universel'),
        'description' => __('Affecte uniquement les élément dans le contenu central', 'gabarit-universel'),
        'priority' => 20,
    ));

    //Couleur des titres
    $wp_customize->add_setting('couleur-titre', array(
        'default' => '#333333',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'couleur-titre', array(
        'label' => __('Couleur des titres', 'gabarit-universel'),
        'section' => 'layout-general',
        'settings' => 'couleur-titre',
    )));

    //Couleur du texte
    $wp_customize->add_setting('couleur-texte', array(
        'default' => '#333333',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'couleur-texte', array(
        'label' => __('Couleur du texte', 'gabarit-universel'),
        'section' => 'layout-general',
        'settings' => 'couleur-texte',
    )));

    //Couleur des liens
    $wp_customize->add_setting('couleur-liens', array(
        'default' => '#007abb',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'couleur-liens', array(
        'label' => __('Couleur des hyperliens', 'gabarit-universel'),
        'section' => 'layout-general',
        'settings' => 'couleur-liens',
    )));

    //Couleur des accordéons
    $wp_customize->add_setting('couleur-accordeons', array(
        'default' => '#efefef',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'couleur-accordeons', array(
        'label' => __('Accordéons : Couleur', 'gabarit-universel'),
        'section' => 'layout-general',
        'settings' => 'couleur-accordeons',
    )));

    //Couleur des accordéons-actifs
    $wp_customize->add_setting('couleur-accordeons-alt', array(
        'default' => '#333',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'couleur-accordeons-alt', array(
        'label' => __('Accordéons : Couleur alt', 'gabarit-universel'),
        'section' => 'layout-general',
        'settings' => 'couleur-accordeons-alt',
    )));

    //Couleur des accordéons-texte
    $wp_customize->add_setting('couleur-accordeons-text', array(
        'default' => '#FFF',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'couleur-accordeons-text', array(
        'label' => __('Accordéons : Couleur du texte', 'gabarit-universel'),
        'section' => 'layout-general',
        'settings' => 'couleur-accordeons-text',
    )));

    //Choix de type de bannière
    $wp_customize->add_setting('type-banniere', array(
        'default' => 'pleine',
    ));
    $wp_customize->add_control('type-banniere', array(
        'label' => __('Bannière : Type', 'gabarit-universel'),
        'description' => __('L\'option "Compacte" réduit la hauteur de la bannière dans les pages secondaires', 'gabarit-universel'),
        'section' => 'layout-general',
        'settings' => 'type-banniere',
        'type' => 'select',
        'choices' => array(
            'pleine' => __('Pleine grandeur', 'gabarit-universel'),
            'compact' => __('Compacte', 'gabarit-universel'),
        ),
    ));

    //Bannière background Hauteur
    $wp_customize->add_setting('hauteur-fond-banniere', array(
        'default' => '260px',
    ));
    $wp_customize->add_control('hauteur-fond-banniere', array(
        'label' => __('Bannière : Hauteur', 'gabarit-universel'),
        'section' => 'layout-general',
        'settings' => 'hauteur-fond-banniere',
        'type' => 'text',
    ));

    //Bannière couleur background
    $wp_customize->add_setting('couleur-fond-banniere', array(
        'default' => '#fff',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'couleur-fond-banniere', array(
        'label' => __('Bannière : Couleur de fond', 'gabarit-universel'),
        'section' => 'layout-general',
        'settings' => 'couleur-fond-banniere',
    )));

    //Bannière image background
    $wp_customize->add_setting('image-fond-banniere', array(
        'default' => '',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'image-fond-banniere', array(
        'label' => __('Bannière : Image de fond', 'gabarit-universel'),
        'section' => 'layout-general',
        'settings' => 'image-fond-banniere',
    )));

}
add_action('customize_register', 'addLayoutGeneralControls');


/**
 * Options Accueil
 * addLayoutHomeControls()
 * @param $wp_customize
 * Ajoute les contrôles pour le visuel de la page d'accueil
 */
function addLayoutHomeControls($wp_customize) {

    $wp_customize->add_section('layout-accueil', array(
        'title' => __('Options accueil', 'gabarit-universel'),
        'priority' => 25,
    ));

    //Masquer le contenu de la page statique / Accueil
    $wp_customize->add_setting('hide-home-content', array(
        'default' => 0,
        'sanitize_callback' => 'themeslug_sanitize_checkbox',
    ));
    $wp_customize->add_control('hide-home-content', array(
        'label' => __('Masquer la zone d\'introduction et son contenu', 'gabarit-universel'),
        'section' => 'layout-accueil',
        'settings' => 'hide-home-content',
        'type' => 'checkbox',
    ));

    function themeslug_sanitize_checkbox($checked) {
        // Boolean check.
        return ((isset($checked) && true == $checked) ? true : false);
    }

    //Ajouter l'ordre des colonnes
    $wp_customize->add_setting('ordre-colonnes', array(
        'default' => '',
    ));
    $wp_customize->add_control('ordre-colonnes', array(
        'label' => __('Ordre des colonnes', 'gabarit-universel'),
        'description' => __('Uniquement s\'il y a un widget actif dans la "Section droite : varia"', 'gabarit-universel'),
        'section' => 'layout-accueil',
        'settings' => 'ordre-colonnes',
        'type' => 'select',
        'choices' => array(
            '' => __('Normales'),
            'inv-d' => __('Inversés desktop'),
            'inv-m' => __('Inversés mobiles'),
        ),
    ));

    //Couleur des titres de section / Accueil
    $wp_customize->add_setting('couleur-titre-accueil', array(
        'default' => '#fff',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'couleur-titre-accueil', array(
        'label' => __('Couleur des titres de section central', 'gabarit-universel'),
        'section' => 'layout-accueil',
        'settings' => 'couleur-titre-accueil',
    )));

    //Couleur d'arrière-plan des titres / Accueil
    $wp_customize->add_setting('couleur-bg-titre-accueil', array(
        'default' => '#4c4c4c',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'couleur-bg-titre-accueil', array(
        'label' => __('Couleur d&#8217;arrière-plan des titres de section central', 'gabarit-universel'),
        'section' => 'layout-accueil',
        'settings' => 'couleur-bg-titre-accueil',
    )));

    //Couleur d'arrière-plan des titres cliquables / Accueil
    $wp_customize->add_setting('couleur-bg-lien-titre-accueil', array(
        'default' => '#4c4c4c',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'couleur-bg-lien-titre-accueil', array(
        'label' => __('Couleur d&#8217;arrière-plan des titres de section cliquables', 'gabarit-universel'),
        'section' => 'layout-accueil',
        'settings' => 'couleur-bg-lien-titre-accueil',
    )));

    //Couleur d'arrière-plan des icônes cliquables / Accueil
    $wp_customize->add_setting('couleur-bg-icone-titre-accueil', array(
        'default' => 'false',
    ));
    $wp_customize->add_control('couleur-bg-icone-titre-accueil', array(
        'label' => __('Couleur des icônes cliquables', 'gabarit-universel'),
        'section' => 'layout-accueil',
        'settings' => 'couleur-bg-icone-titre-accueil',
        'type' => 'radio',
        'choices' => array(
            'white' => __('Blanc'),
            'dark' => __('Noir'),
        ),
    ));

}
add_action('customize_register', 'addLayoutHomeControls');


/**
 * Options Menu
 * addMainMenuControls()
 * @param $wp_customize
 * Ajoute les contrôles pour les menus
 */
function addMainMenuControls($wp_customize) {

    //Ajouter le paneau "Personnalisation des menus"
    $wp_customize->add_section('main-menu', array(
        'title' => __('Options des menus', 'gabarit-universel'),
        'priority' => 30,
    ));

    //Vertical : Couleur de typo et puces du menu
    $wp_customize->add_setting('couleur-typo', array(
        'default' => '#000',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'couleur-typo', array(
        'label' => __('Vertical : Couleur de la  police', 'gabarit-universel'),
        'section' => 'main-menu',
        'settings' => 'couleur-typo',
    )));

    //Vertical : Couleur de fond du menu
    $wp_customize->add_setting('couleur-menu', array(
        'default' => '#fff',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'couleur-menu', array(
        'label' => __('Vertical : Couleur de fond', 'gabarit-universel'),
        'section' => 'main-menu',
        'settings' => 'couleur-menu',
    )));

    //Vertical : Couleur de fond du 2e niveau de menu
    $wp_customize->add_setting('couleur-menu-2-niveau', array(
        'default' => '#ccc',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'couleur-fond-2-niveau', array(
        'label' => __('Vertical : Couleur de fond du 2e niveau', 'gabarit-universel'),
        'section' => 'main-menu',
        'settings' => 'couleur-menu-2-niveau',
    )));

    //Vertical : Lettre majuscule pour les élément de premier niveau du menu
    $wp_customize->add_setting('majuscule-menu', array(
        'default' => '0',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'majuscule-menu', array(
        'label' => __('Vertical : Lettre majuscule pour les élément de premier niveau de menu', 'gabarit-universel'),
        'section' => 'main-menu',
        'settings' => 'majuscule-menu',
        'type' => 'checkbox',
    )));

    //Horizontal : Couleur de typo et puces du menu
    $wp_customize->add_setting('couleur-typo-horizontal', array(
        'default' => '#000',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'couleur-typo-horizontal', array(
        'label' => __('Horizontal : Couleur de la police', 'gabarit-universel'),
        'section' => 'main-menu',
        'settings' => 'couleur-typo-horizontal',
    )));

    //Horizontal : Couleur de fond du menu
    $wp_customize->add_setting('couleur-menu-horizontal', array(
        'default' => '#ccc',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'couleur-menu-horizontal', array(
        'label' => __('Horizontal : Couleur de fond', 'gabarit-universel'),
        'section' => 'main-menu',
        'settings' => 'couleur-menu-horizontal',
    )));

    //Horizontal : Couleur de fond du 2e niveau de menu / Hover
    $wp_customize->add_setting('couleur-menu-2-niveau-horizontal', array(
        'default' => '#fff',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'couleur-fond-2-niveau-horizontal', array(
        'label' => __('Horizontal : Couleur de fond du 2e niveau / Hover', 'gabarit-universel'),
        'section' => 'main-menu',
        'settings' => 'couleur-menu-2-niveau-horizontal',
    )));

    //Mobile : Couleur de fond des éléments de menu mobile
    $wp_customize->add_setting('couleur-menu-mobile', array(
        'default' => '#17384b',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'couleur-menu-mobile', array(
        'label' => __('Mobile : Couleur de fond des éléments de menu mobile', 'gabarit-universel'),
        'section' => 'main-menu',
        'settings' => 'couleur-menu-mobile',
    )));

    //Mobile : Couleur de fond de l'élément de menu mobile actif
    $wp_customize->add_setting('couleur-menu-mobile-active', array(
        'default' => '#45606f',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'couleur-menu-mobile-active', array(
        'label' => __('Mobile : Couleur de fond de l\'élément de menu mobile actif', 'gabarit-universel'),
        'section' => 'main-menu',
        'settings' => 'couleur-menu-mobile-active',
    )));

    //Mobile : Couleur de fond des sous menus
    $wp_customize->add_setting('couleur-sous-menu-mobile', array(
        'default' => '#294759',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'couleur-sous-menu-mobile', array(
        'label' => __('Mobile : Couleur de fond des sous menus', 'gabarit-universel'),
        'section' => 'main-menu',
        'settings' => 'couleur-sous-menu-mobile',
    )));

}
add_action('customize_register', 'addMainMenuControls');


/**
 * Options section de gauche
 * addColLeftControls()
 * @param $wp_customize
 * Ajoute la personnalisation pour les éléments de la colonne de gauche
 */
function addColLeftControls($wp_customize) {

    //adding section in wordpress customizer
    $wp_customize->add_section('col_left_settings_section', array(
        'title' => 'Options section de gauche',
        'priority' => 30,
    ));

    //Couleur des titres
    $wp_customize->add_setting('col-left-title', array(
        'default' => '#333333',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'col-left-title', array(
        'label' => __('Couleur des titres', 'gabarit-universel'),
        'section' => 'col_left_settings_section',
        'settings' => 'col-left-title',
    )));

    //Couleur du texte
    $wp_customize->add_setting('col-left-text', array(
        'default' => '#333333',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'col-left-text', array(
        'label' => __('Couleur du texte', 'gabarit-universel'),
        'section' => 'col_left_settings_section',
        'settings' => 'col-left-text',
    )));

    //Couleur des icônes
    $wp_customize->add_setting('col-left-icons', array(
        'default' => '#333333',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'col-left-icons', array(
        'label' => __('Couleur des icônes', 'gabarit-universel'),
        'section' => 'col_left_settings_section',
        'settings' => 'col-left-icons',
    )));

    //Couleur des liens
    $wp_customize->add_setting('col-left-links', array(
        'default' => '#0079be',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'col-left-links', array(
        'label' => __('Couleur des liens', 'gabarit-universel'),
        'section' => 'col_left_settings_section',
        'settings' => 'col-left-links',
    )));

    //Couleur de fond
    $wp_customize->add_setting('col-left-bg', array(
        'default' => '#FFF',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'col-left-bg', array(
        'label' => __('Couleur de fond', 'gabarit-universel'),
        'section' => 'col_left_settings_section',
        'settings' => 'col-left-bg',
    )));

}
add_action('customize_register', 'addColLeftControls');


/**
 * Options barre latérale
 * addColRightControls()
 * @param $wp_customize
 * Ajoute la personnalisation pour les éléments de la colonne de droite
 */
function addColRightControls($wp_customize) {

    //Ajouter le panneau "Options colonne de droite"
    $wp_customize->add_section('col_right_settings_section', array(
        'title' => __('Options barre latérale', 'gabarit-universel'),
        'description' => __('Ces options ne concernent que les blocs de la barre latérale qui NE SONT PAS sur la page d&#8217;accueil.', 'gabarit-universel'),
        'priority' => 35,
    ));

    //Ajouter la couleur des titres
    $wp_customize->add_setting('col-right-title', array(
        'default' => '#ffffff',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'col-right-title', array(
        'label' => __('Couleur des titres', 'gabarit-universel'),
        'section' => 'col_right_settings_section',
        'settings' => 'col-right-title',
    )));

    //Ajouter la couleur d'arrière-plan des titres
    $wp_customize->add_setting('col-right-bg-title', array(
        'default' => '#333333',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'col-right-bg-title', array(
        'label' => __('Couleur d&#8217;arrière-plan des titres', 'gabarit-universel'),
        'section' => 'col_right_settings_section',
        'settings' => 'col-right-bg-title',
    )));

    //Ajouter la couleur de la bordure des boîtes
    $wp_customize->add_setting('col-right-border-color', array(
        'default' => '#cccccc',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'col-right-border-color', array(
        'label' => __('Couleur de la bordure des boîtes', 'gabarit-universel'),
        'section' => 'col_right_settings_section',
        'settings' => 'col-right-border-color',
    )));

}
add_action('customize_register', 'addColRightControls');


/**
 * Moteur de recherche
 * addSearchControls()
 * @param $wp_customize
 */
function addSearchControls($wp_customize) {

    //Ajouter le paneau "Moteur de recherche"
    $wp_customize->add_section('recherche', array(
        'title' => __('Moteur de recherche', 'gabarit-universel'),
        'priority' => 40,
    ));

    $wp_customize->add_setting('recherche', array(
        'default' => 'cse',
    ));
    
    $wp_customize->add_control('recherche', array(
        'label' => __('Type de recherche', 'gabarit-universel'),
        'section' => 'recherche',
        'settings' => 'recherche',
        'type' => 'select',
        'choices' => array(
            'wp' => __('Wordpress core', 'gabarit-universel'),
            'cse' => __('Google CSE', 'gabarit-universel'),
            //'elastic' => __('Elasticsearch', 'gabarit-universel'),
            //'solr' => __('Apache SOLR', 'gabarit-universel'),
        ),
    ));
}
add_action('customize_register', 'addSearchControls');
