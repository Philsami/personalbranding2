<?php
/**
|------------------------------------------------------------------------------
| Static Control
|------------------------------------------------------------------------------
*/

	class amazorize_Theme_Info extends WP_Customize_Control {
		public function render_content() {
			echo $this->description;
		}
	}

	/**
	|------------------------------------------------------------------------------
	| OPTIONS
	|------------------------------------------------------------------------------
	*/
	$wp_customize->add_panel( 'panel_general', array(
		'priority'			=> 30,
		'capability'		=> 'edit_theme_options',
		'theme_supports'	=> '',
		'title'				=> __( 'Options General', 'amazorize' )
	));

	/*******************
	* Section: Layout *
	********************/
	$wp_customize->add_section( 'amazorize_general_page_controllers' , array(
		'title'				=> __( 'General Options', 'amazorize' ),
		'priority'			=> 1,
		'panel'				=> 'panel_general'
	));

	/* Primary Color */
	$wp_customize->add_setting( 'amazorize_general_primary_color', array(
		'default'			=> '#ff5252',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'amazorize_general_primary_color', array(
		'label'				=> __( 'Primary Color', 'amazorize' ),
		'section'			=> 'amazorize_general_page_controllers',
		'settings'			=> 'amazorize_general_primary_color',
		'priority'			=> 1,
	)));


	/* General Layout */
	$wp_customize->add_setting( 'amazorize_general_layout_style',
		array(
			'default'		=> 'list_layout',
			'transport'		=> 'refresh',
			'sanitize_callback'	=> 'amazorize_sanitize_select'
		)
	);

	$wp_customize->add_control( 'amazorize_general_layout_style',
		array(
			'label'			=> __( 'Layout Style', 'amazorize'),
			'section'		=> 'amazorize_general_page_controllers',
			'priority'		=> 2,
			'type'			=> 'select',
			'capability'	=> 'edit_theme_options',
			'choices' => array(
				'list_layout'			=> __( 'List', 'amazorize'),
				'grid_layout'			=> __( 'Grid', 'amazorize'),
			)
		)
	);

	$wp_customize->add_setting( 'amazorize_general_layout', array('sanitize_callback' => 'amazorize_sanitize_select', 'default' => 'right_sidebar'));
	$wp_customize->add_control( 'amazorize_general_layout', array(
		'type'				=> 'radio',
		'label'				=> __( 'Layout Style', 'amazorize' ),
		'section'			=> 'amazorize_general_page_controllers',
		'priority'			=> 3,
		'choices'			=> array(
			'none_sidebar'				=> __('None Sidebar', 'amazorize'),
			'left_sidebar'				=> __('Left Sidebar', 'amazorize'),
			'right_sidebar'				=> __('Right Sidebar', 'amazorize'),
		),
	));

	/* Excerpt Length */
	$wp_customize->add_setting('amazorize_general_excerpt_lengh', array('sanitize_callback' => 'amazorize_sanitize_number_absint', 'default' => 8));
	$wp_customize->add_control( 'amazorize_general_excerpt_lengh', array(
		'type'				=> 'number',
		'label'				=> __( 'Excerpt Length', 'amazorize' ),
		'section'			=> 'amazorize_general_page_controllers',
		'description'		=> __( 'Expert Length is the number of words to show in Home/Archive pages.', 'amazorize'),
		'priority'			=> 4,
	));

	/* Excerpt End Text */
	$wp_customize->add_setting('amazorize_general_excerpt_end_text', array('sanitize_callback' => 'amazorize_sanitize_html', 'default' => ' ...'));
	$wp_customize->add_control( 'amazorize_general_excerpt_end_text', array(
		'type'				=> 'text',
		'label'				=> __( 'Excerpt Ending Text', 'amazorize' ),
		'section'			=> 'amazorize_general_page_controllers',
		'priority'			=> 5,
	));

	/* Choose Pagination Type */
	$wp_customize->add_setting('amazorize_general_pagination_mode', array('sanitize_callback' => 'amazorize_sanitize_select', 'default'	=> 'default', 'capability' => 'edit_theme_options' ));
	$wp_customize->add_control( 'amazorize_general_pagination_mode', array(
		'type'				=> 'radio',
		'label'				=> __( 'Choose Pagination Type', 'amazorize' ),
		'section'			=> 'amazorize_general_page_controllers',
		'priority'			=> 6,
		'choices'			=> array(
			'default'					=> __('Default (Older Posts/Newer Posts)', 'amazorize'),
			'numberal'					=> __('Numberal (1 2 3 ..)', 'amazorize'),
		),
	));


	/*******************
	* Section: Options Header *
	********************/
	$wp_customize->add_section( 'amazorize_general_header_controllers' , array(
		'title'				=> __( 'Header Options', 'amazorize' ),
		'priority'			=> 2,
		'panel'				=> 'panel_general'
	));

	/*******************
	* Section: Options Header *
	********************/
	/* Excerpt Notify Message */
	$wp_customize->add_setting('amazorize_general_notify_smg', array('sanitize_callback' => 'amazorize_sanitize_html', 'default' => ''));
	$wp_customize->add_control( 'amazorize_general_notify_smg', array(
		'type'				=> 'textarea',
		'label'				=> __( 'Notify Message', 'amazorize' ),
		'section'			=> 'amazorize_general_header_controllers',
		'priority'			=> 7,
		'input_attrs'	=> array(
			'class'			=> 'my-custom-class',
			'placeholder'	=> __( 'Your notify message here...', 'amazorize'),
		),
	));

	/* Notify Section Color */
	$wp_customize->add_setting( 'amazorize_general_notify_bg', array(
		'default'			=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'amazorize_general_notify_bg', array(
		'label'				=> __( 'Notify BG Color', 'amazorize' ),
		'section'			=> 'amazorize_general_header_controllers',
		'settings'			=> 'amazorize_general_notify_bg',
		'priority'			=> 8,
	)));

	/* Notify Text Color */
	$wp_customize->add_setting( 'amazorize_general_notify_text', array(
		'default'			=> '#11171a',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'amazorize_general_notify_text', array(
		'label'				=> __( 'Notify Text Color', 'amazorize' ),
		'section'			=> 'amazorize_general_header_controllers',
		'settings'			=> 'amazorize_general_notify_text',
		'priority'			=> 9,
	)));


	/* Notify Anchors Text Color */
	$wp_customize->add_setting( 'amazorize_general_notify_anchors_text', array(
		'default'			=> '#ff5252',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'amazorize_general_notify_anchors_text', array(
		'label'				=> __( 'Notify Anchors Text Color', 'amazorize' ),
		'section'			=> 'amazorize_general_header_controllers',
		'settings'			=> 'amazorize_general_notify_anchors_text',
		'priority'			=> 10,
	)));


	/* Notify Anchors Text Hover Color */
	$wp_customize->add_setting( 'amazorize_general_notify_anchors_text_hover', array(
		'default'			=> '#11171a',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'amazorize_general_notify_anchors_text_hover', array(
		'label'				=> __( 'Notify Anchors Text Hover Color', 'amazorize' ),
		'section'			=> 'amazorize_general_header_controllers',
		'settings'			=> 'amazorize_general_notify_anchors_text_hover',
		'priority'			=> 11,
	)));

	/* Upload a BG Banner */
	$wp_customize->add_setting('amazorize_general_header_banner', array('sanitize_callback' => 'amazorize_sanitize_url' ));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'amazorize_general_header_banner', array(
			'label'			=> __( 'Header Banner', 'amazorize' ),
			'section'		=> 'amazorize_general_header_controllers',
			'priority'		=> 12,
			'button_labels' => array(
				'select'		=> __( 'Select File', 'amazorize'),
				'change'		=> __( 'Change File', 'amazorize'),
				'default'		=> __( 'Default', 'amazorize'),
				'remove'		=> __( 'Remove', 'amazorize'),
				'placeholder'	=> __( 'No file selected', 'amazorize'),
				'frame_title'	=> __( 'Select File', 'amazorize'),
				'frame_button'	=> __( 'Choose File', 'amazorize'),
			)
		)
	));


	/* Text Banner Color */
	$wp_customize->add_setting( 'amazorize_general_header_banner_text_color', array(
		'default'			=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'amazorize_general_header_banner_text_color', array(
		'label'				=> __( 'Banner Text Color', 'amazorize' ),
		'section'			=> 'amazorize_general_header_controllers',
		'settings'			=> 'amazorize_general_header_banner_text_color',
		'priority'			=> 13,
	)));

	/* Text Banner */
	$wp_customize->add_setting('amazorize_general_header_banner_text', array('sanitize_callback' => 'amazorize_sanitize_html', 'default' => ''));
	$wp_customize->add_control( 'amazorize_general_header_banner_text', array(
		'type'				=> 'textarea',
		'label'				=> __( 'Banner Text', 'amazorize' ),
		'section'			=> 'amazorize_general_header_controllers',
		'priority'			=> 14,
		'input_attrs' => array(
			'class'				=> 'my-custom-class',
			'placeholder'		=> __( 'Your banner text here...', 'amazorize'),
		),
	));

	$wp_customize->add_setting( 'amazorize_general_header_banner_options_single', array('sanitize_callback' => 'amazorize_sanitize_select', 'default' => 'single_banner_enable'));
	$wp_customize->add_control( 'amazorize_general_header_banner_options_single', array(
		'type'				=> 'radio',
		'label'				=> __( 'Banner Single Pages', 'amazorize' ),
		'section'			=> 'amazorize_general_header_controllers',
		'priority'			=> 15,
		'choices'			=> array(
			'single_banner_enable'		=> __('Enable', 'amazorize'),
			'single_banner_disable'		=> __('Disable', 'amazorize'),
		),
	));
	