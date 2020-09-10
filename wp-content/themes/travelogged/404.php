<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Travelogged
 */
 
get_header(); 
get_template_part( 'inc/header-section' ) ?>
<section class="page-not-found">
    <div class="container page_cnt space">
		<div class="row">
			<div class="col-lg-8 col-md-12 content-center">
				<div class="page-not-found-inner">
					<h1> <?php esc_html_e( '404...', 'travelogged' ); ?> </h1>
					<h2> <?php esc_html_e( 'The search content is not found, Please try again...', 'travelogged' ); ?> </h2>
					<div class="text-center">
						<a class="btn main-btn" href="<?php echo esc_url( home_url() ); ?>">
							<i class="fas fa-angle-double-left"> </i>
							<?php esc_html_e( 'Back to Home', 'travelogged' ); ?>
						</a>
					</div>
				</div>
			</div>
			<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
<aside id="secondary" class="col-lg-4 col-md-12 sidebar">
   <?php dynamic_sidebar( 'sidebar-1' );  ?>
</aside> <!-- #secondary -->
<?php } else { ?>
<aside id="secondary" class="col-lg-4 col-md-12 sidebar">
<p class="widget-notice"><?php esc_html_e('Please Add The Widgets First','travelogged'); ?></p>
</aside> <!-- #secondary -->
<?php } ?>
		</div>
    </div>
</section>

<?php get_footer(); ?>