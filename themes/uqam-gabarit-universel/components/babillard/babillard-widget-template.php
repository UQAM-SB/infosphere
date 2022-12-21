<?php
/**
 * @package Babillard
 */

if ( ! isset( $args['widget_id'] ) ) {
	$args['widget_id'] = $this->id;
}

$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Babillard' );
$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
$widget_class = (!empty($instance['widget_class'])) ? $instance['widget_class'] : '';
$entry_class = (!empty($instance['entry_class'])) ? $instance['entry_class'] : '';
$number_entries = (!empty($instance['number_entries'])) ? $instance['number_entries'] : '';
$images = (!empty($instance['images'])) ? $instance['images'] : '';
$excerpt = (!empty($instance['excerpt '])) ? $instance['excerpt'] : '';
$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;if ( ! $number ){ $number = 5; }
$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
$show_linkable_title = isset( $instance['linkable_title'] ) ? $instance['linkable_title'] : false;
$class_title = ( $show_linkable_title ) ? 'widget-title-link' : null;
$class_color = get_theme_mod('couleur-bg-icone-titre-accueil', 'white');
$category_name = ( ! empty( $instance['link_to_category'] ) ) ? $instance['link_to_category'] : false;

if ( ! term_exists( $category_name ) ) { $category_name = null; }
$category_link = get_option( 'category_base' );
$url = get_site_url(null, $category_link);
$url = $url . '/' . $category_name;
$show_excerpt = isset( $instance['show_excerpt'] ) ? $instance['show_excerpt'] : false;
$page_for_posts = get_option( 'page_for_posts' );

$querySticky = new  WP_Query(array (
	'posts_per_page' => $number,
	'post__in' => get_option('sticky_posts'),
    'fields' => 'ids',
) );

if ($querySticky -> post_count < $number){
    $number -=  $querySticky -> post_count;
    $queryNonSticky = new WP_Query(
	    apply_filters(
		    'widget_posts_args',
		    array(
			    'posts_per_page'      => $number,
			    'no_found_rows'       => true,
			    'post_status'         => 'publish',
			    'category_name' => $category_name,
                'post__not_in' => get_option('sticky_posts'),
                'fields' => 'ids'
		    ),
		    $instance
	    )
    );
	$allIDs = array_merge($querySticky->posts,$queryNonSticky->posts);
}
$query = $allIDs ? new WP_Query(array('post__in' => $allIDs)) : $querySticky ;


if ( ! $query->have_posts() ) { return; }

echo $args['before_widget'];

if ( $title && $show_linkable_title && $category_name ){
	echo '<h3 class="widget-title '. $class_title . ' mt-0 mb-6">' . '<a href="' . $url . '">' . $title . '</a>' . '<a class="side-link ' . $class_color . '" href="' . $url . '"></a></h3>';
} elseif ( $title && $show_linkable_title && $page_for_posts ) {
	echo '<h3 class="widget-title '. $class_title . ' mt-0 mb-6">' . '<a href="' . get_page_link($page_for_posts) . '">' . $title . '</a>' . '<a class="side-link ' . $class_color . '" href="' . get_page_link($page_for_posts) . '"></a></h3>';
} elseif ( $title ) {
	echo $args['before_title'] . $title . $args['after_title'];
} else {
	echo $args['before_title'] . __('Babillard', 'uqam-babillard') . $args['after_title'];
};

if(!$show_linkable_title): ?>
	<a href="<?php echo $url; ?>" class="uqam_babillard-all hidden-xs d-none d-md-inline-block"><?php _e('Tous les affichages', 'uqam-babillard'); ?></a>
    <?php endif; ?>
    <div class="uqam_babillard-container">
        <div class="uqam_babillard-wrapper">
            <?php while( $query->have_posts() ) : $query->the_post(); ?>
           <article class="uqam_babillard <?php echo $entry_class; ?> <?php if($images && has_post_thumbnail()){ echo 'uqam_babillard-images'; }; ?>">
                <?php if($images && has_post_thumbnail()){
                    echo '<a href="' . get_the_permalink() . '" class="uqam_babillard-image">' . get_the_post_thumbnail (null,"post-thumbnail", ["class" => ""]) . '</a>';
                } ?>
                <div class="uqam_babillard-content">
                    <h3 class="uqam_babillard-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo get_the_title(); ?></a></h3>
                    <?php if($show_date) : ?><div class="uqam_babillard-date"><?php echo get_the_date(); ?></div><?php endif; ?>
                    <?php if($show_excerpt) : ?><div class="uqam_babillard-excerpt"><?php echo get_the_excerpt(); ?></div><?php endif; ?>
                </div>
            </article>
            <?php endwhile;
                if(!$show_linkable_title): ?>
                    <a href="<?php echo $url; ?>" class="uqam_babillard-all visible-xs-block d-block d-md-none"><?php _e('Tous les affichages','uqam-babillard'); ?></a>
                <?php endif; ?>
        </div>
    </div>

<?php echo $args['after_widget'];
wp_reset_postdata();