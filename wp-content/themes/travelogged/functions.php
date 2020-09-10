<?php
/**
* Travelogged functions and definitions
*
* @link https://developer.wordpress.org/themes/basics/theme-functions/
*
* @package Travelogged
*/

if ( ! function_exists( 'travelogged_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function travelogged_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Travelogged, use a find and replace
		 * to change 'travelogged' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'travelogged', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'travelogged' ),
		) );

		// Enable support for Woocommerce 
  		add_theme_support( 'woocommerce' );
  		add_theme_support( 'wc-product-gallery-zoom' );
    	add_theme_support( 'wc-product-gallery-lightbox' );
    	add_theme_support( 'wc-product-gallery-slider' );

    	add_theme_support( 'customize-selective-refresh-widgets' );
		
		add_theme_support( 'post-thumbnails', array( 'post' ) ); // Posts only
		add_theme_support( 'post-thumbnails', array( 'page' ) ); // Pages only
		
		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style( 'assets/css/editor-style.css' );
		
		// Gutenberg support
		add_theme_support( 'editor-color-palette', array(
	       	array(
				'name' => esc_html__( 'Blue', 'travelogged' ),
				'slug' => 'blue',
				'color' => '#2c7dfa',
	       	),
	       	array(
	           	'name' => esc_html__( 'Green', 'travelogged' ),
	           	'slug' => 'green',
	           	'color' => '#07d79c',
	       	),
	       	array(
	           	'name' => esc_html__( 'Orange', 'travelogged' ),
	           	'slug' => 'orange',
	           	'color' => '#ff8737',
	       	),
	       	array(
	           	'name' => esc_html__( 'Black', 'travelogged' ),
	           	'slug' => 'black',
	           	'color' => '#2f3633',
	       	),
	       	array(
	           	'name' => esc_html__( 'Grey', 'travelogged' ),
	           	'slug' => 'grey',
	           	'color' => '#82868b',
	       	),
	   	));

		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-font-sizes', array(
		   	array(
		       	'name' => esc_html__( 'small', 'travelogged' ),
		       	'shortName' => esc_html__( 'S', 'travelogged' ),
		       	'size' => 12,
		       	'slug' => 'small'
		   	),
		   	array(
		       	'name' => esc_html__( 'regular', 'travelogged' ),
		       	'shortName' => esc_html__( 'M', 'travelogged' ),
		       	'size' => 16,
		       	'slug' => 'regular'
		   	),
		   	array(
		       	'name' => esc_html__( 'larger', 'travelogged' ),
		       	'shortName' => esc_html__( 'L', 'travelogged' ),
		       	'size' => 36,
		       	'slug' => 'larger'
		   	),
		   	array(
		       	'name' => esc_html__( 'huge', 'travelogged' ),
		       	'shortName' => esc_html__( 'XL', 'travelogged' ),
		       	'size' => 48,
		       	'slug' => 'huge'
		   	)
		));
		add_theme_support( 'editor-styles' );
		add_theme_support( 'wp-block-styles' );

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
		add_theme_support( 'custom-background', apply_filters( 'travelogged_custom_background_args', array(
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
	}
}
add_action( 'after_setup_theme', 'travelogged_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function travelogged_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'travelogged_content_width', 640 );
}
add_action( 'after_setup_theme', 'travelogged_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function travelogged_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'travelogged' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets to showcase in Post/Page Sidebar area.', 'travelogged' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	) );
	register_sidebar( array(
	'name'          => esc_html__( 'Footer Widgets', 'travelogged' ),
	'id'            => 'sidebar-footer',
	'description'   => esc_html__( 'Add widgets to showcase in Footer area.', 'travelogged' ),
	'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-6 widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h4 class="widget-title">',
	'after_title'   => '</h4>'
	) );
}
add_action( 'widgets_init', 'travelogged_widgets_init' );

/**
 * Enqueues styles for the block-based editor.
 *
 * @since Travelogged
 */
function travelogged_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'travelogged-block-editor-style', get_theme_file_uri( '/assets/css/editor-blocks.css' ) );
}
add_action( 'enqueue_block_editor_assets', 'travelogged_block_editor_styles' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Enqueue scripts.
 */
require get_template_directory() . '/inc/enqueue-scripts.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/admin.php';

/**
 * Load walker class file for menu.
 */
require_once get_template_directory() . '/inc/menu/default-menu-walker.php';
require_once get_template_directory() . '/inc/menu/weblizar_nav_walker.php';
require( get_template_directory() . '/inc/functions/general-functions.php' );