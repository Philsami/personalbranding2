<?php
defined( 'ABSPATH' ) or die();

/**
 *  Nineteen theme info page 
 */
class Nineteen_info_page 
{
	public static function get_menu_page() {
		add_action( 'admin_menu', array( 'Nineteen_info_page', 'nineteen_info_page_menu' ) );
		add_action( 'admin_enqueue_scripts', array( 'Nineteen_info_page', 'fontawesome_assests' ) );
	}
	
	public static function nineteen_info_page_menu() {
		$page1 = add_theme_page( __( 'Welcome to Travelogged', 'travelogged' ), __( 'Travelogged <i class="fa fa-star theme-icon"></i>', 'travelogged' ), 'manage_options', 'nineteen', array( 'Nineteen_info_page','nineteen_display_theme_info_page') );
		add_action( 'admin_print_styles-'.$page1, array( 'Nineteen_info_page','nineteen_info_page_assets' ) );
	}

	public static function nineteen_info_page_assets() {
		wp_enqueue_style( 'travelogged-bootstrap-css', get_template_directory_uri(). '/assets/css/bootstrap.min.css' );
		wp_enqueue_style( 'travelogged-font-awesome', get_template_directory_uri(). '/assets/css/font-awesome/css/fontawesome-all-v5.3.1.min.css' );
		wp_enqueue_style( 'travelogged-main-style', get_template_directory_uri(). '/assets/css/document_style.css' );

		wp_enqueue_script( 'travelogged-bootstrap-js', get_template_directory_uri(). '/assets/js/bootstrap.js' );
		wp_enqueue_script( 'travelogged-popper', get_template_directory_uri(). '/assets/js/popper.js' );
	}

	public static function fontawesome_assests() {
		wp_enqueue_style( 'travelogged-font-awesome', get_template_directory_uri(). '/assets/css/font-awesome/css/fontawesome-all-v5.3.1.min.css' );
	}

	public static function nineteen_display_theme_info_page() {
		$theme_data = wp_get_theme();
	?>
		<div class="wrap elw-page-welcome about-wrap seting-page">
		    <div class="row col-md-12 settings">
		         <div class=" col-md-9">
		            <div class="col-md-12" style="padding:0">
						<h2><span class="elw_shortcode_heading"><?php printf( esc_html__( 'Welcome to %1$s ¬ Version %2$s', 'nineteen' ), esc_html( $theme_data->Name ), esc_html( $theme_data->Version )); ?> </span></h2>
						<p class="text-justify" style="font-size:19px;color: #555d66;"><?php _e( 'Travelogged is a feature-loaded, user-friendly, fully responsive, Modern Design WordPress theme built with care and is loaded with SEO optimized code.Theme features a frontpage slider, Portfolio , Services ,Team, Clients, Blogs. Travelogged allows you to fully customize your site without having to work with code. Travelogged also features a live customizer, allowing you to change settings and preview them live.', 'nineteen' ); ?> </p>
		            </div>
		        </div>
				<div class=" col-md-3">
					<div class="update_pro">
						<h3><?php _e( 'Upgrade Pro', 'nineteen' ); ?>  </h3>
						
					</div>
				</div>
			</div>

            <!-- Themes & Plugin -->
            <div class="col-md-12  product-main-cont">
                <ul class="nav nav-tabs product-tbs">
				    <li class="active"><a data-toggle="tab" href="#start"> <?php _e( 'Getting Started', 'travelogged' ); ?></a></li>
                   
                </ul>

                <div class="tab-content">			
					<div id="start" class="tab-pane in active">
	                        <div class="space  theme active">							
	                            <div class="row p_plugin blog_gallery">
	                                <div class="col-xs-12 col-sm-7 col-md-7 p_plugin_pic">
	                                    <h4><?php _e( 'Step 1: Homepage Setup', 'travelogged' ); ?></h4>
										<ol>
										<li> <?php _e( 'First Download "weblizar-companion" Plugin (Its required to setup theme Home Page).', 'travelogged' ); ?> </li>
										<li> <?php _e( 'Then Install it and activate it.', 'travelogged' ); ?> </li>
										<li> <?php _e( 'Create a new page name it as > "Home".', 'travelogged' ); ?> </li>
										<li> <?php _e( 'Assign this "Home" >> "Home-Page" template , Save it.', 'travelogged' ); ?> </li>
										<li> <?php _e( 'Now Set this "Home" as custom static Home for your site', 'travelogged' ); ?> </li>
										<li> <?php _e( 'Save changes and you are done.', 'travelogged' ); ?> </li>
										</ol>
	                                </div>
	                                <div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
	                                    <div class="row p-box">
	                                         <div class="img-thumbnail">
											<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" class="img-responsive" alt="img"/>
	                                    </div>
	                                    </div>
	                                </div>
	                            </div>
													
								<div class="row p_plugin blog_gallery">
	                                <div class="col-xs-12 col-sm-4 col-md-12 p_plugin_pic">
	                                    <h4><?php _e( 'Step 2: Customizer Options Panel', 'travelogged' ); ?> </h4>
										<ol>
										<li> <?php _e( 'Go to Appearance -> Customize > Theme Options', 'travelogged' ); ?> </li>
										<li> <?php _e( 'Slider Options - It is use to add slider image, title, description and enable/disable slider on homepage.', 'travelogged' ); ?> </li>
										<li> <?php _e( 'Service Options - It is use to add service title, description, service icon, title, description and enable/disable service on homepage.', 'travelogged' ); ?> </li>
										<li> <?php _e( 'Team Options - It is use to add portfolio title, description, portfolio image, title, link and enable/disable portfolio on homepage.', 'travelogged' ); ?> </li>
										<li> <?php _e( 'Destination Options - Use to add team title, description, team member name, image, designation and discription, profile link on homepage.', 'travelogged' ); ?> </li>
										<li> <?php _e( 'Home Blog Options - Use to add blog title, description, blog excerpt length and enable/disable blog section on homepage.', 'travelogged' ); ?> </li>
										<li> <?php _e( 'Home Subscribe Options - Use to add client title, description, client name, image on homepage.', 'travelogged' ); ?> </li>
										<li> <?php _e( 'Top Header Sections - Use to add New Header text, developed by text and developed by link.', 'travelogged' ); ?> </li>
										<li> <?php _e( 'Copyright Sections - Use to add Copyright text, developed by text and developed by link.', 'travelogged' ); ?> </li>
										
										</ol>
										<a class="add_page" href="<?php echo esc_url(admin_url('customize.php')); ?>"><?php _e( 'Go to Customizer', 'travelogged' ); ?></a>
	                                </div>
	                            </div>	
	                        </div>
	                    </div>
					
					<div id="themesd" class="tab-pane fade">
                        <div class="space theme">

                            <div class=" p_head theme">
                                <!--<h1 class="section-title">WordPress Themes</h1>-->
                            </div>							

                            <div class="row p_plugin blog_gallery">
                                <div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
                                    <div class="img-thumbnail">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/NP.png" class="img-responsive" alt="img"/>
                                    </div>
									
                                </div>
                                <div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
                                    <div class="row p-box">
                                        <div>
                                            <p><strong><?php _e( 'Description:', 'travelogged' ); ?> </strong><?php _e( 'Creative agencies, financial advisors, business development institutions, investment centers and other local business foundations can make the best out of Nineteen Premium template.', 'travelogged' ); ?></p>
                                        </div>
										<p><strong><?php _e( 'Tags:', 'travelogged' ); ?></strong><?php _e( '>clean, responsive, portfolio, blog, e-commerce, Business, WordPress, Corporate, dark, real estate, shop, restaurant.', 'travelogged' ); ?></p>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
                                    <div class="price1">
                                        <span class="currency"><?php _e( 'USD', 'travelogged' ); ?></span>
                                        <span class="price-number">$<span>20</span>
										</span>
                                    </div>
                                    <div class="btn-group-vertical">
                                        <a class="btn btn-primary btn-lg" href="<?php echo esc_url( __( 'https://weblizar.com/themes/nineteen-premium-theme-for-business/', 'nineteen' ) ); ?>"><?php _e( 'Detail', 'nineteen' ); ?></a>
                                    </div>
                                </div>
                            </div>
							
							
							<div class="row p_plugin blog_gallery">
                                <div class="col-xs-12 col-sm-4 col-md-4 p_plugin_pic">
                                    <div class="img-thumbnail pro_theme">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/construction-pro.png" class="img-responsive" alt="img"/>
										<div class="btn-vertical">
										<h4 class="pro_thm">
                                        <a href="<?php echo esc_url( __( 'https://weblizar.com/themes/construction-premium-wordpress-theme/', 'nineteen' ) ); ?>"><?php _e( 'Construction Premium', 'nineteen' ); ?></a></h4>
										</div>
                                    </div>
									
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 p_plugin_pic">
                                    <div class="img-thumbnail pro_theme">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/beautyspa-pro.png" class="img-responsive" alt="img"/>
										<div class="btn-vertical">
										<h4 class="pro_thm">
                                        <a href="<?php echo esc_url( __( 'https://weblizar.com/themes/beautyspa-premium/', 'nineteen' ) ); ?>"><?php _e( 'Beautyspa Premium', 'nineteen' ); ?></a></h4>
										</div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 p_plugin_pic">
                                    <div class="img-thumbnail pro_theme">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/healthcare-pro.png" class="img-responsive" alt="img"/>
										<div class="btn-vertical">
										<h4 class="pro_thm">
                                        <a href="<?php echo esc_url( __( 'https://weblizar.com/themes/healthcare/', 'nineteen' ) ); ?>"><?php _e( 'Healthcare Premium', 'nineteen' ); ?> </a></h4>
										</div>
                                    </div>
                                </div>
                            </div>
							
							
							<div class="row p_plugin blog_gallery visit_pro">
                                <p class="text-center"><?php _e( 'Visit Our Latest Pro Themes & See Demos', 'nineteen' ); ?> </p>
								<p style="font-size: 17px !important;"><?php _e( 'We have put in a lot of effort in all our themes, free and premium both. Each of our Premium themes has a corresponding free version so that you can try out the theme before you decide to purchase it.', 'nineteen' ); ?> </p>
								<a href="<?php echo esc_url( __( 'https://weblizar.com/themes/', 'nineteen' ) ); ?>"><?php _e( 'Visit Themes', 'nineteen' ); ?></a>
                            </div>	
                        </div>
                    </div>
			  
					<div id="freepro" class="tab-pane fade">
							<div class=" p_head theme">
                                <!--<h1 class="section-title">Weblizar Offers</h1>-->
                            </div>
						<div class="row p_plugin blog_gallery">		
						<div class="columns">
						  <ul class="price">
							<li class="header" style="background:#f45f47"><?php _e( 'Nineteen', 'nineteen' ); ?> </li>
							<li class="grey"><?php _e( 'Features', 'nineteen' ); ?></li>
							<li><?php _e( 'Custom Home Page', 'nineteen' ); ?></li>
							<li><?php _e( 'Multiple Theme Templates', 'nineteen' ); ?></li>
							<li><?php _e( 'Shortcodes', 'nineteen' ); ?></li>
							<li><?php _e( 'Mega Menu Support', 'nineteen' ); ?></li>
							<li><?php _e( 'Page Builder Support', 'nineteen' ); ?></li>
							<li><?php _e( 'Woocommerce Ready', 'nineteen' ); ?></li>
							<li><?php _e( 'Responsive & Lightweight', 'nineteen' ); ?></li>
							<li><?php _e( 'SEO Friendly', 'nineteen' ); ?></li>
							<li><?php _e( 'Priority Support', 'nineteen' ); ?></li>
						  </ul>
						</div>
						
						 <div class="columns">
						  <ul class="price">
							<li class="header"><?php _e( 'Free', 'nineteen' ); ?></li>
							<li class="grey">$ 00</li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fas fa-times"></i></li>
							<li><i class="fas fa-times"></i></li>
							<li><i class="fas fa-times"></i></li>
							<li><i class="fas fa-times"></i></li>
							<li><i class="fas fa-times"></i></li>
							<li><i class="fas fa-times"></i></li>
							<li><i class="fas fa-times"></i></li>
							<li><i class="fas fa-times"></i></li>
						  </ul>
						</div>

						<div class="columns">
						  <ul class="price">
							<li class="header" style="background-color:#f45f47"><?php _e( 'Nineteen Pro', 'nineteen' ); ?></li>
							<li class="grey"><?php _e( '$ 20', 'nineteen' ); ?></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li class="grey"><a href="<?php echo esc_url( __( 'http://demo.weblizar.com/nineteen-premium-wordpress-theme/', 'nineteen' ) ); ?>" class="pro_btn"><?php _e( 'Visit Demo', 'nineteen' ); ?></a></li>
						  </ul>
						</div>
						</div>
					</div>	
			  </div>
            </div>
        </div>
	<?php
	}
}
Nineteen_info_page::get_menu_page();

?>