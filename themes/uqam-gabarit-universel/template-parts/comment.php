<?php
/**
 * comment.php
 * Template part -- comment
 * Gestion des commentaires
 */
    ?>

<div <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
    <div class="comment">
        <div class="comment-block">
            <div class="comment-arrow"></div>

            <?php if ($comment->comment_approved == '0') : ?>
                <em><?php esc_html_e('Your comment is awaiting moderation.','gabarit-universel') ?></em>
                <br />
            <?php endif; ?>

            <span class="comment-by">
                <strong><?php echo get_comment_author() ?></strong>
            </span>

            <span class="date float-right">
                <?php printf( esc_html__('%1$s at %2$s' , 'gabarit-universel'), get_comment_date(),  get_comment_time()) ?>
            </span>

            <?php comment_text() ?>
        </div>
    </div>
</div>

<?php
