<?php
/**
 * The template for displaying tags pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Travelogged
 */
get_header(); 
get_template_part( 'inc/header-section' ) ?>

<div class="page-blog main-container space-top">
	<main id="main" class="site-main">
		<div class="container">
			<div class="blog-post-all row">
				<!--blog-post-->
				<div class="col-lg-8 col-md-12">
					<?php get_template_part( 'template-parts/content','post' ); ?>
				</div>
			   <?php get_sidebar(); ?>
			</div>
		</div>
	</main>
</div>

<?php get_footer(); ?>