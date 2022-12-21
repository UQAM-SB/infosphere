<?php
/**
 * breadcrumb.php
 */ ?>

<section id="sub-header" class="container">
	<div id="sub-header-wrapper" class="row">
		<?php if ( function_exists('yoast_breadcrumb') ) {
		    yoast_breadcrumb( '<nav aria-label="Breadcrumb" class="breadcrumb-wrapper d-none d-lg-block col-lg-9"><ol class="breadcrumb container mb-0"><li>','</li></ol></nav>' );
		}
		if ( is_active_sidebar( 'language-switcher' ) ) : ?>
			<div id="language-switcher"  class="d-none d-lg-block col-lg-3">
				<?php dynamic_sidebar( 'language-switcher' ); ?>
			</div>
		<?php endif; ?>
	</div>
</section>
