<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Travelogged
 */
if( have_posts() ){ while ( have_posts() ){ the_post(); ?>

<!-- Post starts here -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-post">
		<figure>
			<?php if( has_post_thumbnail() ) { ?>
			<div class="post-img">
				<img src="<?php the_post_thumbnail_url(); ?>" class="img-fluid" alt="<?php the_title(); ?>">
				<h6 class="post_date"><span><?php echo esc_attr( get_the_date( 'd M Y' ) ); ?></span></h6>
			</div>
			<?php } ?>
			<figcaption class="blog_post-catipon-inner text-left">
				<h2><?php the_title(); ?></h2>
				<?php the_content();
					wp_link_pages(
					array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'travelogged' ),
						'after'  => '</div>',
					)
					); ?>
			</figcaption>
		</figure>
	</div>
</article>
<!--Post ends here-->

<?php
} } 
wp_reset_postdata(); ?>