<?php 
/**
 * The template for displaying code in the header section
 *
 * @version    0.0.08
 * @package    photography-business
 * @author     Zidithemes
 * @copyright  Copyright (C) 2020 zidithemes.com All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * 
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>	
<body <?php body_class(); ?> >
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'photography-business' ); ?></a>

<?php

if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) {
 
	$photography_business_ad_img_set   = wp_get_attachment_url(get_theme_mod('photography_business_ad_img_settings'));
?>
	
<div class="header-box">
	<div class="mg-auto header-box-flex wid-90 mobwid-90">
		<div class="logo wid-30 mobwid-100">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-text-link">
				<?php bloginfo('name'); ?>
			</a>
			<p class="site-info-desc"><?php bloginfo('description'); ?></p>
		</div>
		<div class="ad-box-img wid-70 mobwid-100">
			<?php if ( !$photography_business_ad_img_set ): ?>
				<a href="<?php echo esc_url(get_theme_mod('photography_business_ad_img_link_settings')); ?>">
					<img class="ad-img" src="<?php echo esc_url(get_theme_mod('photography_business_ad_img_settings')); ?>" alt="<?php echo esc_attr( get_bloginfo('name')); ?>" />
				</a>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php } ?>	