<?php
/**
 * Amazorize Functions and Definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Amazorize
 */

if ( ! function_exists( 'amazorize_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function amazorize_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on amazorize, use a find and replace
		 * to change 'amazorize' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'amazorize', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 300 );

		add_image_size( 'amazorize-small', 350 , 260, true );
		add_image_size( 'amazorize-large', 680 , 500, true );
		add_image_size( 'amazorize-widget', 86 , 60, true );


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1'	=> esc_html__( 'Primary', 'amazorize' ),
			'menu-2'	=> esc_html__( 'Footer', 'amazorize' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'amazorize_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// This theme styles the visual editor to resemble the theme style.
		$google_font_url = str_replace( ',', '%2C', 'https://fonts.googleapis.com/css?family=Poppins:400,700|Dancing+Script:400,700&display=swap' );
		add_editor_style( array( 'css/editor-style.css', $google_font_url ) );

	}
endif;
add_action( 'after_setup_theme', 'amazorize_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function amazorize_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'amazorize_content_width', 640 );
}
add_action( 'after_setup_theme', 'amazorize_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function amazorize_widgets_init() {
	register_sidebar( array(
		'name'				=> esc_html__( 'Sidebar', 'amazorize' ),
		'id'				=> 'sidebar-1',
		'description'		=> esc_html__( 'Add widgets here.', 'amazorize' ),
		'before_widget'		=> '<section id="%1$s" class="fbox widget %2$s"><div class="swidget-inner">',
		'after_widget'		=> '</div></section>',
		'before_title'		=> '<div class="swidget"><h3 class="widget-title">',
		'after_title'		=> '</h3></div>',
	) );
}
add_action( 'widgets_init', 'amazorize_widgets_init' );

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Fire the wp_body_open action.
	 *
	 * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
	 *
	 * @since Amazorize 1.0.3
	 */
	function wp_body_open() {
		/**
		 * Triggered after the opening <body> tag.
		 *
		 * @since Amazorize 1.0.3
		 */
		do_action( 'wp_body_open' );
	}
endif;

/**
 * Enqueue scripts and styles.
 */
function amazorize_scripts() {
	wp_enqueue_style( 'amazorize-font-google', 'https://fonts.googleapis.com/css?family=Poppins:400,700|Dancing+Script:400,700|Open+Sans:400,700&display=swap' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/all.css' );
	wp_enqueue_style( 'amazorize-style', get_stylesheet_uri() );

	wp_enqueue_script( 'amazorize-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '1.1', true );
	wp_enqueue_script( 'amazorize-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '1.1', true );
	wp_enqueue_script( 'amazorize-script', get_template_directory_uri() . '/js/script.js', array(), '1.1', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'amazorize_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require_once( trailingslashit( get_template_directory() ) . 'inc/customizer.php');

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Widgets
 */
require get_template_directory() . '/inc/widget.php';

/**
* Custom Style 
*/
load_template( get_template_directory() . '/inc/options-style.php' );

