<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Travelogged
 */
?>
<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
<aside id="secondary" class="sidebar">
   <?php dynamic_sidebar( 'sidebar-1' );  ?>
</aside> <!-- #secondary -->
<?php } else { ?>
<aside id="secondary" class="sidebar">
<p class="widget-notice"><?php esc_html_e('Please Add The Widgets First','travelogged'); ?></p>
</aside> <!-- #secondary -->
<?php } ?>