<?php
/**
* @package Babillard
*/

$instance = wp_parse_args( (array) $instance, array( 'title' => '', ) );
$images = (!empty($instance['images'])) ? (bool) $instance['images'] : NULL;
$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 3;
$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
$linkable_title = isset( $instance['linkable_title'] ) ? (bool) $instance['linkable_title'] : false;
$show_excerpt = isset( $instance['show_excerpt'] ) ? (bool) $instance['show_excerpt'] : false; ?>

<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'uqam-babillard' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

<!-- Sélection de la catégorie -->
<p><label for="<?php echo $this->get_field_id( 'link_to_category' ); ?>">
		<?php esc_attr_e( 'Indiquer la catégorie des articles à afficher', 'uqam-babillard' ); ?>
	</label>
	<select id="<?php echo $this->get_field_id( 'link_to_category' ); ?>"
	        class="widefat"
	        name="<?php echo $this->get_field_name( 'link_to_category' ); ?>">

		<option value="">Toutes les catégories</option>

		<?php $categories = get_categories( array( 'orderby' => 'name', 'order'   => 'ASC' ) );

		foreach ( $categories as $category ) {
			printf( '<option value="%1$s" %4$s>%2$s (%3$s)</option>',
				esc_attr( $category->slug ),
				esc_html( $category->cat_name ),
				esc_html( $category->category_count ),
				($instance['link_to_category'] == $category->slug) ? 'selected="selected"' : ''
			);
		}
		?>

	</select></p>


<p><input class="checkbox" type="checkbox"<?php checked( $linkable_title ); ?> id="<?php echo $this->get_field_id( 'linkable_title' ); ?>" name="<?php echo $this->get_field_name( 'linkable_title' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'linkable_title' ); ?>"><?php _e( 'Lien sur le titre de la section', 'uqam-babillard' ); ?></label>
</p>

<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Nombre d\'articles à afficher', 'uqam-babillard' ); ?></label>
	<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" /></p>

<p><input type="checkbox"  type="checkbox"<?php checked( $images, '1' ); ?> id="<?php echo $this->get_field_id( 'images' ); ?>" name="<?php echo $this->get_field_name('images'); ?>" value="1" />
	<label for="<?php echo $this->get_field_id('images'); ?>"><?php _e( 'Affichager les images', 'uqam-babillard' ); ?></label></p>

<p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Afficher les date de publication', 'uqam-babillard' ); ?></label></p>

<p><input class="checkbox" type="checkbox"<?php checked( $show_excerpt ); ?> id="<?php echo $this->get_field_id( 'show_excerpt' ); ?>" name="<?php echo $this->get_field_name( 'show_excerpt' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'show_excerpt' ); ?>"><?php _e( 'Afficher les extraits', 'uqam-babillard' ); ?></label></p>