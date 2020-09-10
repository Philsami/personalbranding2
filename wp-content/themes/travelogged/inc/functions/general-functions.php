<?php
defined( 'ABSPATH' ) or die();

/* Get the pagination */
if ( ! function_exists( 'wl_theme_is_companion_active' ) ) {
	function wl_theme_is_companion_active() {
		require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    	if ( is_plugin_active(  'weblizar-companion/weblizar-companion.php' ) ) {
    		return true;
    	} else {
    		return false;
    	}
	}
}