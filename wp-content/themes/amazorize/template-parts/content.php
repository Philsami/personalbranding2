<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Amazorize
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-list posts-entry fbox'); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		
		<div class="featured-thumbnail">
			<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail('amazorize-large'); ?></a>
		</div>

	<?php else : ?>

		<div class="featured-thumbnail">
			<a href="<?php the_permalink() ?>" rel="bookmark"><img class="wp-post-image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/default-large.jpg" alt="<?php echo esc_attr( the_title_attribute() ); ?>" /></a>
		</div>

	<?php endif; ?>

	<div class="entry-content">

		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php amazorize_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</header><!-- .entry-header -->

		<?php
			the_excerpt( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'amazorize' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'amazorize' ),
				'after'  => '</div>',
			) );
		?>

		<p class="more-link-wrap">
			<a href="<?php the_permalink() ?>"><?php echo esc_html__( 'Continue Reading &rarr;', 'amazorize' ); ?></a>
		</p>
	</div><!-- .entry-content -->
	
</article><!-- #post-<?php the_ID(); ?> -->
