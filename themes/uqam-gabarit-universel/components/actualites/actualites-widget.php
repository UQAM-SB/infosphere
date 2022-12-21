<?php

class WP_Widget_Actualites extends WP_Widget {

	/**
	 * Sets up a new Actualites widget instance.
	 *
	 * @since 2.8.0
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'actualites',
			'description' => __( 'Affiche un fil RSS', 'actualites' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'actualites', _x( 'UQAM Actualites', 'actualites' ), $widget_ops );
	}

	/**
	 * Outputs the content for the current Actualites widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Actualites widget instance.
	 */
	public function widget( $args, $instance ) {
		if ( locate_template( 'components/actualites/actualites-widget-template.php' ) ) {
			include(locate_template( 'components/actualites/actualites-widget-template.php' ));
		} else {
			// Template not found in theme's folder, use plugin's template as a fallback
			include('actualites-widget-template.php' );
		}
	}

	/**
	 * Outputs the settings form for the Actualites widget.
	 *
	 * @since 2.8.0
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		include('actualites-widget-admin.php' );
	}

	/**
	 * Handles updating settings for the current Actualites widget instance.
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
		$new_instance      = wp_parse_args(
			(array) $new_instance,
			array(
				'title' => '',
				'url' => '',
				'page' => '',
				'label' => '',
				'n' => '3',
				'images' => '',
				'link' => '',
				'author' => '',
				'dates' => '',
				'dates_f' => '',
				'extraits' => '',
				'extraits_a' => '',
				'extraits_h' => '',
				'extraits_m' => '',
				'widget_class' => '',
				'wrapper_class' => '',
				'item_class' => '',
				)
		);
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['url'] = (!empty($new_instance['url'])) ? sanitize_text_field($new_instance['url']) : '';
		$instance['page'] = (!empty($new_instance['page'])) ? sanitize_text_field($new_instance['page']) : '';
		$instance['label'] = (!empty($new_instance['label'])) ? sanitize_text_field($new_instance['label']) : '';
		$instance['n'] = (!empty($new_instance['n'])) ? strip_tags($new_instance['n']) : '';
		$instance['images'] = $new_instance['images'];
		$instance['link'] = $new_instance['link'];
		$instance['author'] = (!empty($new_instance['author'])) ? strip_tags($new_instance['author']) : '';
		$instance['dates'] = $new_instance['dates'];
		$instance['dates_f'] = (!empty($new_instance['dates_f'])) ? sanitize_text_field($new_instance['dates_f']) : '';
		$instance['extraits'] = $new_instance['extraits'];
		$instance['extraits_a'] = $new_instance['extraits_a'];
		$instance['extraits_h'] = $new_instance['extraits_h'];
		$instance['extraits_m'] = $new_instance['extraits_m'];
		$instance['widget_class'] = (!empty($new_instance['widget_class'])) ? sanitize_text_field( $new_instance['widget_class'] ) : '';
		$instance['wrapper_class'] = (!empty($new_instance['wrapper_class'])) ? sanitize_text_field( $new_instance['wrapper_class'] ) : '';
		$instance['item_class'] = (!empty($new_instance['item_class'])) ? sanitize_text_field( $new_instance['item_class'] ) : '';

		return $instance;
	}

}