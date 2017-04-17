<?php
/**
 * Customizer Partial.
 *
 * @package     Astra
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2015, Brainstorm Force
 * @link        http://www.brainstormforce.com
 * @since       Astra 1.0.0
 */

// No direct access, please.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Customizer Partials
 *
 * @since 1.0.0
 */
if ( ! class_exists( 'AST_Customizer_Partials' ) ) {

	/**
	 * Customizer Partials initial setup
	 */
	class AST_Customizer_Partials {

		/**
		 * Instance
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() { }

		/**
		 * Render Partial Blog Name
		 */
		function _render_partial_blogname() {
			bloginfo( 'name' );
		}

		/**
		 * Render Partial Blog Description
		 */
		function _render_partial_blogdescription() {
			bloginfo( 'description' );
		}

		/**
		 * Render Partial Site Tagline
		 */
		static function _render_partial_site_tagline() {
			$options = Ast_Theme_Options::get_options();
			if ( true == $options['display-site-tagline'] ) {
				return get_bloginfo( 'description' );
			}
		}

		/**
		 * Render Partial Site Tagline
		 */
		static function _render_partial_site_title() {
			$options = Ast_Theme_Options::get_options();
			if ( true == $options['display-site-title'] ) {
				return get_bloginfo( 'name' );
			}
		}

		/**
		 * Render Partial Header Right Section HTML
		 */
		static function _render_header_main_rt_section_html() {
			$options = Ast_Theme_Options::get_options();
			return do_shortcode( $options['header-main-rt-section-html'] );
		}

		/**
		 * Render Partial Footer Section 1 Credit
		 */
		static function _render_footer_sml_section_1_credit() {
			$options = Ast_Theme_Options::get_options();
			$output = $options['footer-sml-section-1-credit'];
			$output = str_replace( '[current_year]', date( 'Y' ), $output );
			$output = str_replace( '[site_title]', '<span class="ast-footer-site-title">' . get_option( 'blogname' ) . '</span>', $output );

			$theme_author = apply_filters( 'ast_theme_author', array(
				'theme_name'       => __( 'Astra', 'astra' ),
				'theme_author_url' => 'https://www.brainstormforce.com/',
			) );

			$output = str_replace( '[theme_author]', '<a href="' . esc_url( $theme_author['theme_author_url'] ) . '">' . esc_html( $theme_author['theme_name'] ) . '</a>', $output );
			return do_shortcode( $output );
		}

		/**
		 * Render Partial Footer Section 2 Credit
		 */
		static function _render_footer_sml_section_2_credit() {
			$options = Ast_Theme_Options::get_options();
			$output = $options['footer-sml-section-2-credit'];
			$output = str_replace( '[current_year]', date( 'Y' ), $output );
			$output = str_replace( '[site_title]', '<span class="ast-footer-site-title">' . get_option( 'blogname' ) . '</span>', $output );

			$theme_author = apply_filters( 'ast_theme_author', array(
				'theme_name'       => __( 'Astra', 'astra' ),
				'theme_author_url' => 'https://www.brainstormforce.com/',
			) );

			$output = str_replace( '[theme_author]', '<a href="' . esc_url( $theme_author['theme_author_url'] ) . '">' . esc_html( $theme_author['theme_name'] ) . '</a>', $output );
			return do_shortcode( $output );
		}
	}
}// End if().

/**
 *  Kicking this off by calling 'get_instance()' method
 */
$ast_customizer_partials = AST_Customizer_Partials::get_instance();
