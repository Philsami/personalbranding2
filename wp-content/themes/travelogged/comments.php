<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @package Travelogged
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) { ?>
	<h2 class="comments-title">
		<?php
		if ( 1 === get_comments_number() ) {
			printf(
				/* translators: %s: The post title. */
				esc_html_e( 'One thought on &ldquo;%s&rdquo;', 'travelogged' ), '<span>' . esc_html(get_the_title()) . '</span>'
			);
		} else {
			printf(
				/* translators: %1$s: The number of comments. %2$s: The post title. */
				esc_html(_n( '%1$s thought on &ldquo;%2$s&rdquo;','%1$s thoughts on &ldquo;%2$s&rdquo;',get_comments_number(), 'travelogged' )),
				esc_html(number_format_i18n( get_comments_number() )),
				'<span>' . esc_html(get_the_title()) . '</span>'
			);
		}
		?>
	</h2>
	<ul class="commentlist">
		<?php
			wp_list_comments(
				array(
					'style'       => 'ul',
                    'short_ping'  => true,
                    'avatar_size' => 90,
				)
			);
		?>
	</ul><!-- .commentlist -->
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { // are there comments to navigate through ?>
	<nav id="comment-nav-below" class="navigation" role="navigation">
		<h1 class="assistive-text section-heading"><?php esc_html_e( 'Comment navigation', 'travelogged' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'travelogged' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'travelogged' ) ); ?></div>
	</nav>
	<?php } // check for comment navigation
	/* If there are no comments and comments are closed, let's leave a note.
	 * But we only want the note on posts and pages that had comments in the first place.
	 */
	if ( ! comments_open() && get_comments_number() ) {
	?>
	<p class="nocomments"><?php esc_html_e( 'Comments are closed.', 'travelogged' ); ?></p>
	<?php 
		} 
	} // have_comments()
	comment_form(); 
	?>
</div><!-- #comments .comments-area -->