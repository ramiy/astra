<?php
/**
 * Header Options for Astra Theme.
 *
 * @package     Astra
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2015, Brainstorm Force
 * @link        http://www.brainstormforce.com
 * @since       Astra 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

	/**
	 * Option: Custom Menu Item
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[header-main-rt-section]', array(
		'default'           => $defaults['header-main-rt-section'],
		'type'              => 'option',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_choices' ),
	) );
	$wp_customize->add_control( AST_THEME_SETTINGS . '[header-main-rt-section]', array(
		'type'        => 'select',
		'section'     => 'section-header',
		'priority' 	  => 5,
		'label'       => __( 'Custom Menu Item', 'astra' ),
		'choices'     => array(
			'none'      => __( 'None', 'astra' ),
			'search'    => __( 'Search', 'astra' ),
			'text-html' => __( 'Text / HTML', 'astra' ),
		),
	) );

	/**
	 * Option: Right Section Text / HTML
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[header-main-rt-section-html]', array(
		'default'           => $defaults['header-main-rt-section-html'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_html' ),
	) );
	$wp_customize->add_control( AST_THEME_SETTINGS . '[header-main-rt-section-html]', array(
		'type'        => 'textarea',
		'section'     => 'section-header',
		'priority'    => 10,
		'label'       => __( 'Custom Menu Text / HTML', 'astra' ),
	) );

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( AST_THEME_SETTINGS . '[header-main-rt-section-html]', array(
			'selector'            => '.main-header-menu .ast-masthead-custom-menu-items .ast-custom-html',
			'container_inclusive' => false,
			'render_callback'     => array( 'AST_Customizer_Partials', '_render_header_main_rt_section_html' ),
		) );
	}

	/**
	 * Option: Bottom Border Size
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[header-main-sep]', array(
		'default'           => $defaults['header-main-sep'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_number' ),
	) );
	$wp_customize->add_control( AST_THEME_SETTINGS . '[header-main-sep]', array(
		'type'        => 'number',
		'section'     => 'section-header',
		'priority'    => 25,
		'label'       => __( 'Bottom Border Size', 'astra' ),
		'input_attrs' => array(
			'min'  => 0,
			'step' => 1,
			'max'  => 600,
		),
	) );

	/**
	 * Option: Bottom Border Color
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[header-main-sep-color]', array(
		'default'           => $defaults['header-main-sep-color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_hex_color' ),
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, AST_THEME_SETTINGS . '[header-main-sep-color]', array(
		'section'     => 'section-header',
		'priority'    => 30,
		'label'       => __( 'Bottom Border Color', 'astra' ),
	) ) );

	/**
	 * Option: Header Width
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[header-main-layout-width]', array(
		'default'           => $defaults['header-main-layout-width'],
		'type'              => 'option',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_choices' ),
	) );
	$wp_customize->add_control( AST_THEME_SETTINGS . '[header-main-layout-width]', array(
		'type'        => 'select',
		'section'     => 'section-header',
		'priority'    => 35,
		'label'       => __( 'Header Width', 'astra' ),
		'choices'     => array(
			'full'    => __( 'Full Width', 'astra' ),
			'content' => __( 'Content Width', 'astra' ),
		),
	) );
