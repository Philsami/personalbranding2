<?php
/**
 * Template part for displaying post content in index.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Travelogged
 */
if ( have_posts() ) {
    while ( have_posts() ) { the_post();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-post">
		<figure>
			<?php if ( has_post_thumbnail() ) { ?>
			<div class="post-img">
				<img src="<?php the_post_thumbnail_url(); ?>" class="img-fluid" alt="<?php the_title(); ?>">
				<h6 class="post_date"><span><?php echo esc_html( get_the_date() ); ?></span></h6>
			</div>
			<?php } ?>
			<figcaption class="blog_post-catipon-inner text-left">
				<h4> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a> </h4>
				<ul class="nav like_cmt_shr">
					<li>
						<a href="<?php  echo esc_url( get_author_posts_url(  get_the_author_meta( 'ID' ) ) ) ?>">
							<i class="far fa-user-circle"> </i> <?php the_author(); ?>
						</a>
					</li>
					<?php if ( get_the_tag_list() != '' ) { ?>
						<li><i class="fa fa-tag"> </i> <?php the_tags( ); ?></li>
					<?php } ?>
					<li>
						<i class="fa fa-comments"> </i>
						<?php echo esc_html( get_comments_number() ); ?>
					</li>
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
<?php } else {  esc_attr_e( 'Oops, there are no posts.', 'travelogged' ); } wp_reset_postdata(); ?>