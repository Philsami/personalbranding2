<?php
    if ( wl_theme_is_companion_active() ) {
        if ( get_theme_mod( 'subscribe_home','1' ) == "1" ) {
            /* Executes the action for sliders section hook named 'wl_companion_slider' */
		    do_action( 'wl_companion_subscribe_travel');
        } 
    } 
?>