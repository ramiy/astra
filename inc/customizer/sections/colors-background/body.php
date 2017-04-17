<?php
/**
 * Styling Options for Astra Theme.
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
	 * Option: Text Color
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[text-color]', array(
		'default'           => $defaults['text-color'],
		'type'              => 'option',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_hex_color' ),
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, AST_THEME_SETTINGS . '[text-color]', array(
		'section'     => 'section-colors-body',
		'priority'    => 5,
		'label'       => __( 'Text Color', 'astra' ),
	) ) );

	/**
	 * Option: Link Color
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[link-color]', array(
		'default'           => $defaults['link-color'],
		'type'              => 'option',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_hex_color' ),
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, AST_THEME_SETTINGS . '[link-color]', array(
		'section'     => 'section-colors-body',
		'priority'    => 10,
		'label'       => __( 'Link Color / Theme Color', 'astra' ),
	) ) );

	/**
	 * Option: Link Hover Color
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[link-h-color]', array(
		'default'           => $defaults['link-h-color'],
		'type'              => 'option',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_hex_color' ),
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, AST_THEME_SETTINGS . '[link-h-color]', array(
		'section'     => 'section-colors-body',
		'priority'    => 15,
		'label'       => __( 'Link Hover Color', 'astra' ),
	) ) );


	/**
	 * Option: Divider
	 */
	$wp_customize->add_control( new Ast_Control_Divider( $wp_customize, AST_THEME_SETTINGS . '[divider-outside-bg-color]', array(
		'type'     => 'ast-divider',
		'section'  => 'section-colors-body',
		'priority' => 20,
		'settings' => array(),
	) ) );
