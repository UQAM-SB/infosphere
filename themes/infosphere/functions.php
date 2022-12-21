<?php
/**
 * functions.php
 * https://developer.wordpress.org/themes/advanced-topics/child-themes/
 */

add_action( 'wp_enqueue_scripts', function () {
    //Si on utilise webpack pour un theme plus complexe avec des components override ou custom
    if ( file_exists(get_stylesheet_directory() .'/dist/') ){
        //Les components du theme parent sont inclus dans notre build, donc on dequeue, deregister
        wp_dequeue_style( 'main-style' ); wp_deregister_style( 'main-style' );
        wp_dequeue_script( 'main-script' ); wp_deregister_script( 'main-script' );
        wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/dist/theme.css', array(), filemtime( get_stylesheet_directory() .'/dist/theme.css' ), 'all' );
        wp_enqueue_script('theme-script', get_stylesheet_directory_uri() . '/dist/theme.js', array(), filemtime( get_stylesheet_directory() .'/dist/theme.js' ), true );
    } else {
        //Sans build les js/css du theme parent s'appliquent
        //On peut inclure notre CSS et jQuery artisanal, avec le parent en dépendance
        wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/theme.css', array('main-style'), filemtime( get_stylesheet_directory() .'/theme.css' ), 'all' );


       // wp_enqueue_script('popper-script', get_stylesheet_directory_uri() . '/assets/css/popper.js', array('main-script'), filemtime( get_stylesheet_directory() .'/assets/css/popper.js' ), true );


     


        wp_enqueue_script('theme-script', get_stylesheet_directory_uri() . '/theme.js', array('jquery', 'main-script'), filemtime( get_stylesheet_directory() .'/theme.js' ), true );




        wp_register_style( 'bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css' );
        wp_enqueue_style('bootstrap-icons');



        wp_register_style( 'font-awesome-all', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css' );
        wp_style_add_data( 'font-awesome-all', array( 'integrity', 'crossorigin' ) , array( 'sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==', 'anonymous' ) );  
        wp_enqueue_style('font-awesome-all');  


        if( is_page( array( 'citer-ses-sources','naviguer-site' ) ) ){

        wp_register_script( 'popper-script', 'https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js', array('main-script'), true, false );
        wp_script_add_data( 'popper-script', array( 'integrity', 'crossorigin' ) , array( 'sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1', 'anonymous' ) );  
        wp_enqueue_script('popper-script');  

        wp_register_script( 'boot-script', 'https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js', array('popper-script'), true, false );
       wp_script_add_data( 'boot-script', array( 'integrity', 'crossorigin' ) , array( 'sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM', 'anonymous' ) );  
       wp_enqueue_script('boot-script'); 
    }


     


     
      
          //     wp_enqueue_script('tooltip-script', get_stylesheet_directory_uri() . '/assets/css/tooltip.js', array('main-script'), filemtime( get_stylesheet_directory() .'/assets/css/tooltip.js' ), false );


    }
}, 20);
add_action( 'admin_enqueue_scripts', function () {
    if ( file_exists(get_stylesheet_directory() .'/dist/') ){
        //Les components du theme parent sont inclus dans notre build, donc on dequeue, deregister
        wp_dequeue_style( 'admin-style' ); wp_deregister_style( 'admin-style' );
        wp_dequeue_script( 'admin-script' ); wp_deregister_script( 'admin-script' );
        wp_enqueue_style( 'admin-style', get_stylesheet_directory_uri() . '/dist/admin.css', array(), filemtime( get_stylesheet_directory() .'/dist/admin.css' ) );
        wp_enqueue_script('admin-script', get_stylesheet_directory_uri() . '/dist/admin.js', array(), filemtime( get_stylesheet_directory() .'/dist/admin.js' ), true );
    } else {
        //Sans build les js/css du theme parent s'appliquent
        //On peut inclure notre CSS et jQuery artisanal (pour le back-end)
    }
});




/**
 * Exemple : Override les classes de la bannière
 * inclure via ./components/banniere
 *
 * bannerFeatures
 */
function bannerFeatures(){
    if( get_theme_mod('image-fond-banniere') != null ){
        echo 'banner-bg-image exemple ';
    }
    if( get_theme_mod('couleur-fond-banniere') != '#ffffff' ){
        echo 'banner-bg-color exemple ';
    }
    if ( has_nav_menu( 'top-menu' ) === true ) {
        echo 'banner-top-menu exemple ';
    }
}

function homepageFeatures(){
    echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                var firstArticleId = document.getElementById('sectionAction').getElementsByTagName('article')[0].id;
                headerUpdate(firstArticleId);
            }, false);
        </script>\n";

    echo "<script>
    function headerUpdate(articleId) {
                var imgSrc = document.getElementById(articleId).getElementsByTagName('img')[0].src;
                document.getElementById('imgHeader').src = imgSrc;
                var titre = document.getElementById(articleId).getElementsByTagName('h2')[0].textContent;
                document.getElementById('sectionImgHeader').getElementsByTagName('a')[0].getElementsByTagName('h1')[0].innerHTML = titre;
                var link = document.getElementById(articleId).getElementsByTagName('a')[0].href;
                document.getElementById('sectionImgHeader').getElementsByTagName('a')[0].href = link;
                var nametag = document.getElementById(articleId).getElementsByTagName('p')[0].textContent;
                document.getElementById('sectionImgHeader').getElementsByClassName('articleNametag')[0].getElementsByTagName('p')[0].innerHTML = nametag;
            }
    </script>";
}


/********************
If you use the Bootstrap, you will encounter a problem in not being able to modify the class (a),
https://developer.wordpress.org/reference/functions/next_post_link/
 *********************/
function wpdocs_add_post_link( $html ){
    $html = str_replace( '<a ', '<a class="page-link" ', $html );
    return $html;
}
add_filter( 'next_post_link', 'wpdocs_add_post_link' );
add_filter( 'previous_post_link', 'wpdocs_add_post_link' );



//Page Slug Body Class
function add_slug_body_class( $classes ) {
global $post;
if ( isset( $post ) ) {
$classes[] = $post->post_type . '-' . $post->post_name;
}
return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

//Page Parent Slug Body Class
function add_slug_parent_body_class( $classes ) {
global $post;
if ( isset( $post ) ) {
    
$parent_id   = $post->post_parent;
$post_parent_slug = get_post_field( 'post_name', $parent_id );    
    
$classes[] = 'parent-' . $post_parent_slug;
}
return $classes;
}

add_filter( 'body_class', 'add_slug_parent_body_class' );


//Top Page Parent Slug Body Class
function add_slug_top_parent_body_class( $classes ) {
global $post;
if ( isset( $post ) ) {
    
if ($post->post_parent)	{
	$ancestors=get_post_ancestors($post->ID);
	$root=count($ancestors)-1;
	$parent_id = $ancestors[$root];
} else {
	$parent_id = $post->ID;
}
$post_parent_slug = get_post_field( 'post_name', $parent_id );    
    
$classes[] = 'top-parent-' . $post_parent_slug;
}
return $classes;
}

add_filter( 'body_class', 'add_slug_top_parent_body_class' );




function wpb_list_child_pages() { 
 
global $post; 
 
if ( is_page() && $post->post_parent )
 
    $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
else
    $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );
 
if ( $childpages ) {
 
    $string = '<ul class="wpb_page_list d-block d-lg-none">' . $childpages . '</ul>';
}
 
return $string;
 
}
 
add_shortcode('wpb_childpages', 'wpb_list_child_pages');

