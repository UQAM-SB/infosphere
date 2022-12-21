<?php
/**
 * @package uqam_actualites
 */
$title = ! empty( $instance['title'] ) ? $instance['title'] : '';

/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
$url = !empty( $instance['url']) ? $instance['url'] : ''; //url
$page = !empty( $instance['page']) ? $instance['page'] : ''; //page
$label = !empty( $instance['label']) ? $instance['label'] : ''; //page
$items = !empty( $instance['n']) ? $instance['n'] : '';//n
$images = (!empty($instance['images'])) ? $instance['images'] : '';
$link_t = (!empty($instance['link'])) ? $instance['link'] : '';
$auteur = (!empty($instance['author'])) ? $instance['author'] : '';
$dates = (!empty($instance['dates'])) ? $instance['dates'] : '';
$dates_f = (!empty($instance['dates_f'])) ? $instance['dates_f'] : null;
$extraits = (!empty($instance['extraits'])) ? $instance['extraits'] : '';
$extraits_a = (!empty($instance['extraits_a'])) ? '<a>' : '';
$extraits_h = (!empty($instance['extraits_h'])) ? '<h2><h3><h4>' : '';
$extraits_m = (!empty($instance['extraits_m'])) ? '<em><b><strong><sup>' : '';
$widget_class = !empty($instance['widget_class']) ? $instance['widget_class'] : '';//widget_class
$wrapper_class = !empty($instance['wrapper_class']) ? $instance['wrapper_class'] : '';//container_class
$item_class = (!empty($instance['item_class'])) ? $instance['item_class'] : '';//id_evenements

add_filter( 'wp_feed_cache_transient_lifetime' , 'return_cache_life' );
$rss = fetch_feed( $url );
remove_filter( 'wp_feed_cache_transient_lifetime' , 'return_cache_life' );
if ( is_wp_error( $rss ) ) {
	error_log('Actualités :'  . $rss->get_error_message());
	if ( current_user_can( 'manage_options' ) ) {
		echo '<p><strong>' . __( 'Actualités :' ) . '</strong> ' . $rss->get_error_message() . '</p>';
	}
	return;
}

$feed_source = strip_tags( $rss->get_permalink() );
echo $args['before_widget'];
echo $args['before_title'] . $title . $args['after_title'];

?>
    <a href="<?php echo $page; ?>" class="uqam_actualites-all hidden-xs d-none d-md-inline-block"><?php _e(esc_html($label),'actualites'); ?></a>


    <div class="uqam_actualites-container <?php echo $widget_class; ?>">
        <div class="uqam_actualites-wrapper <?php echo $wrapper_class; ?>">
			<?php
			foreach ( $rss->get_items(0, $items) as $item ) : ?>
                <article class="uqam_actualites-item <?php echo $item_class; ?>">
					<?php

					// pre-process elements
					$link = $item->get_link();
					while ( stristr( $link, 'http' ) != $link ) {
						$link = substr( $link, 1 );
					}
					$link = esc_url( strip_tags( $link ) );

					// Titre de l'article
					$titre = esc_html( trim( strip_tags( $item->get_title() ) ) );
					if ( empty( $titre ) ) {
						$titre = __( 'Untitled' );
					}

					// L'auteur
					$author = '';
					if ( $auteur ) {
						$author = $item->get_author();
						if ( is_object( $author ) ) {
							$author = (!empty($author->get_name())) ? $author->get_name() : $author = $author->get_email();
							$author = ' <cite>' . esc_html( strip_tags( $author ) ) . '</cite>';
						}
					}

					// L'extrait
					$desc = force_balance_tags( html_entity_decode( wp_trim_words( htmlentities( $item->get_description() ), 55, ' [&hellip;]' ) ) );
					$summary = '';
					if ( $extraits ) {
						$summary = $desc;
						// Change existing [...] to [&hellip;].
						if ( '[...]' == substr( $summary, -5 ) ) {
							$summary = substr( $summary, 0, -5 ) . '[&hellip;]';
						}
					}
					if (!$extraits_a && !$extraits_h && !$extraits_m) {
						$summary_output = strip_tags( $summary );
						error_log('strip_tags');
					} else {
						$summary_output = strip_tags( html_entity_decode($summary, null, 'utf-8'), $extraits_a . $extraits_h . $extraits_m );
						error_log('strip_tags: ' . $extraits_a . $extraits_h . $extraits_m);
					}

					?>
					<?php if ($images && $img = $item->get_enclosure() ) { ?>
                        <a class="uqam_actualites-images" href="<?php echo $link; ?>">
                            <img class="uqam_actualites-image" src="<?php echo $img->link; ?>" alt="<?php echo $titre; ?>" loading="lazy">
                        </a>
					<?php }; ?>
                    <div class="uqam_actualites-content">
						<?php if ( $link_t ) {  ?>
                            <a class="uqam_actualites-title" href="<?php echo $link; ?>"><?php echo $titre; ?></a><?php
						} else { ?>
                            <h3 class="uqam_actualites-title"><?php echo $titre; ?></h3><?php
						} ?>
						<?php if ( $dates && $date = $item->get_date( 'U' ) ) {  ?>
                            <div class="uqam_actualites-date"><?php
							if(is_null($dates_f)):
								echo date_i18n( get_option( 'date_format' ), $date ); //On prend le format définit dans les options du site par défaut
							//WPML https://dotlayer.com/how-to-add-support-for-date-time-translations-using-wpml-in-wordpress/
							else:
								echo date_i18n( $dates_f, $date ); //Format PHP optionnel https://www.php.net/manual/en/function.date.php
							endif; ?></div><?php
						} ?>
						<?php if ( $auteur && $author) { ?>
                            <div class="uqam_actualites-auteur"><?php echo $author; ?></div><?php
						} ?>
						<?php if ( $summary && $extraits ) { ?>
                            <div class="uqam_actualites-excerpt"><?php echo $summary_output; ?></div><?php
						} ?>
						<?php if ( !$link_t ) {  ?>
                            <a class="uqam_actualites-suite" href="<?php echo $link; ?>"><?php _e('Lire la suite', 'actualites'); ?></a><?php
						} ?>
                    </div>
                </article>
			<?php endforeach; ?>
            <a href="<?php echo $page; ?>" class="uqam_actualites-all visible-xs-block d-block d-md-none"><?php _e(esc_html($label),'actualites'); ?></a>
        </div>
    </div>


<?php
echo $args['after_widget'];
$rss->__destruct();
unset( $rss );