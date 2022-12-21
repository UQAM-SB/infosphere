<?php
/**
 * footer.php
 */
?>

            <footer id="mainframe-footer" class="<?php addFaculte(); ?>">
                <div class="container">
                    <div class="row pt-2 pb-2">
                        <?php locate_template( 'components/footer/footer-uqam.php', true ); ?>
                    </div>
                </div>
            </footer>
        </div><!-- mainframe -->
        <?php wp_footer(); ?>
    </body>
</html>