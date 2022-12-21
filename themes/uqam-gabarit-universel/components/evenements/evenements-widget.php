<?php

class WP_Widget_Evenements extends WP_Widget {

	/**
	 * Sets up a new Evenements widget instance.
	 *
	 * @since 2.8.0
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'evenements',
			'description' => __( 'Afficher les événements à venir, provenant de evenements.uqam.ca', 'evenements' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'evenements', _x( 'UQAM Événements', 'evenements' ), $widget_ops );
	}

	/**
	 * Outputs the content for the current Evenements widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Evenements widget instance.
	 */
	public function widget( $args, $instance ) {
		if ( locate_template( 'components/evenements/evenements-widget-template.php' ) ) {
			include(locate_template( 'components/evenements/evenements-widget-template.php' ));
		} else {
			// Template not found in theme's folder, use plugin's template as a fallback
			include('evenements-widget-template.php' );
		}
	}

	/**
	 * Outputs the settings form for the Evenements widget.
	 *
	 * @since 2.8.0
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		include('evenements-widget-admin.php' );
	}

	/**
	 * Handles updating settings for the current Events widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$new_instance      = wp_parse_args( (array) $new_instance, array( 'title' => '' ) );
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['compte_evenements'] = (!empty($new_instance['compte_evenements'])) ? $new_instance['compte_evenements'] : '';
		$instance['organizations_tags_evenements'] = (!empty($new_instance['organizations_tags_evenements'])) ? $new_instance['organizations_tags_evenements'] : '';
		$instance['recherche_unite_evenements'] = (!empty($new_instance['recherche_unite_evenements'])) ? $new_instance['recherche_unite_evenements'] : '';
		$instance['widget_class'] = (!empty($new_instance['widget_class'])) ? ( $new_instance['widget_class'] ) : '';
		$instance['wrapper_class'] = (!empty($new_instance['wrapper_class'])) ? ( $new_instance['wrapper_class'] ) : '';
		$instance['item_class'] = (!empty($new_instance['item_class'])) ? ( $new_instance['item_class'] ) : '';
		$instance['id_evenements'] = (!empty($new_instance['id_evenements'])) ? ( $new_instance['id_evenements'] ) : '';
		$instance['n_evenements'] = (!empty($new_instance['n_evenements'])) ? strip_tags($new_instance['n_evenements']) : '';
		$instance['hide_images']     = isset( $new_instance['hide_images'] ) ? (bool) $new_instance['hide_images']: '';
		$instance['images'] = $new_instance['images'];
		$instance['excerpt'] = $new_instance['excerpt'];

		// Delete la cache lors de l'enregistrement du widget
		delete_transient('caligram');
		delete_transient('caligram_cache_fallback');

		return $instance;
	}

}