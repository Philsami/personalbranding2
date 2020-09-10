<?php
/**
|------------------------------------------------------------------------------
| OPTIONS
|------------------------------------------------------------------------------
*/
	$wp_customize->add_panel( 'tc_panel_single', array(
		'priority'			=> 33,
		'capability'		=> 'edit_theme_options',
		'theme_supports'	=> '',
		'title'				=> __( 'Options Single', 'amazorize' )
	));

	/**************************
	* Section: Post Navigation *
	**************************/
	$wp_customize->add_section( 'amazorize_post_navigation_section' , array(
		'title'				=> __( 'Post Navigation', 'amazorize' ),
		'priority'			=> 1,
		'panel'				=> 'tc_panel_single'
	));

	/* Post Navigation Options */
	$wp_customize->add_setting('amazorize_post_navigation_options', array('sanitize_callback' => 'amazorize_sanitize_select', 'default'=> 'navigation_enable'));
	$wp_customize->add_control('amazorize_post_navigation_options', array(
		'label'				=> __('Post Navigation', 'amazorize'),
		'section'			=> 'amazorize_post_navigation_section',
		'type'				=> 'radio',
		'priority'			=> 2,
		'choices'			=> array(
			'navigation_enable'				=> __('Enable', 'amazorize'),
			'navigation_disable'			=> __('Disable', 'amazorize'),
		),
	));

	/**************************
	* Section: Related Posts *
	**************************/
	$wp_customize->add_section( 'amazorize_related_post_section' , array(
		'title'				=> __( 'Related Posts', 'amazorize' ),
		'priority'			=> 2,
		'panel'				=> 'tc_panel_single'
	));

	/* Related Posts Options */
	$wp_customize->add_setting('amazorize_related_post_options', array('sanitize_callback' => 'amazorize_sanitize_select', 'default'=> 'related_post_enable'));
	$wp_customize->add_control('amazorize_related_post_options', array(
		'label'				=> __('Related Posts', 'amazorize'),
		'section'			=> 'amazorize_related_post_section',
		'type'				=> 'radio',
		'priority'			=> 1,
		'choices'			=> array(
			'related_post_enable'			=> __('Enable', 'amazorize'),
			'related_post_disable'			=> __('Disable', 'amazorize'),
		),
	));

	/* Taxonmy of Related Posts */
	$wp_customize->add_setting('amazorize_related_post_taxonomy', array('sanitize_callback' => 'amazorize_sanitize_select', 'default'=> 'category'));
	$wp_customize->add_control('amazorize_related_post_taxonomy', array(
		'label'				=> __('Related Posts Taxonomy', 'amazorize'),
		'section'			=> 'amazorize_related_post_section',
		'type'				=> 'radio',
		'priority'			=> 2,
		'choices'			=> array(
			'category'				=> __('Categories', 'amazorize'),
			'tag'					=> __('Tags', 'amazorize'),
		),
	));

	/* Number of Related Posts */
	$wp_customize->add_setting('amazorize_number_related_posts', array('sanitize_callback' => 'amazorize_sanitize_number_absint', 'default' => '6'));
	$wp_customize->add_control( 'amazorize_number_related_posts', array(
		'type'				=> 'number',
		'section'			=> 'amazorize_related_post_section',
		'label'				=> __( 'Number of Related Posts', 'amazorize' ),
		'priority'			=> 3,
	));