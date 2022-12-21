<?php
/**
 * widget-social-media.php
 * Widget pour gérer l'affichage des médias sociaux
 */


// Adds Social media widget
class GU_Social_Media_Widget extends WP_Widget {

    // Register widget with WordPress
    function __construct() {
        parent::__construct(
            'social_media_widget', // Base ID
            esc_html__( 'Médias sociaux (liens)', 'gabarit-universel' ), // Name
            array( 'description' => esc_html__( 'Affichage des médias sociaux', 'gabarit-universel' ), ) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        echo $args['before_widget'];

        echo '<div id="wrapper-social-media" class="text-center">';

        $counter = 2; // Nombre d'icônes à afficher sur une même ligne que le titre
        $non_empty_instances = array_filter($instance);
        $nb_of_instances = count($non_empty_instances);

        if ( ! empty( $instance['title'] ) ) {
            $nb_of_instances = $nb_of_instances -1;
        }

        if ( $nb_of_instances <= $counter ) {
            echo '<ul class="mb-0 list-inline ">';
            if (!empty( $instance['title'] )) {echo '<li class="list-inline-item align-middle follow-us">'. $instance['title'] .'</li>';}
        } else {
            echo '<div class="col-xl-12 text-center text-nowrap follow-us">'. $instance['title'] . '</div>
                  <div class="text-center media-icons">
                  <ul class="mb-0 list-inline">';
        }

        if ( ! empty( $instance['facebook'] ) ) {
            echo '<li class="list-inline-item"><a href="'. $instance['facebook'] .'"><svg class="icon"><use xlink:href="#facebook-icon" />Facebook</svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
            <a class="hide-on-fallback">
            <symbol id="facebook-icon"viewBox="0 0 24 24">
            <title>Facebook</title>
            <path class="cls-1" d="M24,0H0V24H12.85V14.74H9.72V11.11h3.13V8.44c0-3.1,1.89-4.79,4.66-4.79a25.7,25.7,0,0,1,2.8.14V7H18.39c-1.5,0-1.8.71-1.8,1.76v2.31h3.59l-.47,3.62H16.59V24H24Z"/>
            </symbol>
            </a>
            <image src="https://gabarit-adaptatif.uqam.ca/statique/images/icones/png/facebook_coul_carre@2x.png" xlink:href="">
            </svg></a></li>';
        }

        if ( ! empty( $instance['twitter'] ) ) {
            echo '<li class="list-inline-item"><a href="'. $instance['twitter'] .'"><svg class="icon"><use xlink:href="#twitter-icon" />Twitter</svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
            <a class="hide-on-fallback">
            <symbol id="twitter-icon" viewBox="0 0 24 24">
            <title>Twitter</title>
            <path class="cls-1" d="M24,0H0V24H24ZM18.36,8.74q0,.21,0,.42A9.34,9.34,0,0,1,4,17a6.63,6.63,0,0,0,4.86-1.36,3.29,3.29,0,0,1-3.07-2.28,3.28,3.28,0,0,0,1.48-.06,3.28,3.28,0,0,1-2.63-3.22v0a3.27,3.27,0,0,0,1.49.41,3.29,3.29,0,0,1-1-4.38,9.32,9.32,0,0,0,6.77,3.43,3.28,3.28,0,0,1,5.59-3,6.57,6.57,0,0,0,2.08-.8,3.29,3.29,0,0,1-1.44,1.82A6.57,6.57,0,0,0,20,7,6.67,6.67,0,0,1,18.36,8.74Z"/>
            </symbol>
            </a>
            <image src="https://gabarit-adaptatif.uqam.ca/statique/images/icones/png/twitter_coul_carre@2x.png" xlink:href="">
            </svg>
            </a></li>';
        }

        if ( ! empty( $instance['instagram'] ) ) {
            echo '<li class="list-inline-item"><a href="'. $instance['instagram'] .'"><svg class="icon"><use xlink:href="#instagram-icon" />Instagram</svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
            <a class="hide-on-fallback">
            <symbol id="instagram-icon" viewBox="0 0 24 24">
            <title>Instagram</title>
            <path class="cls-1" d="M12,2.16c3.2,0,3.58,0,4.85.07a6.64,6.64,0,0,1,2.23.41,3.72,3.72,0,0,1,1.38.9,3.72,3.72,0,0,1,.9,1.38,6.64,6.64,0,0,1,.41,2.23c.06,1.27.07,1.64.07,4.85s0,3.58-.07,4.85a6.64,6.64,0,0,1-.41,2.23,4,4,0,0,1-2.28,2.28,6.64,6.64,0,0,1-2.23.41c-1.27.06-1.64.07-4.85.07s-3.58,0-4.85-.07a6.64,6.64,0,0,1-2.23-.41,3.72,3.72,0,0,1-1.38-.9,3.72,3.72,0,0,1-.9-1.38,6.64,6.64,0,0,1-.41-2.23c-.06-1.27-.07-1.64-.07-4.85s0-3.58.07-4.85a6.64,6.64,0,0,1,.41-2.23,3.72,3.72,0,0,1,.9-1.38,3.72,3.72,0,0,1,1.38-.9,6.64,6.64,0,0,1,2.23-.41C8.42,2.17,8.8,2.16,12,2.16M12,0C8.74,0,8.33,0,7.05.07A8.81,8.81,0,0,0,4.14.63,5.88,5.88,0,0,0,2,2,5.88,5.88,0,0,0,.63,4.14,8.81,8.81,0,0,0,.07,7.05C0,8.33,0,8.74,0,12s0,3.67.07,4.95a8.81,8.81,0,0,0,.56,2.91A5.88,5.88,0,0,0,2,22a5.88,5.88,0,0,0,2.13,1.38,8.81,8.81,0,0,0,2.91.56C8.33,24,8.74,24,12,24s3.67,0,4.95-.07a8.81,8.81,0,0,0,2.91-.56,6.14,6.14,0,0,0,3.51-3.51,8.81,8.81,0,0,0,.56-2.91C24,15.67,24,15.26,24,12s0-3.67-.07-4.95a8.81,8.81,0,0,0-.56-2.91A5.88,5.88,0,0,0,22,2,5.88,5.88,0,0,0,19.86.63,8.81,8.81,0,0,0,16.95.07C15.67,0,15.26,0,12,0Z"/>
            <path class="cls-1" d="M12,5.84A6.16,6.16,0,1,0,18.16,12,6.16,6.16,0,0,0,12,5.84ZM12,16a4,4,0,1,1,4-4A4,4,0,0,1,12,16Z"/>
            <circle class="cls-1" cx="18.41" cy="5.59" r="1.44"/>
            </symbol>
            </a>
            <image src="https://gabarit-adaptatif.uqam.ca/statique/images/icones/png/instagram_coul@2x.png" xlink:href="">
            </svg>
            </a></li>';
        }

        if ( ! empty( $instance['snapchat'] ) ) {
            echo '<li class="list-inline-item"><a href="'. $instance['snapchat'] .'"><svg class="icon"><use xlink:href="#snapchat-icon" />Snapchat</svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
            <a class="hide-on-fallback">
            <symbol id="snapchat-icon" viewBox="0 0 24 24">
            <title>Snapchat</title>
            <path class="cls-1" d="M24,0H0V24H24ZM20.91,16.79c-.18.43-1,.74-2.36,1a1.73,1.73,0,0,0-.13.42c0,.14-.06.27-.1.42a.4.4,0,0,1-.42.31h0a2.24,2.24,0,0,1-.41-.05,4.77,4.77,0,0,0-1-.1,4.2,4.2,0,0,0-.69.06,3.26,3.26,0,0,0-1.29.66,4.05,4.05,0,0,1-2.46,1h-.22a4.05,4.05,0,0,1-2.46-1,3.25,3.25,0,0,0-1.29-.66,4.21,4.21,0,0,0-.69-.06,4.74,4.74,0,0,0-1,.11,2.26,2.26,0,0,1-.41.06.42.42,0,0,1-.44-.32c0-.15-.07-.29-.1-.42a1.75,1.75,0,0,0-.13-.43c-1.41-.22-2.18-.53-2.36-1a.5.5,0,0,1,0-.17.37.37,0,0,1,.31-.39,5.28,5.28,0,0,0,3.58-3v0A.8.8,0,0,0,7,12.55c-.14-.33-.66-.5-1-.61l-.26-.09c-.83-.33-.95-.71-.9-1a.89.89,0,0,1,.87-.6.67.67,0,0,1,.28.06,2,2,0,0,0,.83.22.72.72,0,0,0,.35-.08c0-.14,0-.29,0-.44a9,9,0,0,1,.23-3.63A4.78,4.78,0,0,1,11.8,3.57h.36a4.79,4.79,0,0,1,4.44,2.86,9,9,0,0,1,.23,3.63v.05l0,.38a.69.69,0,0,0,.3.08,2.09,2.09,0,0,0,.77-.22.83.83,0,0,1,.34-.07,1,1,0,0,1,.37.07h0a.73.73,0,0,1,.55.63c0,.34-.3.64-.91.88l-.26.09c-.34.11-.86.27-1,.61a.8.8,0,0,0,.09.66v0a5.28,5.28,0,0,0,3.58,3,.37.37,0,0,1,.31.39A.5.5,0,0,1,20.91,16.79Z"/>
            </symbol>
            </a>
            <image src="https://gabarit-adaptatif.uqam.ca/statique/images/icones/png/snapchat_coul_carre@2x.png" xlink:href="">
            </svg>
            </a></li>';
        }

        if ( ! empty( $instance['youtube'] ) ) {
            echo '<li class="list-inline-item"><a href="'. $instance['youtube'] .'"><svg class="icon"><use xlink:href="#youtube-icon" />Youtube</svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
            <a class="hide-on-fallback">
            <symbol id="youtube-icon" viewBox="0 0 24 24">
            <title>Youtube</title>
            <path class="cls-1" d="M8.25,13.51v-1.1H4.57v1.1H5.81v6.72H7V13.51Zm2.13,6.72V19.6a1.69,1.69,0,0,1-1.21.72.65.65,0,0,1-.68-.43A3,3,0,0,1,8.4,19V14.4H9.46V18.7a3.13,3.13,0,0,0,0,.41c0,.16.11.25.25.25s.43-.16.67-.49V14.4h1.06v5.83Zm4-1.67c0,.53-.15.79-.46.79a.75.75,0,0,1-.53-.26V15.54a.76.76,0,0,1,.53-.26c.3,0,.46.27.46.8Zm1.06-.08V16.16A4.51,4.51,0,0,0,15.35,15a.84.84,0,0,0-.84-.66,1.43,1.43,0,0,0-1.09.63V12.41H12.35v7.82h1.06v-.57a1.44,1.44,0,0,0,1.09.65.84.84,0,0,0,.84-.66A4.67,4.67,0,0,0,15.45,18.48Zm2.93-1.85H17.33v-.54q0-.81.53-.81c.35,0,.53.27.53.81Zm1.06,1.74v-.15H18.36a6.88,6.88,0,0,1,0,.72.45.45,0,0,1-.47.42c-.36,0-.54-.27-.54-.81v-1h2.11V16.3a2.29,2.29,0,0,0-.33-1.37,1.47,1.47,0,0,0-1.25-.6,1.5,1.5,0,0,0-1.26.6,2.27,2.27,0,0,0-.33,1.37v2a2.25,2.25,0,0,0,.34,1.37,1.51,1.51,0,0,0,1.28.6,1.46,1.46,0,0,0,1.28-.63,1.52,1.52,0,0,0,.25-.63C19.43,18.94,19.44,18.71,19.44,18.37Z"/>
            <path class="cls-2" d="M24,0H0V24H24ZM14.21,3.41h1.06V7.75a2.5,2.5,0,0,0,0,.42c0,.17.11.25.25.25s.44-.17.67-.5V3.41h1.07V9.3H16.22V8.66A1.71,1.71,0,0,1,15,9.39a.65.65,0,0,1-.69-.44,3,3,0,0,1-.09-.88Zm-4,1.92a2.29,2.29,0,0,1,.33-1.39,1.45,1.45,0,0,1,1.24-.6,1.46,1.46,0,0,1,1.25.6,2.31,2.31,0,0,1,.33,1.39V7.4A2.31,2.31,0,0,1,13,8.78a1.46,1.46,0,0,1-1.25.6,1.46,1.46,0,0,1-1.24-.6,2.29,2.29,0,0,1-.33-1.39ZM7.33,1.4l.84,3.1L9,1.4h1.2L8.75,6.1V9.3H7.56V6.1a19.38,19.38,0,0,0-.72-2.5L6.08,1.4ZM20.43,20.58a2.21,2.21,0,0,1-1.89,1.72,58.68,58.68,0,0,1-6.54.24,58.67,58.67,0,0,1-6.54-.24,2.21,2.21,0,0,1-1.89-1.72,18.73,18.73,0,0,1-.3-4.13,18.71,18.71,0,0,1,.31-4.13A2.21,2.21,0,0,1,5.46,10.6,58.67,58.67,0,0,1,12,10.36a58.68,58.68,0,0,1,6.54.24,2.21,2.21,0,0,1,1.89,1.72,18.73,18.73,0,0,1,.3,4.13A18.69,18.69,0,0,1,20.43,20.58Z"/>
            <path class="cls-2" d="M11.76,8.42c.34,0,.51-.27.51-.82V5.12c0-.54-.16-.82-.51-.82s-.51.27-.51.82V7.6C11.25,8.14,11.41,8.42,11.76,8.42Z"/>
            </symbol>
            </a>
            <image src="https://gabarit-adaptatif.uqam.ca/statique/images/icones/png/youtube_coul_carre@2x.png" xlink:href="">
            </svg>
            </a></li>';
        }

        if ( ! empty( $instance['linkedin'] ) ) {
            echo '<li class="list-inline-item"><a href="'. $instance['linkedin'] .'"><svg class="icon"><use xlink:href="#linkedin-icon" />Linkedin</svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
            <a class="hide-on-fallback">
            <symbol id="linkedin-icon" viewBox="0 0 24 24">
            <title>LinkedIn</title>
            <path class="cls-1" d="M24,0H0V24H24ZM7,20.36H3.56V9H7ZM5.28,7.44a2,2,0,1,1,2-2A2,2,0,0,1,5.28,7.44Zm14.88,6v6.92H16.6V13.44s-.12-2-1.76-2c-1.92,0-2.16,2.56-2.16,2.56v6.32H9.24V9h3.44V10.8a4.48,4.48,0,0,1,3.56-2.12C20.36,8.68,20.16,13.44,20.16,13.44Z"/>
            </symbol>
            </a>
            <image src="https://gabarit-adaptatif.uqam.ca/statique/images/icones/png/linkedin_coul_carre@2x.png" xlink:href="">
            </svg>
            </a></li>';
        }

        if ( ! empty( $instance['fils_rss'] ) ) {
            echo '<li class="list-inline-item"><a href="'. $instance['fils_rss'] .'"><svg class="icon"><use xlink:href="#fils_rss-icon" />Fils RSS</svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
            <a class="hide-on-fallback">
            <symbol id="fils_rss-icon" viewBox="0 0 24 24">
            <title>Fils RSS</title>
            <path class="cls-1" d="M24,0H0V24H24ZM6.39,19.7a2.14,2.14,0,1,1,2.14-2.14A2.14,2.14,0,0,1,6.39,19.7Zm5.38,0a7.53,7.53,0,0,0-2.2-5.35,7.45,7.45,0,0,0-5.31-2.21V9.06A10.64,10.64,0,0,1,14.86,19.71Zm5.47,0a13,13,0,0,0-13-13V3.57A16.12,16.12,0,0,1,20.33,19.72Z"/>
            </symbol>
            </a>
            <image src="https://gabarit-adaptatif.uqam.ca/statique/images/icones/png/rss_coul_carre@2x.png" xlink:href="">
            </svg>
            </a></li>';
        }

        echo '</ul>';

        if ($nb_of_instances > $counter) {
            echo '</div>';
        }

        echo '</div>';

        echo $args['after_widget'];
    }


    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {

        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'gabarit-universel' );
        $facebook = ! empty( $instance['facebook'] ) ? $instance['facebook'] : esc_html__( '', 'gabarit-universel' );
        $twitter = ! empty( $instance['twitter'] ) ? $instance['twitter'] : esc_html__( '', 'gabarit-universel' );
        $instagram = ! empty( $instance['instagram'] ) ? $instance['instagram'] : esc_html__( '', 'gabarit-universel' );
        $snapchat = ! empty( $instance['snapchat'] ) ? $instance['snapchat'] : esc_html__( '', 'gabarit-universel' );
        $youtube = ! empty( $instance['youtube'] ) ? $instance['youtube'] : esc_html__( '', 'gabarit-universel' );
        $linkedin = ! empty( $instance['linkedin'] ) ? $instance['linkedin'] : esc_html__( '', 'gabarit-universel' );
        $fils_rss = ! empty( $instance['fils_rss'] ) ? $instance['fils_rss'] : esc_html__( '', 'gabarit-universel' );
        ?>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Message d\'introduction:', 'gabarit-universel' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
            <small class="form-text text-muted">ex. Suivez-nous</small>
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php esc_attr_e( 'URL Facebook:', 'gabarit-universel' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>">
            <small class="form-text text-muted">ex. https://www.facebook.com/uqam1</small>
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><?php esc_attr_e( 'URL Twitter:', 'gabarit-universel' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>">
            <small class="form-text text-muted">ex. https://www.twitter.com/uqam</small>
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>"><?php esc_attr_e( 'URL Instagram:', 'gabarit-universel' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>" type="text" value="<?php echo esc_attr( $instagram ); ?>">
            <small class="form-text text-muted">ex. https://www.instagram.com/uqam</small>
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'snapchat' ) ); ?>"><?php esc_attr_e( 'URL Snapchat:', 'gabarit-universel' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'snapchat' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'snapchat' ) ); ?>" type="text" value="<?php echo esc_attr( $snapchat ); ?>">
            <small class="form-text text-muted">ex. https://www.snapchat.com/add/uqamofficiel</small>
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>"><?php esc_attr_e( 'URL Youtube:', 'gabarit-universel' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'youtube' ) ); ?>" type="text" value="<?php echo esc_attr( $youtube ); ?>">
            <small class="form-text text-muted">ex. https://www.youtube.com/user/UQAMtv</small>
        </p>


        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>"><?php esc_attr_e( 'URL LinkedIn:', 'gabarit-universel' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>" type="text" value="<?php echo esc_attr( $linkedin ); ?>">
            <small class="form-text text-muted">ex. https://www.linkedin.com/company/uqam</small>
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'fils_rss' ) ); ?>"><?php esc_attr_e( 'URL Fils RSS:', 'gabarit-universel' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'fils_rss' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'fils_rss' ) ); ?>" type="text" value="<?php echo esc_attr( $fils_rss ); ?>">
            <small class="form-text text-muted">ex. https://uqam.ca/fils-rss</small>
        </p>

        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {

        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
        $instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? sanitize_text_field( $new_instance['facebook'] ) : '';
        $instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? sanitize_text_field( $new_instance['twitter'] ) : '';
        $instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? sanitize_text_field( $new_instance['instagram'] ) : '';
        $instance['snapchat'] = ( ! empty( $new_instance['snapchat'] ) ) ? sanitize_text_field( $new_instance['snapchat'] ) : '';
        $instance['youtube'] = ( ! empty( $new_instance['youtube'] ) ) ? sanitize_text_field( $new_instance['youtube'] ) : '';
        $instance['linkedin'] = ( ! empty( $new_instance['linkedin'] ) ) ? sanitize_text_field( $new_instance['linkedin'] ) : '';
        $instance['fils_rss'] = ( ! empty( $new_instance['fils_rss'] ) ) ? sanitize_text_field( $new_instance['fils_rss'] ) : '';

        return $instance;
    }

}

// class GU_Social_Media_Widget
function gu_social_media_load_widget() {
    register_widget( 'GU_Social_Media_Widget' );
}
add_action( 'widgets_init', 'gu_social_media_load_widget' );