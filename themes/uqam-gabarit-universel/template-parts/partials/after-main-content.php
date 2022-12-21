<?php
/**
 * after-main-content.php
 * Template part -- after-main-content
 * Fichier qui est toujours appelé après le contenu principal
 */
?>

<!-- after-main-content.php -->

        <?php if ( is_active_sidebar( 'main-content-footer-area' ) ) : ?>
            <div id="main-content-footer" class="mb-6">
                <?php dynamic_sidebar( 'main-content-footer-area' ); ?>
            </div>
        <?php endif; ?>

    </main>

    <?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
        <div id="<?php echo ( is_front_page() ) ? 'sidebar-front' : 'sidebar'; ?>" class="col-lg-4 <?php echo ( is_front_page() ) ? colOrderSideBar() : ' pl-lg-4 '; ?> mb-0 mb-lg-6">
            <?php dynamic_sidebar( 'right-sidebar' ); ?>
        </div>
    <?php endif; ?>

</section>
</div><!-- content-center -->
</div><!-- grid-container -->
</div><!-- mainframe-body -->
</div><!-- mainframe-body-inner -->
</div><!-- mainframe-body-outer -->

<?php
get_footer();