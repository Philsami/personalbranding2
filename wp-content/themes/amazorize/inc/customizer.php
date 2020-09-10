<?php
/**
 * Amazorize Theme Customizer
 *
 * @package Amazorize
 */


/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function amazorize_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function amazorize_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function amazorize_customize_preview_js() {
	wp_enqueue_script( 'amazorize-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'amazorize_customize_preview_js' );

/**
|------------------------------------------------------------------------------
| Callback Functions
|------------------------------------------------------------------------------
*/
function amazorize_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

function amazorize_sanitize_html( $html ) {
	return wp_filter_post_kses( $html );
}

function amazorize_sanitize_nohtml( $nohtml ) {
	return wp_filter_nohtml_kses( $nohtml );
}

function amazorize_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function amazorize_sanitize_url( $url ) {
	return esc_url_raw( $url );
}

function amazorize_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );
	
	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

function amazorize_sanitize_select( $input, $setting ) {
	
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function amazorize_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/**
	|-------------------------------------------------------------------------------
	| Panel: General Options
	|-------------------------------------------------------------------------------
	|
	*/
	require_once get_template_directory() . '/inc/customizer/options-general.php';

	/**
	|-------------------------------------------------------------------------------
	| Panel: Single Options
	|-------------------------------------------------------------------------------
	|
	*/
	require_once get_template_directory() . '/inc/customizer/options-single.php';


	/**
	|-------------------------------------------------------------------------------
	| Panel: Slideshow Options
	|-------------------------------------------------------------------------------
	|
	*/
	//require_once get_template_directory() . '/inc/customizer/options-header.php';


	/**
	|-------------------------------------------------------------------------------
	| Function: Refresh In Customizer Options
	|-------------------------------------------------------------------------------
	|
	*/

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'amazorize_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'amazorize_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'amazorize_customize_register' );
