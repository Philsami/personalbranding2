<?php
/**
 * Travelogged Theme Customizer.
 *
 * @package Travelogged
 */
function travelogged_customize_register( $wp_customize ) {

	/*=============================================
        =            Theme options panel           =
        =============================================*/
        	
    $wp_customize->add_panel(
        'theme_options',
        array(
            'title' => esc_html__('Theme Options', 'travelogged'),
            'description' => esc_html__('Travelogged Theme Options', 'travelogged'),
            'priority' => 2,
        )
    );

    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    $wp_customize->selective_refresh->add_partial( 'blogname', array(
        'selector' => '.navbar .site-title',
    ) );
    $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
        'selector' => '.site-description',
    ) );
    $wp_customize->selective_refresh->add_partial( 'custom_logo', array(
        'selector' => 'a.navbar-brand img',
    ) );

	/**
	 *
	 * Top header section
	 *
	 */
    $wp_customize->add_section(
        'top_header_section',
        array(
            'title' => esc_html__( 'Top Header Sections','travelogged' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );
        /* Show contact bar */   
    $wp_customize->add_setting( 'show_contact_bar',
        array(
            'default' => '',
            'type' => 'theme_mod',
            'sanitize_callback' => 'wl_travelogged_sanitize_checkbox',
        ));
    $wp_customize->add_control( 'show_contact_bar',
        array(
            'label' => esc_html__( 'Show Contact Bar', 'travelogged' ),
            'section' => 'top_header_section',
            'type' => 'checkbox',
        ));
        /* Number */   
    $wp_customize->add_setting( 'number',
        array(
            'default' => '',
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
        ));
    $wp_customize->add_control( 'number',
        array(
            'label' => esc_html__( 'Number', 'travelogged' ),
            'section' => 'top_header_section',
            'type' => 'tel',
        ));

        /* Email */  
    $wp_customize->add_setting( 'email',
        array(
            'default' => '',
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_email',
        ));
    $wp_customize->add_control( 'email',
        array(
            'label' => esc_html__( 'Email', 'travelogged' ),
            'section' => 'top_header_section',
            'type' => 'text',
        ));

        /* facebook  */  
    $wp_customize->add_setting( 'facebook',
        array(
            'default' => '',
            'type' => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw',
        ));
    $wp_customize->add_control( 'facebook',
        array(
            'label' => esc_html__( 'facebook url', 'travelogged' ),
            'section' => 'top_header_section',
            'type' => 'url',
        ));

        /* Twitter  */  
    $wp_customize->add_setting( 'twitter',
        array(
            'default' => '',
            'type' => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw',
        ));
    $wp_customize->add_control( 'twitter',
        array(
            'label' => esc_html__( 'twitter url', 'travelogged' ),
            'section' => 'top_header_section',
            'type' => 'url',
        ));

        /* Instagram  */  
    $wp_customize->add_setting( 'instagram',
        array(
            'default' => '',
            'type' => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw',
        ));
    $wp_customize->add_control('instagram',
        array(
            'label' => esc_html__( 'instagram url', 'travelogged' ),
            'section' => 'top_header_section',
            'type' => 'url',
        ));  

    	/* LinkedIn  */  
    $wp_customize->add_setting( 'linkedin',
        array(
            'default' => '',
            'type' => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw',
        ));
    $wp_customize->add_control('linkedin',
        array(
            'label' => esc_html__( 'linkedin url', 'travelogged' ),
            'section' => 'top_header_section',
            'type' => 'url',
        ));  

    	/* Youtube  */  
    $wp_customize->add_setting( 'youtube',
        array(
            'default' => '',
            'type' => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw',
        ));
    $wp_customize->add_control( 'youtube',
        array(
            'label' => esc_html__( 'youtube url', 'travelogged' ),
            'section' => 'top_header_section',
            'type' => 'url',
        ));

     /**
     *
     * Copyright section
     *
     */
        $wp_customize->add_section(
        'copyright_section',
        array(
            'title' => esc_html__( 'Copyright Section','travelogged' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );
        /* copyright text  */  
    $wp_customize->add_setting( 'copyright',
        array(
            'default' => esc_html__( 'Developed & designed by', 'travelogged' ),
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
        ));
    $wp_customize->add_control( 'copyright',
        array(
            'label' => esc_html__( 'copyright text', 'travelogged' ),
            'section' => 'copyright_section',
            'type' => 'text',
        ));    
		
	/* copyright Link Text */  
    $wp_customize->add_setting( 'copyright_link_t',
        array(
            'default' => '',
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
        ));
    $wp_customize->add_control( 'copyright_link_t',
        array(
            'label' => esc_html__( 'Copyright Link Text', 'travelogged' ),
            'section' => 'copyright_section',
            'type' => 'text',
        ));
		
	/* copyright Link  */  
    $wp_customize->add_setting( 'copyright_link',
        array(
            'default' => '',
            'type' => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw',
        ));
    $wp_customize->add_control( 'copyright_link',
        array(
            'label' => esc_html__( 'Copyright Link', 'travelogged' ),
            'section' => 'copyright_section',
            'type' => 'url',
        ));

    
    /**
     *
     * Customize logo height and width
     *
     */

    /* Logo Height */   
    $wp_customize->add_setting( 'custom_logo_height',
        array(
            'default' => '',
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
        ));
    $wp_customize->add_control( 'custom_logo_height',
        array(
            'label' => esc_html__( 'Logo Height', 'travelogged' ),
            'section' => 'title_tagline',
            'type' => 'range',
            'input_attrs' => array(
                'min' => 10,
                'max' => 500,
                'step' => 2,
              ),
            'priority'=> 8
        ));
        /* Logo Width */   
    $wp_customize->add_setting( 'custom_logo_width',
        array(
            'default' => '',
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
        ));
    $wp_customize->add_control( 'custom_logo_width',
        array(
            'label' => esc_html__( 'Logo Width', 'travelogged' ),
            'section' => 'title_tagline',
            'type' => 'range',
            'input_attrs' => array(
                'min' => 10,
                'max' => 500,
                'step' => 2,
              ),
            'priority'=> 9
        ));

    //checkbox sanitization function
    function wl_travelogged_sanitize_checkbox( $input ){
              
        //returns true if checkbox is checked
        return ( isset( $input ) ? true : false );
    }
}
add_action( 'customize_register', 'travelogged_customize_register' );

/* Customizer Scripts */
function travelogged_customizer_scripts() {
     wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap-v4.1.3.min.css',false,'4.1.3','all');
     wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery'), '4.1.3', true );
     wp_enqueue_script( 'customizer-js', get_template_directory_uri() . '/assets/js/customizer.js' );
}
add_action( 'customize_controls_enqueue_scripts', 'travelogged_customizer_scripts' );