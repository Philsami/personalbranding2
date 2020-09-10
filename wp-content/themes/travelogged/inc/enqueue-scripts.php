<?php
/**
 * Enque Style sheets & Scripts files for our theme
 *
 * style & script
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Travelogged
 */
function travelogged_scripts() {
	
	
	/* Style sheets */	 
	wp_enqueue_style( 'travelogged-style-sheet', get_stylesheet_uri() );
	/* Web Fonts */	
	wp_enqueue_style('RalewayFont','//fonts.googleapis.com/css?family=Raleway:100,400,500,700');
	wp_enqueue_style('RobotoFont','//fonts.googleapis.com/css?family=Roboto:300,400,500');
	// Theme block stylesheet.
	wp_enqueue_style( 'travelogged-block-style', get_template_directory_uri() .'/assets/css/blocks.css' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap-v4.1.3.min.css',false,'4.1.3','all');
	wp_enqueue_style( 'owl-slide-effct', get_template_directory_uri() . '/assets/css/owl-slide-effct.css',false,'4.1.3','all');
	wp_enqueue_style( 'owl.carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css',false,'4.1.3','all');
	wp_enqueue_style( 'travelogged-animate', get_template_directory_uri() . '/assets/css/animate.min.css',false,'3.7.2','all');
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome/css/fontawesome-all-v5.3.1.min.css',false,'5.3.1','all');
	wp_enqueue_style( 'travelogged-responsive', get_template_directory_uri() . '/assets/css/responsive.css');
	
	/* Scripts */ 
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'popper-js', get_template_directory_uri() . '/assets/js/popper-v3.3.1.min.js', array(), '4.1.3', true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.js', array(), '4.1.3', true );
	wp_enqueue_script( 'owl.carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.js', array(), '4.1.3', true );
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/js/wow.js', array(), '1.0.2', true );
	wp_enqueue_script( 'travelogged-custom-script', get_template_directory_uri() . '/assets/js/custom-script.js' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply', 'wp-includes/js/comment-reply', array(), false, true );
	}
}
add_action( 'wp_enqueue_scripts', 'travelogged_scripts' );