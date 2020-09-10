<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Travelogged
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<!--header-part-->
<header class="home_hader">
	<a class="skip-content" href="#main"><?php esc_html_e( 'Skip to content', 'travelogged' ); ?></a>
    <?php get_template_part( 'inc/sections/contact-bar' ); ?>
    <!--navbar-->
    <nav class="navbar navbar-expand-sm">
        <div class="container navbar-containernt wow fadeInDown animated" data-wow-duration="2s" data-wow-offset="250">
            <!-- Brand -->
            <?php 
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $logo           = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                if ( function_exists( 'has_custom_logo' ) ) {
                if ( has_custom_logo() ) { 
            ?>
			<div class="col-md-3">
				<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>"> 
					<img src=" <?php echo esc_url( $logo[0] ); ?>" style="height:<?php echo esc_attr( get_theme_mod( 'custom_logo_height','70' ) ); ?>px;width: <?php echo esc_attr( get_theme_mod( 'custom_logo_width','180' ) ); ?>px !important;" alt="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" class="img-fluid">
                </a>
                <?php if (display_header_text()==true){ ?>
                    <p class="site-description">
                        <?php esc_html( bloginfo('description') ); ?>
                    </p>
                <?php } ?>
			</div>
			<?php 
                } else {
                    if (display_header_text() == true) {
                        echo '<div class="col-md-3 desc"><h1 class="site-title"><a href="'.esc_url(home_url()) .'" >'. esc_html(get_bloginfo('name')) .'</a></h1>';
                        echo '<p class="site-description">'. esc_html(get_bloginfo('description')) .'</p></div>';
                    }
                }
			}
            ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon fa fa-bars"></span>
            </button>

            <!-- Links -->
            <div class="col-md-9 collapse navbar-collapse" id="navbarSupportedContent">
                <div class="collapse_inner justify-content-end">
                    <!-- primary menu -->
                    <?php 
                         wp_nav_menu( array(
                            'theme_location'  => 'primary',
                            'depth'           => 5,
                            'container'       => false,
                            'menu_class'      => 'navbar-nav nav',
                            'fallback_cb'     => 'travelogged_fallback_page_menu',
                            'walker'          => new travelogged_nav_walker(),
                        ) );
						get_search_form(); // search box 
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <!--close-navbar-->
</header>