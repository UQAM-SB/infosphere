<?php
/**
 * @package Evenements
 */
$instance = wp_parse_args(
        (array) $instance, array( 'title' => '',
                                  'compte_evenements' => '',
                                  'organizations_tags_evenements' => '',
                                  'id_evenements' => '',
                                  'widget_class' => '',
                                  'wrapper_class' => '',
                                  'item_class' => '',
                                  'n_evenements' => '',
                                  'images' => '',
                                  'excerpt' => '')

);
$compte_evenements = (!empty( $instance['compte_evenements'])) ? $instance['compte_evenements'] : '';
$organizations_tags_evenements = (!empty( $instance['organizations_tags_evenements'])) ? $instance['organizations_tags_evenements'] : '';
$id_evenements = (!empty($instance['id_evenements'])) ? $instance['id_evenements'] : '';
$recherche_unite_evenements = (!empty($instance['recherche_unite_evenements'])) ? $instance['recherche_unite_evenements'] : '';
$widget_class = (!empty($instance['widget_class'])) ? $instance['widget_class'] : '';
$wrapper_class = (!empty($instance['wrapper_class'])) ? $instance['wrapper_class'] : '';
$item_class = (!empty($instance['item_class'])) ? $instance['item_class'] : '';
$n_evenements = (!empty($instance['n_evenements'])) ? $instance['n_evenements'] : '';
$hide_images = (!empty($instance['hide_images'])) ? (bool) $instance['hide_images'] : null;
$images = (!empty($instance['images'])) ? $instance['images'] : '';
$excerpt = (!empty($instance['excerpt'])) ? $instance['excerpt'] : '';
?>
    <p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'evenements'); ?>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
        </label>
    </p>
    <p>
        <label><?php _e('Calendrier', 'evenements'); ?> :</label><br>
        <label class="radio-inline">
            <input
                    type="radio"
    			<?php checked( $instance[ 'compte_evenements' ], 'uqam' ); ?>
                    id="<?php echo $this->get_field_id( 'uqam' ); ?>"
                    name="<?php echo $this->get_field_name('compte_evenements'); ?>"
                    value="uqam"
            /><?php _e( 'UQAM', 'evenements' ); ?>
        </label>
        <label class="radio-inline">
            <input
                    type="radio"
    			<?php checked( $instance[ 'compte_evenements' ], 'esg' ); ?>
                    id="<?php echo $this->get_field_id( 'esg' ); ?>"
                    name="<?php echo $this->get_field_name('compte_evenements'); ?>"
                    value="esg"
            /><?php _e( 'ESG', 'evenements' ); ?>
        </label>
    </p>
    <p>
        <label><?php _e('Type de calendrier', 'evenements'); ?> :</label><br>
        <label class="radio-inline">
            <input
                    type="radio"
    			<?php checked( $instance[ 'organizations_tags_evenements' ], 'organizations' ); ?>
                    id="<?php echo $this->get_field_id( 'organizations' ); ?>"
                    name="<?php echo $this->get_field_name('organizations_tags_evenements'); ?>"
                    value="organizations"
            /><?php _e( 'Organisations', 'evenements' ); ?>
        </label>
        <label class="radio-inline">
            <input
                    type="radio"
    			<?php checked( $instance[ 'organizations_tags_evenements' ], 'tags' ); ?>
                    id="<?php echo $this->get_field_id( 'tags' ); ?>"
                    name="<?php echo $this->get_field_name('organizations_tags_evenements'); ?>"
                    value="tags"
            /><?php _e( 'Tags', 'evenements' ); ?>
        </label>
    </p>
    <div class="selectize">
        <label for="<?php echo $this->get_field_id('id_evenements'); ?>"><?php _e('ID Calendrier:', 'evenements'); ?>
            <span class="spinner spinner-evenements"></span>
            <input class="widefat" id="<?php echo $this->get_field_id('id_evenements'); ?>" name="<?php echo $this->get_field_name('id_evenements'); ?>" type="text" placeholder="Rechercher un calendrier par nom" value="<?php echo esc_attr($instance['id_evenements']); ?>" />
            <span class="no-results hidden"><?php _e('Aucun résultat', 'evenements'); ?></span>
        </label>
        <script>
            (function($) {

                var recherche_unite = $('#<?php echo $this->get_field_id("id_evenements"); ?>');
                var id_unite = $('#<?php echo $this->get_field_id("id_evenements"); ?>');
                var compte_name = $('[name="<?php echo $this->get_field_name("compte_evenements"); ?>"]').attr('name');
                var organizations_tags_name = $('[name="<?php echo $this->get_field_name("organizations_tags_evenements"); ?>"]').attr('name');

                var compte = $('[name="'+compte_name+'"]:checked').val();
                var organizations_tags = $('[name="'+organizations_tags_name+'"]:checked').val();

                if( (recherche_unite.attr('id') != 'widget-evenements-__i__-id_evenements') ){
                    select_init($(id_unite), compte, organizations_tags );
                    if( ((organizations_tags === undefined) || (compte === undefined)) ){
                        $(id_unite)[0].selectize.disable();
                    }
                }
                function select_init(id_unite, compte, organizations_tags ){
                    id_unite.selectize({
                        delimiter: ',',
                        persist: false,
                        valueField: 'id',
                        labelField: 'name',
                        searchField: ['name', 'id'],
                        create: false,
                        render: {
                            option: function (item, escape) {
                                return '<div>' +
                                    '<span class="title">' +
                                    '<span class="name">' + escape(item.name) + '</span>' +
                                    '</span>' +
                                    '<span class="description">' + escape(item.id) + '</span>' +
                                    '</div>';
                            }
                        },
                        score: function () {
                            return function () {
                                return 1;
                            };
                        },
                        load: function (query, callback) {
                            var self = this;
                            if (query.length < 3) return callback();
                            $.ajax({
                                url: '/wp-json/caligram/v1/organizations_tags/' + compte + '/' + organizations_tags + '/' + encodeURIComponent(query),
                                delay: 250,
                                type: 'GET',
                                dataType: 'json',
                                contentType: "application/json; charset=utf-8",
                                data: {},
                                error: function () {
                                    console.log('fail:');
                                    self.close();
                                    self.clearOptions();
                                    callback();
                                },
                                success: function (res) {
                                    console.log(res);
                                    self.clearOptions();
                                    self.refreshOptions();
                                    if(res.length == 0){
                                        id_unite.next().next('.no-results').removeClass('hidden');
                                    }
                                    id_unite.prev('.spinner-evenements').removeClass('is-active');
                                    callback(res);
                                }
                            });
                        },
                        onChange: function (value) {
                            console.log(value);
                            if (value === null) {
                                id_unite.val(null);
                                id_unite.next().next('.no-results').delay(800).removeClass('hidden');
                            } else {
                                id_unite.val(value.toString());
                                id_unite.next().next('.no-results').addClass('hidden');
                            }
                        },
                        onType: function (text) {
                            if (this.currentResults.items.length) {
                                id_unite.next().next('.no-results').addClass('hidden');
                            }
                            if (text.length < 3) {
                                id_unite.next().next('.no-results').addClass('hidden');
                                id_unite.prev('.spinner-evenements').removeClass('is-active');
                            } else {
                                id_unite.prev('.spinner-evenements').addClass('is-active');
                            }
                            if (!text.length) {
                                id_unite.next().next('.no-results').addClass('hidden');
                            }
                        }
                    });
                }

                $(document).on('widget-added', function(event, widget){
                    var this_widget = $(widget);
                    if(widget.context.id.includes("evenements")){
                        id_unite = $( '#'+ this_widget.attr('id') + ' [name$="[id_evenements]"]');
                        compte_name = $( this_widget ).find( '[name$="[compte_evenements]"]' ).attr('name');
                        compte = $('[name="'+compte_name+'"]:checked').val();
                        organizations_tags_name = $( this_widget ).find( '[name$="[organizations_tags_evenements]"]' ).attr('name');
                        organizations_tags = $('[name="'+organizations_tags_name+'"]:checked').val();

                        select_init($(id_unite), compte, organizations_tags );

                        if( (this_widget.attr('id') !== 'widget-evenements-__i__-id_evenements') && ((organizations_tags === undefined) || (compte === undefined)) ){
                            $(id_unite)[0].selectize.disable();
                        }
                    }
                });

                $('#widgets-right').on('change', ':radio', function (event) {
                    var widget_parent = event.target.offsetParent.id;
                    id_unite = $( '#'+ widget_parent + ' [name$="[id_evenements]"]');
                    compte = $('#'+widget_parent+' [name$="[compte_evenements]"]:checked').val();
                    organizations_tags = $('#'+widget_parent+' [name$="[organizations_tags_evenements]"]:checked').val();

                    if( (typeof compte !== undefined) && (organizations_tags !== undefined) ){
                        $(id_unite).val('');
                        $(id_unite)[0].selectize.enable();
                        $(id_unite)[0].selectize.destroy();
                        select_init($(id_unite), compte, organizations_tags );
                    }
                });
            })( jQuery );
        </script>
    </div>
    <p>
        <label for="<?php echo $this->get_field_id( 'number_entries' ); ?>"><?php _e( 'Nombre à afficher :', 'evenements' ); ?></label>
        <select id="<?php echo $this->get_field_id( 'n_evenements' ); ?>" name="<?php echo $this->get_field_name( 'n_evenements' ); ?>">
            <option value="1" <?php selected( $n_evenements, 1 ); ?>>1</option>
            <option value="3" <?php selected( $n_evenements, 3 ); ?>>3</option>
            <option value="4" <?php selected( $n_evenements, 4 ); ?>>4</option>
            <option value="6" <?php selected( $n_evenements, 6 ); ?>>6</option>
        </select>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'hide_images' ); ?>"><?php _e( 'Masquer les images :', 'evenements' ); ?>
            <input type="checkbox" <?php checked( $hide_images, '1' ); ?> id="<?php echo $this->get_field_id( 'hide_images' ); ?>" name="<?php echo $this->get_field_name( 'hide_images' ); ?>" value = "1"/>
        </label>
    </p>
    <details>
        <summary><span><?php _e( 'Personalisation des classes css', 'evenements' );  ?></span></summary>
        <div>
            <div>
                <label for="<?php echo $this->get_field_id('widget_class'); ?>"><?php _e('Widget class:', 'evenements'); ?>
                    <input class="widefat" id="<?php echo $this->get_field_id('widget_class'); ?>" name="<?php echo $this->get_field_name('widget_class'); ?>" type="text" placeholder="container custom" value="<?php echo esc_attr($instance['widget_class']); ?>" />
                </label>
            </div>
            <div>
                <label for="<?php echo $this->get_field_id('wrapper_class'); ?>"><?php _e('Wrapper class:', 'evenements'); ?>
                    <input class="widefat" id="<?php echo $this->get_field_id('wrapper_class'); ?>" name="<?php echo $this->get_field_name('wrapper_class'); ?>" type="text" placeholder="row" value="<?php echo esc_attr($instance['wrapper_class']); ?>" />
                </label>
            </div>
            <div>
                <label for="<?php echo $this->get_field_id('item_class'); ?>"><?php _e('Item class:', 'evenements'); ?>
                    <input class="widefat" id="<?php echo $this->get_field_id('item_class'); ?>" name="<?php echo $this->get_field_name('item_class'); ?>" type="text" placeholder="col-sm-4" value="<?php echo esc_attr($instance['item_class']); ?>" />
                </label>
            </div>
        </div>
    </details>
<?php
