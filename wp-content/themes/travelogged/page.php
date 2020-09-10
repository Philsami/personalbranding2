<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Travelogged
 */
get_header();
get_template_part( 'inc/header-section' );
?>
<div class="page-blog main-container post-details">
	<main id="main" class="site-main">
		<div class="space container">
			<div class="row">
				<div class="col-lg-8 col-md-12 view_post">
					<?php get_template_part( 'template-parts/content','page' ); ?>
				</div>
				<div class="col-lg-4">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
    </main>
</div>
<?php get_footer(); ?>