<?php
/**
 * Template part for displaying post content in search.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Travelogged
 */
if ( have_posts() ) {
while ( have_posts() ) { the_post(); 
?>

<!-- Post starts here -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-post">
		<figure>
			<?php if ( has_post_thumbnail() ) { ?>
			<div class="post-img">
				<img src="<?php the_post_thumbnail_url(); ?>" class="img-fluid " alt="<?php the_title(); ?>">
			</div>
			<?php } ?>
			<figcaption class="blog_post-catipon-inner text-left">
				<h4> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a> </h4>
				<ul class="nav like_cmt_shr">
					<li><i class="fa fa-tag"> </i> <?php the_category( ',' ); ?></li>
					<li><i class="fa fa-comments"> </i> <?php echo esc_attr( get_comments_number() ); ?></li>
				</ul>
				<p><?php the_excerpt(); ?></p>
				<a class="btn" href="<?php the_permalink(); ?>">
					<?php esc_attr_e( 'Read more','travelogged' ); ?>
					<i class="fas fa-angle-double-right"></i>
				</a>
			</figcaption>
		</figure>
	</div>
</article>
<!--Post ends here-->
<?php } ?>
	<ul class="pagination">
		<?php echo wp_kses_post( paginate_links() ); ?>
	</ul>
<?php } else { ?> 
	<div class="error_404">
		<p><?php esc_html_e('We`re sorry, but the page you are looking for doesn`t exist.','travelogged'); ?></p>
		<p><a href="<?php echo esc_url(home_url( '/' )); ?>">
		<button class="travelogged_send_button" type="submit"><?php esc_html_e('Go To Homepage','travelogged'); ?></button></a></p>
	</div>
<?php } wp_reset_postdata(); ?>