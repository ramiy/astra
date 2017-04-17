<?php
/**
 * Favicon Options for Astra Theme.
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
	 * Option: Display Title
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[display-site-title]', array(
		'default'           => $defaults['display-site-title'],
		'type'              => 'option',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_checkbox' ),
	) );
	$wp_customize->add_control( AST_THEME_SETTINGS . '[display-site-title]', array(
		'type'        => 'checkbox',
		'section'     => 'title_tagline',
		'label'       => __( 'Display Site Title', 'astra' ),
		'priority'	  => 6,
	) );

	/**
	 * Option: Display Tagline
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[display-site-tagline]', array(
		'default'           => $defaults['display-site-tagline'],
		'type'              => 'option',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_checkbox' ),
		'priority'          => 5,
	) );
	$wp_customize->add_control( AST_THEME_SETTINGS . '[display-site-tagline]', array(
		'type'        => 'checkbox',
		'section'     => 'title_tagline',
		'label'       => __( 'Display Site Tagline', 'astra' ),
	) );

	/**
	 * Option: Divider
	*/
	$wp_customize->add_control( new Ast_Control_Divider( $wp_customize, AST_THEME_SETTINGS . '[ast-site-icon-divider]', array(
		'type'     => 'ast-divider',
		'section'  => 'title_tagline',
		'priority' => 50,
		'settings' => array(),
	) ) );

