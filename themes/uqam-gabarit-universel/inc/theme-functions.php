<?php
/**
 * theme-functions.php
 * Toutes les fonctions lié au thème
 */

/**
 * Retourner le titre du site en version abrégée (ou l'acronyme)
 * si le champ "Titre abrégé" des options du thème a été rempli.
 * Sinon, retourner le titre complet.
 */
function getTitreAbrege() {
	$titreAbrege = get_bloginfo('name');
	if(!empty(get_theme_mod('titre-abrege')))
		$titreAbrege = get_theme_mod('titre-abrege');

	return $titreAbrege;
}

add_filter( 'body_class', function( $classes ) {
    //C'est classe donner un petit nom à son site
    $titreAbrege = strtolower( sanitize_html_class( getTitreAbrege() ) );
    return array_merge( $classes, array( $titreAbrege ) );
} );

/**
 * Aller chercher le code de la faculte
 * @return string
 */
function getFaculte() {
	$faculte = 'uqam';
	if( get_theme_mod('faculte') ) {
		$faculte = get_theme_mod('faculte', 'uqam');
	}
	return $faculte;
}

// Favicon UQAM
function uqam_favicon ($url, $size, $blog_id) {
    $faculte = getFaculte();
    switch ( $faculte ) {
        case 'art' :
            $url = 'https://gabarit-adaptatif.uqam.ca/statique/images/favicons/favicon_faculte-arts.png';
            break;
        case 'com' :
            $url = 'https://gabarit-adaptatif.uqam.ca/statique/images/favicons/favicon_faculte-communication.png';
            break;
        case 'edu' :
            $url = 'https://gabarit-adaptatif.uqam.ca/statique/images/favicons/favicon_faculte-sciences-education.png';
            break;
        case 'esg' :
            $url = 'https://gabarit-adaptatif.uqam.ca/statique/images/favicons/favicon_ecole-sciences-gestion.png';
            break;
        case 'fsh' :
            $url = 'https://gabarit-adaptatif.uqam.ca/statique/images/favicons/favicon_faculte-sciences-humaines.png';
            break;
        case 'pol' :
            $url = 'https://gabarit-adaptatif.uqam.ca/statique/images/favicons/favicon_faculte-science-politique-droit.png';
            break;
        case 'sci' :
            $url = 'https://gabarit-adaptatif.uqam.ca/statique/images/favicons/favicon_faculte-sciences.png';
            break;
        case 'vie' :
            $url = 'https://gabarit-adaptatif.uqam.ca/statique/images/favicons/favicon_etudiant.png';
            break;
        default :
            $url = 'https://gabarit-adaptatif.uqam.ca/statique/images/favicons/favicon_uqam.png';
    }
    return $url;
}
add_filter( 'get_site_icon_url','uqam_favicon', 10, 3 );

/**
 * Ajoute le code de la classe Faculte
 */
function addFaculte() {
    $string = getFaculte();
    if ($string != 'uqam'){$string .= '-faculte';}
	echo $string;
}

/**
 * Ajouter une classe faculté avec le HTML
 */
if (!function_exists('addFaculteClass')) {
    function addFaculteClass() {
        $string = 'class="' . getFaculte();
        if ( getFaculte() != 'uqam' ) {
            $string .= '-faculte';
        }
        $string .= '"';
        echo $string;
    }
}

/**
 * Afficher le logo UQAM ou ESG UQAM
 */
if (!function_exists('afficherLogoUqam')) {
    function afficherLogoUqam() {
        $logo    = get_template_directory_uri() . '/assets/images/uqam-logo.svg';
        $url     = 'https://uqam.ca';
        $faculte = getFaculte();
        if ( $faculte == 'esg' ) {
            $logo = get_template_directory_uri() . '/assets/images/esg-logo.svg';
            $url  = 'https://esg.uqam.ca';
        }
        echo '<a href="' . $url . '" class="align-middle"><img src=' . $logo . ' alt="UQAM logo" class="' . $faculte . '" /></a>';
    }
}

/**
 * menuColor
 */
if (!function_exists('menuColor')) {
    function menuColor() {
        echo( get_theme_mod( 'couleur-menu', '#ffffff' ) );
    }
}

/**
 * menuColor2e
 */
if (!function_exists('menuColor2e')) {
    function menuColor2e() {
        echo ( get_theme_mod('couleur-menu-2-niveau', '#cccccc') );
    }
}

/**
 * menuTextColor
 */
if (!function_exists('menuTextColor')) {
    function menuTextColor() {
        echo( get_theme_mod( 'couleur-typo', '#000000' ) );
    }
}

/**
 * menuColorHorizontal
 */
if (!function_exists('menuColorHorizontal')) {
    function menuColorHorizontal() {
        echo( get_theme_mod( 'couleur-menu-horizontal', '#cccccc' ) );
    }
}

/**
 * menuColor2eHorizontal
 */
if (!function_exists('menuColor2eHorizontal')) {
    function menuColor2eHorizontal() {
        echo ( get_theme_mod('couleur-menu-2-niveau-horizontal', '#ffffff') );
    }
}

/**
 * menuTextColorHorizontal
 */
if (!function_exists('menuTextColorHorizontal')) {
    function menuTextColorHorizontal() {
        echo( get_theme_mod( 'couleur-typo-horizontal', '#000000' ) );
    }
}

/**
 * menuColorMobile
 */
if (!function_exists('menuColorMobile')) {
    function menuColorMobile() {
        echo( get_theme_mod( 'couleur-menu-mobile', '#17384b' ) );
    }
}

/**
 * menuColorMobileActive
 */
if (!function_exists('menuColorMobileActive')) {
    function menuColorMobileActive() {
        echo( get_theme_mod( 'couleur-menu-mobile-active', '#45606f' ) );
    }
}

/**
 * menuColor2eMobile
 */
if (!function_exists('menuColor2eMobile')) {
    function menuColor2eMobile() {
        echo( get_theme_mod( 'couleur-sous-menu-mobile', '#294759' ) );
    }
}

/**
 * @param $classes
 *
 * @return mixed
 */
function banniere_body_class ( $classes ) {
    $classes[] = get_theme_mod('type-banniere', 'pleine');
    return $classes;
}
add_filter( 'body_class', 'banniere_body_class' );

/**
 * bannerColor
 */
if (!function_exists('bannerColor')) {
    function bannerColor() {
        echo( get_theme_mod( 'couleur-fond-banniere', '#ffffff' ) );
    }
}

/**
 * bannerBGImage
 */
if (!function_exists('bannerBGImage')) {
    function bannerBGImage() {
        echo( get_theme_mod( 'image-fond-banniere' ) );
    }
}

/**
 * bannerFeatures
 */
if (!function_exists('bannerFeatures')) {
    function bannerFeatures(){
        if ( is_active_sidebar( 'banner-area' ) ) {
            if( get_theme_mod('image-fond-banniere') != null ){
                echo 'banner-bg-image ';
            }
            if( get_theme_mod('couleur-fond-banniere') != '#ffffff' ){
                echo 'banner-bg-color ';
            }
        }
        if ( has_nav_menu( 'top-menu' ) === true ) {
            echo 'banner-top-menu ';
        }
    }
}

/**
 * bannerHeight
 */
function bannerHeight(){
    echo ( get_theme_mod('hauteur-fond-banniere', '260px') );
}

/**
 * colOrder
 */
function colOrderMain(){
    switch ( get_theme_mod('ordre-colonnes', '') ) {
        case '':
            echo 'pl-lg-7 pr-lg-5 ';
            break;
        case 'inv-d':
            echo 'order-0 order-lg-1 pl-lg-4 ';
            break;
        case 'inv-m':
            echo 'order-1 order-lg-0 pl-lg-7 pr-lg-4 ';
            break;
    };
}
function colOrderSideBar(){
    switch ( get_theme_mod('ordre-colonnes', '') ) {
        case '':
            echo 'pl-lg-4 ';
            break;
        case 'inv-d':
            echo 'order-1 order-lg-0 pl-lg-7 pr-lg-4 ';
            break;
        case 'inv-m':
            echo 'order-0 order-lg-1 pl-lg-4 ';
            break;
    };
}

/**
 * Helper pour déterminer si la zone gauche est utilisée
 * @return bool
 */
function gu_has_left_col() {
    if ( has_nav_menu( 'main-menu' )
         || has_nav_menu( 'user-menu' )
         || is_active_sidebar( 'social-media-sidebar' )
         || is_active_sidebar('promo-sidebar')
    ) {
        return true;
    } else {
        return false;
    }
}

/**
 * Lignes séparatrices claires ou foncées selon la couleur de fond du menu
 * @hex: get hex color
 */
function colSeparatorColor() {
    $couleurMenu = get_theme_mod('couleur-menu');
    $hex       = str_replace('#', '', $couleurMenu);
    $r         = (hexdec(substr($hex, 0, 2)) / 255);
    $g         = (hexdec(substr($hex, 2, 2)) / 255);
    $b         = (hexdec(substr($hex, 4, 2)) / 255);
    $lightness = round((((max($r, $g, $b) + min($r, $g, $b)) / 2) * 100));
    echo ($lightness >= 50 ? 'rgba(0, 0, 0, 0.3)' : 'rgba(255, 255, 255, 0.4)');
}


/**
 * Couleurs générales des titres, du texte et des hyperliens
 */
function couleurTitre() {
    echo ( get_theme_mod('couleur-titre', '#333333') );
}

function couleurTexte() {
    echo ( get_theme_mod('couleur-texte', '#333333') );
}

function couleurLien() {
    echo ( get_theme_mod('couleur-liens', '#007abb') );
}

function couleurAccordeon() {
    echo ( get_theme_mod('couleur-accordeons', '#efefef') );
}

function couleurAccordeonAlt() {
    echo ( get_theme_mod('couleur-accordeons-alt', '#333') );
}

function couleurAccordeonText() {
    echo ( get_theme_mod('couleur-accordeons-text', '#FFF') );
}

/**
 * Couleur des titres / Accueil
 */
function couleurTitreAccueil() {
    echo ( get_theme_mod('couleur-titre-accueil', '#fff') );
}

function couleurBgTitreAccueil() {
    echo ( get_theme_mod('couleur-bg-titre-accueil', '#4c4c4c') );
}

function couleurBgLienTitreAccueil() {
    echo ( get_theme_mod('couleur-bg-lien-titre-accueil', '#4c4c4c') );
}


/**
 * Couleurs / Colonne de gauche
 */
function colLeftTitleColor() {
    echo ( get_theme_mod('col-left-title', '#333333') );
}

function colLeftTextColor() {
    echo ( get_theme_mod('col-left-text', '#333333') );
}

function colLeftIconColor() {
    echo ( get_theme_mod('col-left-icons', '#000000') );
}

function colLeftLinkColor() {
    echo ( get_theme_mod('col-left-links', '#0079be') );
}

function colLeftBgColor() {
    echo ( get_theme_mod('col-left-bg', '#FFF') );
}


/**
 * Couleurs / Colonne de droite
 */
function colRightTitre() {
    echo ( get_theme_mod('col-right-title', '#ffffff') );
}

function colRightBgTitre() {
    echo ( get_theme_mod('col-right-bg-title', '#333333') );
}

function colRightBorderColor() {
    echo ( get_theme_mod('col-right-border-color', '#333333') );
}

/**
 * Modifier le champ de recherche selon le moteur choisi
 * @return string
 */
function getSearchType($param) {
    switch ( get_theme_mod('recherche', 'cse') ) {
        case 'cse' :
            $search_query = array('query_term' => 'q', 'query_location' => '/recherche/' );
            break;
        case 'wp' :
            $search_query = array('query_term' => 's', 'query_location' => '/' );
            break;
/*        case 'elastic' :
            $search_query[] = array('query_term' => 'q', 'query_location' => '/recherche/' );
            break;
        case 'solr' :
            $search_query[] = array('query_term' => 'q', 'query_location' => '/recherche/' );
            break;*/
        default :
            $search_query = array('query_term' => 'q', 'query_location' => '/recherche/' );
    }
    if ($param === 'term'){
        $search_query = $search_query['query_term'];
    }
    if ($param === 'location'){
        $search_query = $search_query['query_location'];
    }
    return $search_query;
}

/**
 * Vérifie si un post existe selon son slug name
 * @param $post_name
 * @param string $post_type
 * @return int|null|string
 */
function this_post_exists( $post_name, $post_type='post' ) {
    global $wpdb;

    $query = "SELECT ID FROM $wpdb->posts WHERE 1=1";
    $args = array();

    if ( !empty ( $post_name ) ) {
        $query .= " AND post_name LIKE '%s' ";
        $args[] = $post_name;
    }
    if ( !empty ( $post_type ) ) {
        $query .= " AND post_type = '%s' ";
        $args[] = $post_type;
    }

    if ( !empty ( $args ) )
        return $wpdb->get_var( $wpdb->prepare($query, $args) );

    return 0;
}


/**
 * Enleve les termes "category", "tag" et "author" sur la page archive.php
 * @link     https://wordpress.stackexchange.com/questions/179585/remove-category-tag-author-from-the-archive-title/276448
 */
add_filter( 'get_the_archive_title', function ( $title ) {

    if ( is_category() ) {

        $title = single_cat_title( '', false );

    } elseif ( is_tag() ) {

        $title = single_tag_title( '', false );

    } elseif ( is_author() ) {

        $title = '<span class="vcard">' . get_the_author() . '</span>' ;

    }

    return $title;

});


/**
 * Custom comments (ouvert.dev.uqam.ca)
 */
if( ! function_exists( 'gu_comments' ) ) {
    function gu_comments($comment, $args, $depth) {
        require get_stylesheet_directory() . '/template-parts/comment.php';
    }
}


/**
 * Rendre disponibles les catégories pour les pages
 */
function categoriesPourPages() {  
    register_taxonomy_for_object_type('category', 'page');  
}
add_action( 'init', 'categoriesPourPages' );
function afficherLesPagesDansListesCategories($wp_query) {
    if ($wp_query->get('category_name')) $wp_query->set('post_type', 'any');
}
add_action('pre_get_posts', 'afficherLesPagesDansListesCategories');

// Theme supports
add_theme_support( 'post-thumbnails' );
