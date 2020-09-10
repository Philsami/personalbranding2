<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Amazorize
 */

if ( ! is_active_sidebar( 'sidebar-1' ) || get_theme_mod('amazorize_general_layout') == 'none_sidebar' ) {
	return;
}
?>

<aside id="secondary" class="featured-sidebar widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
