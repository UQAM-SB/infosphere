<?php
/**
 * @package evenements
 */
$title = ! empty( $instance['title'] ) ? $instance['title'] : '';

/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
$compte_evenements = !empty( $instance['compte_evenements']) ? $instance['compte_evenements'] : ''; //compte_evenements
$organizations_tags_evenements = !empty( $instance['organizations_tags_evenements']) ? $instance['organizations_tags_evenements'] : '';//organizations_tags_evenements
$id_evenements = !empty($instance['id_evenements']) ? $instance['id_evenements'] : '';//id_evenements
$widget_class = !empty($instance['widget_class']) ? $instance['widget_class'] : '';//widget_class
$wrapper_class = !empty($instance['wrapper_class']) ? $instance['wrapper_class'] : '';//container_class
$item_class = (!empty($instance['item_class'])) ? $instance['item_class'] : '';//id_evenements
$n_evenements = $instance['n_evenements'];
$hide_images = (!empty($instance['hide_images'])) ? $instance['hide_images'] : null;
$images = (!empty($instance['images'])) ? $instance['images'] : '';
$excerpt = (!empty($instance['excerpt'])) ? $instance['excerpt'] : '';

//DEV
$evenements_uqam = get_query_var( 'evenements_uqam' );

// Source
switch( $compte_evenements ){//compte
	case 'uqam':
		if( $evenements_uqam != 'dev' ){
			$evenements = 'https://evenements.uqam.ca/';
		} else {
			$evenements = 'http://uqam.caligram.com/';
		}
		break;
	case 'esg':
		if( $evenements_uqam != 'dev' ){
			$evenements = 'https://evenements.esg.uqam.ca/';
		} else {
			$evenements = 'http://esg.caligram.com/';
		}
		break;
	default:
		$evenements = new WP_Error('Événements UQAM', __('Erreur du Calendrier des événements, service non-disponible.') );
		break;
}
if(is_wp_error($evenements)){
	$output = __('<div class="error"><p><strong>Erreur du Calendrier des événements</strong>, service non-disponible.</p><p>Pour plus d\'informations veuillez consulter <a href="http://etat.servicesinformatiques.uqam.ca/">etat.servicesinformatiques.uqam.ca</a>.</p><p>Merci de votre compréhension.</p></div>');
	return $output;
}

$evenements_all = $evenements . 'evenements?' . $organizations_tags_evenements . '='. $id_evenements;
$evenements_api = $evenements . 'api/events?' . $organizations_tags_evenements . '='. $id_evenements .'&per=' . $n_evenements;

//error_log( "Evenements: delete cache.");
if( $evenements_uqam === 'flush' ){
	delete_transient('caligram-'.$args['widget_id']);
	delete_transient('caligram_cache_fallback-'.$args['widget_id']);
	delete_transient('caligram');
	delete_transient('caligram_cache_fallback');
}


if ( !get_transient( 'caligram-'.$args['widget_id'] ) ) {
	//error_log( "Evenements: La cache est expirée.");
	$response =  wp_remote_get($evenements_api);
	if ( !is_array( $response ) && is_wp_error( $response ) ){//S'il y a des erreurs avec l'url
		error_log( "Evenements: Le service n'est pas disponible. " . $response->get_error_message() );
		if ( false === ( get_transient( 'caligram_cache_fallback-'.$args['widget_id'] ) ) ) {//Si la cache est vide
			if ( current_user_can( 'manage_options' ) ) {//Affiche un erreur pour les admin & webmestres ?>
                <div class="notice notice-error">
                <p><?php _e( "Les événements ne sont pas disponible." ); ?></p>
                </div><?php
				error_log( "Evenements:  Le service n'est pas disponible, et la cache redondante est expirée.  ".$response->get_error_message() );
			}
			return;
		} else {
			//error_log( "Evenements: On utilise la cache fallback. ".$response->get_error_message() );
			$evenement_data = get_transient('caligram_cache_fallback-'.$args['widget_id'] );
		}
	} else {
		//error_log('Evenements: Cache refresh');
		$evenement_data = $response['body'];
		delete_transient('caligram-'.$args['widget_id']);
		delete_transient('caligram_cache_fallback-'.$args['widget_id']);
		delete_transient('caligram');
		delete_transient('caligram_cache_fallback');
		set_transient('caligram-'.$args['widget_id'], $evenement_data, 1 * HOUR_IN_SECONDS );
		set_transient('caligram_cache_fallback-'.$args['widget_id'], $evenement_data );
	}
} else {
	//error_log( "Evenements: On utilise la cache.");
	$evenement_data = get_transient('caligram_cache_fallback-'.$args['widget_id'] );
}

echo $args['before_widget'];
echo $args['before_title'] . $title . $args['after_title'];
?>
    <a href="<?php echo $evenements_all; ?>" class="uqam_evenements-all hidden-xs d-none d-md-inline-block"><?php _e('Tous les événements', 'evenements'); ?></a>
<?php

?>
    <div class="uqam_evenements-container <?php echo $widget_class; ?>">
        <div class="uqam_evenements-wrapper <?php echo $wrapper_class; ?>">
			<?php
			$evenements_json = json_decode($evenement_data, true);
			if (empty($evenements_json['data'])){
				_e('Aucun événement à venir.', 'evenements');
			}
			foreach ($evenements_json['data'] as $evenement) : ?>
                <article class="uqam_evenements-item <?php echo $item_class; ?>">
	                <?php  $img = $evenement['display_image_url'];
                    if ($img && !$hide_images ) { ?>
                        <a class="uqam_evenements-images" href="<?php echo $evenement['url'] ?>">
                            <img class="uqam_evenements-image" src="<?php echo $img; ?>" alt="<?php echo $evenement['title']; ?>" loading="lazy">
                        </a>
	                <?php }; ?>
                    <div class="uqam_evenements-content">
                        <a class="uqam_evenements-title" href="<?php echo $evenement['url']; ?>"><?php
		                    echo $evenement['title'];
		                    ?>
                        </a>
                        <div class="uqam_evenements-date"><?php
							$evenement_sdate = DateTime::createFromFormat('Y-m-d H:i:s', $evenement['next_date']);
							$evenement_ndate = DateTime::createFromFormat('Y-m-d H:i:s', $evenement['end_date']);
							echo ucfirst( date_i18n( 'l j F', $evenement_sdate->getTimestamp() ) ); ?>
                        <div class="evenements__heure"><?php
                            echo date_format($evenement_sdate, 'G\hi');
                            if ( $evenement['event_dates_count'] === 1) {
                                if ( $evenement_ndate ){
                                    echo ' &agrave;&nbsp;' . date_format($evenement_ndate, 'G\hi');
                                }
                            }
                        ?></div>
                    </div>
                </article>
			<?php endforeach;
			?>
            <a href="<?php echo $evenements_all; ?>" class="uqam_evenements-all visible-xs-block d-block d-md-none"><?php _e('Tous les événements', 'evenements'); ?></a>
        </div>
    </div>
<?php
echo $args['after_widget'];