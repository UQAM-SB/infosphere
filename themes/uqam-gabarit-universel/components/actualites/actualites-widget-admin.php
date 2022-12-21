<?php
/**
 * @package Actualites
 */
$instance = wp_parse_args(
        (array) $instance,
        array(
                'title' => '',
                'url' => '',
                'page' => '',
                'label' => '',
                'n' => '3',
                'images' => true,
                'link' => true,
                'author' => '',
                'dates' => true,
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
?>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:', 'actualites'); ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
        </label>
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('url')); ?>" class="widefat"><?php _e('URL du fil:'); ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('url')); ?>" name="<?php echo esc_attr($this->get_field_name('url')); ?>" type="text" value="<?php echo esc_attr($instance[ 'url' ]); ?>" />
        </label>
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('page')); ?>" class="widefat"><?php _e('Lien:'); ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('page')); ?>" name="<?php echo esc_attr($this->get_field_name('page')); ?>" type="text" value="<?php echo esc_attr($instance[ 'page' ]); ?>" />
        </label>
        <label for="<?php echo esc_attr($this->get_field_id('label')); ?>" class="widefat"><?php _e('Libellé du lien:'); ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('label')); ?>" name="<?php echo esc_attr($this->get_field_name('label')); ?>" type="text" value="<?php echo esc_attr($instance[ 'label' ]); ?>" />
        </label>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'n' ); ?>"><?php _e( 'Nombre à afficher :', 'actualites' ); ?></label>
        <select id="<?php echo $this->get_field_id( 'n' ); ?>" name="<?php echo $this->get_field_name( 'n' ); ?>">
            <option value="1" <?php selected( $instance[ 'n' ], 1 ); ?>>1</option>
            <option value="3" <?php selected( $instance[ 'n' ], 3 ); ?>>3</option>
            <option value="4" <?php selected( $instance[ 'n' ], 4 ); ?>>4</option>
            <option value="6" <?php selected( $instance[ 'n' ], 6 ); ?>>6</option>
        </select>
    </p>
    <p>
        <label>
            <input
                    type="checkbox"
				<?php checked( $instance[ 'images' ], '1' ); ?>
                    id="<?php echo $this->get_field_id( 'images' ); ?>"
                    name="<?php echo $this->get_field_name('images'); ?>"
                    value="1"
            /><?php _e( 'Afficher les images', 'actualites' ); ?>
        </label>
    </p>
    <p>
        <label>
            <input
                    type="checkbox"
			    <?php checked( $instance[ 'link' ], '1' ); ?>
                    id="<?php echo $this->get_field_id( 'link' ); ?>"
                    name="<?php echo $this->get_field_name('link'); ?>"
                    value="1"
            /><?php _e( 'Lier les titres aux l\'URL', 'actualites' ); ?>
        </label>
    </p>
    <p>
        <label>
            <input
                    type="checkbox"
			    <?php checked( $instance[ 'author' ], '1' ); ?>
                    id="<?php echo $this->get_field_id( 'author' ); ?>"
                    name="<?php echo $this->get_field_name('author'); ?>"
                    value="1"
            /><?php _e( 'Afficher les auteurs', 'actualites' ); ?>
        </label>
    </p>
    <details>
        <summary><span><?php _e( 'Dates', 'actualites' );  ?></span></summary>
        <div>
            <p>
                <label>
                    <input
                            type="checkbox"
			            <?php checked( $instance[ 'dates' ], '1' ); ?>
                            id="<?php echo $this->get_field_id( 'dates' ); ?>"
                            name="<?php echo $this->get_field_name('dates'); ?>"
                            value="1"
                    /><?php _e( 'Afficher les dates', 'actualites' ); ?>
                </label>
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('dates_f')); ?>"><?php _e('Format PHP:', 'actualites'); ?>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('dates_f')); ?>" name="<?php echo esc_attr($this->get_field_name('dates_f')); ?>" type="text" value="<?php echo esc_attr($instance['dates_f']); ?>" />
                </label>
            </p>

        </div>
    </details>
    <details>
        <summary><span><?php _e( 'Extraits', 'actualites' );  ?></span></summary>
        <div>
            <p>
                <label>
                    <input
                            type="checkbox"
				        <?php checked( $instance[ 'extraits' ], '1' ); ?>
                            id="<?php echo $this->get_field_id( 'extraits' ); ?>"
                            name="<?php echo $this->get_field_name('extraits'); ?>"
                            value="1"
                    /><?php _e( 'Afficher les extraits', 'actualites' ); ?>
                </label>
            </p>
            <p>
                <label>
                    <input
                            type="checkbox"
				        <?php checked( $instance[ 'extraits_a' ], '1' ); ?>
                            id="<?php echo $this->get_field_id( 'extraits_a' ); ?>"
                            name="<?php echo $this->get_field_name('extraits_a'); ?>"
                            value="1"
                    /><?php _e( 'Liens dans l\'extrait', 'actualites' ); ?>
                </label>
            </p>
            <p>
                <label>
                    <input
                            type="checkbox"
				        <?php checked( $instance[ 'extraits_h' ], '1' ); ?>
                            id="<?php echo $this->get_field_id( 'extraits_h' ); ?>"
                            name="<?php echo $this->get_field_name('extraits_h'); ?>"
                            value="1"
                    /><?php _e( 'Titres dans l\'extrait', 'actualites' ); ?>
                </label>
            </p>
            <p>
                <label>
                    <input
                            type="checkbox"
				        <?php checked( $instance[ 'extraits_m' ], '1' ); ?>
                            id="<?php echo $this->get_field_id( 'extraits_m' ); ?>"
                            name="<?php echo $this->get_field_name('extraits_m'); ?>"
                            value="1"
                    /><?php _e( 'Emphases dans l\'extrait', 'actualites' ); ?>
                </label>
            </p>
        </div>
    </details>
	<details>
		<summary><span><?php _e( 'Classes CSS', 'actualites' );  ?></span></summary>
		<div>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('widget_class')); ?>"><?php _e('Widget class:', 'actualites'); ?>
					<input class="widefat" id="<?php echo esc_attr($this->get_field_id('widget_class')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_class')); ?>" type="text" placeholder="container custom" value="<?php echo esc_attr($instance['widget_class']); ?>" />
				</label>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('wrapper_class')); ?>"><?php _e('Wrapper class:', 'actualites'); ?>
					<input class="widefat" id="<?php echo esc_attr($this->get_field_id('wrapper_class')); ?>" name="<?php echo esc_attr($this->get_field_name('wrapper_class')); ?>" type="text" placeholder="row" value="<?php echo esc_attr($instance['wrapper_class']); ?>" />
				</label>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('item_class')); ?>"><?php _e('Item class:', 'actualites'); ?>
					<input class="widefat" id="<?php echo esc_attr($this->get_field_id('item_class')); ?>" name="<?php echo esc_attr($this->get_field_name('item_class')); ?>" type="text" placeholder="col-sm-4 itemImg2ColXs" value="<?php echo esc_attr($instance['item_class']); ?>" />
				</label>
			</p>
		</div>
	</details>
    <br>
<?php
