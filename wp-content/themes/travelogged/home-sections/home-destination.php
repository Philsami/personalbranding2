<?php
    if ( wl_theme_is_companion_active() ) {
        if ( get_theme_mod( 'destination_home','1' ) == "1" ) {
            /* Executes the action for destination section hook named 'wl_companion_slider' */
		    do_action( 'wl_companion_destination_travel');
        } 
    }
?>