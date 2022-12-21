<?php
/**
 * sidebarSocialMedia.php
 */

if ( is_active_sidebar( 'social-media-sidebar' ) ) : ?>
    <div class="social-media-wrapper px-3"><?php dynamic_sidebar( 'social-media-sidebar' ); ?></div>
<?php endif; ?>