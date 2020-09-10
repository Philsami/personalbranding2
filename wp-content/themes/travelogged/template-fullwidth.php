<?php
/**
 * Template Name: Full Width 
 * Template Post Type: page
 *
 * @package Travelogged
 */
get_header();
get_template_part( 'inc/header-section' );
?> 

<div class="page-blog main-container post-details">
	<main id="main" class="site-main">
		<div class="space container ">
			  <div class="row">
				<div class="col-lg-12 col-md-12 view_post">
					<?php get_template_part( 'template-parts/content','page' ); ?>
			   </div>
			</div>
		</div>
	</main>
</div>

<?php get_footer(); ?>