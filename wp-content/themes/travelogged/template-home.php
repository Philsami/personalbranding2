<?php // Template Name: Home-page 
	 if ( wl_theme_is_companion_active() ) {
    	get_header(); 
	    get_template_part( 'home-sections/home', 'slider' );
	    get_template_part( 'home-sections/home', 'service' );
	    get_template_part( 'home-sections/home', 'destination' );
		get_template_part( 'home-sections/home', 'team' );
		get_template_part( 'home-sections/home', 'subscribe' );
		get_template_part( 'home-sections/home', 'blog' ); 
		
	} else {
		get_header(); 
		get_template_part( 'inc/header-section' );
?>
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
<?php
	}
	get_footer(); 
?>