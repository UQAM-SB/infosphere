<?php
/**
 * index.php
 * Page par défault
 */

get_template_part( 'template-parts/partials/before', 'main-content' ); ?>

<div class="mb-lg-5 pb-3 pr-lg-3 <?php echo ( is_home() ? 'home' : ''); ?>">
    <?php // a configurer selon les choix customizer
    if (have_posts()) : while (have_posts()) :
        the_post();
        the_title('<h1 class="mb-4">', '</h1>');

        the_content();

    
    $fields = get_fields();
    
    
echo '<div class="card"><div class="card-body">';
echo '<ul>';
   foreach ($fields as $key => $value) {
       
       if (is_array($value)) {
            foreach ($value as $key => $val) {
                if (!empty($val)) {
                  '<li>'. $key . ' : ' . $val . '</li>';
                }
            }
       } else {
            if (!empty($value)) {
   echo '<li>'. $key . ' : ' . $value. '</li>';
            }
       }
   };
     echo '</ul>';
  echo '</div></div>';  
    
    
        edit_post_link(
            sprintf(
            /* translators: %s: Name of current post */
                __( 'Edit<span class="screen-reader-text"> "%s"</span>', 'gabarit-universel' ),
                get_the_title()
            ),
            '<p class="edit-link">',
            '</p>'
        );
    

    endwhile;endif;
    ?>
</div>

<?php get_template_part( 'template-parts/partials/after', 'main-content' ); ?>