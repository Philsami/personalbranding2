<?php
    if ( wl_theme_is_companion_active() ) {
        if ( get_theme_mod( 'service_home','1' ) == "1" ) {
            /* Executes the action for service section hook named 'wl_companion_slider' */
		    do_action( 'wl_companion_services_travel');
        }
    } 
?>