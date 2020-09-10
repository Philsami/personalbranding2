<?php
/**
 * The header section for our theme
 *
 * header image and title
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Travelogged
 */
?>
<section class="page-title-section content-center" style="background:linear-gradient(4deg, rgba(0, 0, 0, 0.88) 17%, rgba(0, 0, 0, 0.42) 69%), url(<?php header_image(); ?>);" >
    <div class="container wow fadeInDown animated" data-wow-duration="2s" data-wow-offset="250">
        <div class="page-heading white ">
            <h1 class="title"> 
            	<?php 
            	if ( is_home() ) {
            		esc_attr_e('Home','travelogged');
            	}elseif ( is_author() ) {
            		the_author();
            	}elseif ( is_archive() ) {
            		the_archive_title();
            	}elseif ( is_single() ) {
            		the_title();
				}elseif ( is_page_template() ) {
            		the_title();
            	}elseif ( is_tag() ) {
            		the_title();
            	}elseif( function_exists( 'is_woocommerce' ) ) {
                    if ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() ) {
                        the_title( );
                    }
                }
            	else{
            		the_title();
            	}
            	?>
        	</h1>
        </div>
    </div>
</section>