<?php 
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Travelogged
 */
get_header();
get_template_part( 'inc/header-section' ); ?>

<div class="page-blog main-container space-top">
	<div class="container">
		<div class="blog-post-all row">
			<div class="col-lg-8 col-md-12">
				<main id="main" class="site-main">
					<?php get_template_part('template-parts/content', 'post'); ?>
				</main>
			</div>
			<div class="col-lg-4">
		   <?php get_sidebar(); ?>
		   </div>
		</div>
	</div>
</div>

<?php get_footer(); ?>