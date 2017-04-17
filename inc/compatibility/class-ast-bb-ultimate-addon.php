<?php
/**
 * Filters to override defaults in UABB
 *
 * @see  https://github.com/zamoose/themehookalliance
 *
 * @package     Astra
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2015, Brainstorm Force
 * @link        http://www.brainstormforce.com
 * @since       Astra 1.0.0
 */

// If plugin - 'BB Ultimate Addon' not exist then return.
if ( ! class_exists( 'BB_Ultimate_Addon' ) ) {
	return;
}

/**
 * Astra BB Ultimate Addon Compatibility
 */
if ( ! class_exists( 'Ast_BB_Ultimate_Addon' ) ) :

	/**
	 * Astra BB Ultimate Addon Compatibility
	 *
	 * @since 1.0.0
	 */
	class Ast_BB_Ultimate_Addon {

		/**
		 * Member Varible
		 *
		 * @var object instance
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
		public function __construct() {

			add_filter( 'uabb_global_support', 			        array( $this, 'remove_uabb_global_setting' ) );
			add_filter( 'uabb_theme_theme_color', 			    array( $this, 'uabb_theme_color' ) );
			add_filter( 'uabb_theme_text_color', 			    array( $this, 'uabb_text_color' ) );
			add_filter( 'uabb_theme_link_color', 			    array( $this, 'uabb_link_color' ) );
			add_filter( 'uabb_theme_link_hover_color', 			array( $this, 'uabb_link_hover_color' ) );
			add_filter( 'uabb_theme_button_font_family', 	    array( $this, 'uabb_button_font_family' ) );
			add_filter( 'uabb_theme_button_font_size', 			array( $this, 'uabb_button_font_size' ) );
			add_filter( 'uabb_theme_button_line_height', 	    array( $this, 'uabb_button_line_height' ) );
			add_filter( 'uabb_theme_button_letter_spacing', 	array( $this, 'uabb_button_letter_spacing' ) );
			add_filter( 'uabb_theme_button_text_transform', 	array( $this, 'uabb_button_text_transform' ) );
			add_filter( 'uabb_theme_button_text_color', 	    array( $this, 'uabb_button_text_color' ) );
			add_filter( 'uabb_theme_button_text_hover_color', 	array( $this, 'uabb_button_text_hover_color' ) );
			add_filter( 'uabb_theme_button_bg_color', 			array( $this, 'uabb_button_bg_color' ) );
			add_filter( 'uabb_theme_button_bg_hover_color', 	array( $this, 'uabb_button_bg_hover_color' ) );
			add_filter( 'uabb_theme_button_border_radius', 	    array( $this, 'uabb_button_border_radius' ) );
			add_filter( 'uabb_theme_button_padding', 			array( $this, 'uabb_button_padding' ) );
			add_filter( 'uabb_theme_button_vertical_padding', 	array( $this, 'uabb_button_vertical_padding' ) );
			add_filter( 'uabb_theme_button_horizontal_padding', array( $this, 'uabb_button_horizontal_padding' ) );
		}

		/**
		 * Remove UABB Global Setting Option
		 */
		function remove_uabb_global_setting() {
			return false;
		}

		/**
		 * Theme Color
		 */
		function uabb_theme_color() {
			$color = ast_get_option( 'link-color' );

			return $color;
		}


		/**
		 * Text Color
		 */
		function uabb_text_color() {
			$color = ast_get_option( 'text-color' );

			return $color;
		}


		/**
		 * Link Color
		 */
		function uabb_link_color() {
			$color = ast_get_option( 'link-color' );

			return $color;
		}


		/**
		 * Link Hover Color
		 */
		function uabb_link_hover_color() {
			$color = ast_get_option( 'link-h-color' );

			return $color;
		}

		/**
		 * Button Font Family
		 */
		function uabb_button_font_family() {
			$btn_font_family['family'] = 'Source Sans Pro';
			$btn_font_family['weight'] = 'normal';

			return $btn_font_family;
		}

		/**
		 * Button Font Size
		 */
		function uabb_button_font_size() {
			return '';
		}

		/**
		 * Button Line Height
		 */
		function uabb_button_line_height() {
			return '';
		}

		/**
		 * Button Letter Spacing
		 */
		function uabb_button_letter_spacing() {
			return '';
		}

		/**
		 * Button Text Transform
		 */
		function uabb_button_text_transform() {
			return '';
		}

		/**
		 * Button Text Color
		 */
		function uabb_button_text_color() {
			$link_color = ast_get_option( 'link-color' );
			$color      = ast_get_option( 'button-color' );
			if ( empty( $color ) ) {
				$color = ast_get_foreground_color( $link_color );
			}

			return $color;
		}

		/**
		 * Button Text Hover Color
		 */
		function uabb_button_text_hover_color() {
			$link_hover_color = ast_get_option( 'link-h-color' );
			$color            = ast_get_option( 'button-h-color' );
			if ( empty( $color ) ) {
				$color = ast_get_foreground_color( $link_hover_color );
			}

			return $color;
		}

		/**
		 * Button Background Color
		 */
		function uabb_button_bg_color() {
			$color = ast_get_option( 'button-bg-color' );

			return $color;
		}

		/**
		 * Button Background Color
		 */
		function uabb_button_bg_hover_color() {
			$color = ast_get_option( 'button-bg-h-color' );

			return $color;
		}

		/**
		 * Button Border Radius
		 */
		function uabb_button_border_radius() {
			$border_radius = ast_get_option( 'button-radius' );

			return $border_radius;
		}


		/**
		 * Button Padding
		 */
		function uabb_button_padding() {

			$padding   = '';
			$v_padding = ast_get_option( 'button-v-padding' );
			$h_padding = ast_get_option( 'button-h-padding' );

			if ( '' != $v_padding && '' != $h_padding ) {
				$padding = $v_padding . 'px ' . $h_padding . 'px';
			}

			return $padding;
		}

		/**
		 * Button Padding
		 */
		function uabb_button_vertical_padding() {

			$padding   = '';
			$v_padding = ast_get_option( 'button-v-padding' );

			if ( '' != $v_padding ) {
				$padding = $v_padding;
			}

			return $padding;
		}

		/**
		 * Button Padding
		 */
		function uabb_button_horizontal_padding() {

			$padding   = '';
			$h_padding = ast_get_option( 'button-h-padding' );

			if ( '' != $h_padding ) {
				$padding = $h_padding;
			}

			return $padding;
		}

	}

endif;

/**
*  Kicking this off by calling 'get_instance()' method
*/
$ast_bb_ultimate_addon = Ast_BB_Ultimate_Addon::get_instance();
