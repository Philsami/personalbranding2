<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Amazorize
 */

?>
		</div>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer clearfix">
		
		<div class="content-wrap">
			
			<div class="site-info">

				<?php

					echo 'Copyright &copy; <a href="' . esc_url( __( 'https://alltopguide.com/', 'amazorize' ) ) . '" rel="author" title="' . esc_attr( __( 'AllTopGuide', 'amazorize' ) ) . '">' . esc_attr( __( 'AllTopGuide', 'amazorize' ) ) . '</a> ' . date( 'Y' ) . ' &bull; <span class="copyright-block"></span>'. esc_html(__('Theme by', 'amazorize' ) ).' <a href="' . esc_url( __( 'http://opensumo.com/amazorize/', 'amazorize' ) ) . '">OpenSumo</a>'; 
				
				?>
			</div><!-- .site-info -->

			<?php if ( has_nav_menu( 'menu-2' ) ) : ?>
				<nav id="footer-site-navigation" class="fmenu">

					<?php
						wp_nav_menu( array(
							'theme_location'	=> 'menu-2',
							'menu_id'			=> 'footer-menu',
							'menu_class'		=> 'footer-menu'
						) );
					?>

				</nav><!-- #footer-site-navigation -->
			<?php endif; ?>

		</div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<div id="smobile-menu" class="mobile-only"></div>
<div id="mobile-menu-overlay"></div>

<?php wp_footer(); ?>
</body>
</html>
