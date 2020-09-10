<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package travelogged
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses travelogged_header_style()
 */

function travelogged_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'travelogged_custom_header_args', array(
		'default-image'          => get_template_directory_uri().'/assets/images/all-img/header.jpg',
		'default-text-color'     => 'ffffff',
		'header-text'            => true,
		'width'                  => 980,
		'height'                 => 400,
		'flex-height'            => true,
		'uploads'                => true,
		'wp-head-callback'       => 'travelogged_header_style',
		) ) );
}
add_action( 'after_setup_theme', 'travelogged_custom_header_setup' );

if ( ! function_exists( 'travelogged_header_style' ) ) {
/**
 * Styles the header image and text displayed on the blog.
 *
 * @see travelogged_custom_header_setup().
 */
function travelogged_header_style() {
	$header_text_color = get_header_textcolor();

	/*
	 * If no custom options for text are set, let's bail.
	 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: HEADER_TEXTCOLOR.
	 */
	if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
		return;
	}		

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
		<?php
			// Has the text been hidden?
			if ( ! display_header_text() ) {  ?>
			h1.site-title a{
			    color: #043ba0;	
			}
			.site-description {
				color: #000;
			}
			.header-topbar {
				color: #043ba0;
			}
			.team_social a {
				color: #9b9b9b;
			}
		<?php
			// If the user has set a custom color for the text use that.
			} else {	?>
			h1.site-title a,
			.site-description, .header-topbar, .team_social a {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php } ?>
	</style>
<?php } } ?>