<?php

class WP_Widget_babillard extends WP_Widget {

	/**
	 * Sets up a new Babillard widget instance.
	 *
	 * @since 2.8.0
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'babillard',
			'description' => __( 'Les articles les plus récents de votre site Web avec personnalisation supplémentaire.' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'babillard', _x( 'UQAM Babillard', 'babillard' ), $widget_ops );
	}

	/**
	 * Outputs the content for the current Babillard widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Search widget instance.
	 */
	public function widget( $args, $instance ) {
		if ( locate_template( 'components/babillard/babillard-widget-template.php' ) ) {
			include(locate_template( 'components/babillard/babillard-widget-template.php' ));
		} else {
			// Template not found in theme's folder, use plugin's template as a fallback
			include('babillard-widget-template.php' );
		}

	}

	/**
	 * Outputs the settings form for the Babillard widget.
	 *
	 * @since 2.8.0
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		include('babillard-widget-admin.php' );
	}

	/**
	 * Handles updating settings for the current Babillard widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance              = $old_instance;
		$instance['title']     = sanitize_text_field( $new_instance['title'] );
		$instance['number']    = isset( $new_instance['number'] ) ? (int) $new_instance['number'] : 3;
		$instance['images']     = isset( $new_instance['images'] ) ? (bool) $new_instance['images'] : false;
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		$instance['linkable_title'] = isset( $new_instance['linkable_title'] ) ? (bool) $new_instance['linkable_title'] : false;
		$instance['link_to_category'] = ( ! empty( $new_instance['link_to_category'] ) ) ? $new_instance['link_to_category'] : '';
		$instance['show_excerpt'] = isset( $new_instance['show_excerpt'] ) ? (bool) $new_instance['show_excerpt'] : false;
		return $instance;
	}

}