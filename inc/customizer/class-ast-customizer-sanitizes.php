<?php
/**
 * Astra Theme Customizer Sanitize.
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
 * Customizer Sanitizes
 *
 * @since 1.0.0
 */
if ( ! class_exists( 'AST_Customizer_Sanitizes' ) ) {

	/**
	 * Customizer Sanitizes Initial setup
	 */
	class AST_Customizer_Sanitizes {

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
		 * Sanitize Integer
		 *
		 * @param  number $input Customizer setting input number.
		 * @return number        Absolute number.
		 */
		static public function sanitize_integer( $input ) {
			return absint( $input );
		}

		/**
		 * Sanitize Integer
		 *
		 * @param  number $val Customizer setting input number.
		 * @return number        Return number.
		 */
		static public function sanitize_number( $val ) {
			return is_numeric( $val ) ? $val : 0;
		}

		/**
		 * Sanitize Integer
		 *
		 * @param  number $val Customizer setting input number.
		 * @return number        Return number.
		 */
		static public function sanitize_number_n_blank( $val ) {
			return is_numeric( $val ) ? $val : '';
		}

		/**
		 * Validate Email
		 *
		 * @param  object $validity setting input validity.
		 * @param  string $value    setting input value.
		 * @return object           Return the validity object.
		 */
		static public function validate_email( $validity, $value ) {
		    if ( ! is_email( $value ) ) {
		        $validity->add( 'required', __( 'Enter valid email address!', 'astra' ) );
		    }
		    return $validity;
		}

		/**
		 * Validate Sidebar Content Width
		 *
		 * @param  number $value Sidebar content width.
		 * @return number        Sidebar content width value.
		 */
		static public function validate_sidebar_content_width( $value ) {
			$value = intval( $value );
			if ( $value > 50 ) {
				$value = 50;
			} elseif ( $value < 15 ) {
				$value = 15;
			}
			return $value;
		}

		/**
		 * Validate Site width
		 *
		 * @param  number $value Site width.
		 * @return number        Site width value.
		 */
		static public function validate_site_width( $value ) {
			$value = intval( $value );
			if ( 1920 < $value ) {
				$value = 1920;
			} elseif ( 768 > $value ) {
				$value = 768;
			}
			return $value;
		}

		/**
		 * Validate Site padding
		 *
		 * @param  number $value Site padding.
		 * @return number        Site padding value.
		 */
		static public function validate_site_padding( $value ) {
			$value = intval( $value );
			if ( 200 < $value ) {
				$value = 200;
			} elseif ( 1 > $value ) {
				$value = 1;
			}
			return $value;
		}

		/**
		 * Validate Site margin
		 *
		 * @param  number $value Site margin.
		 * @return number        Site margin value.
		 */
		static public function validate_site_margin( $value ) {
			$value = intval( $value );
			if ( 600 < $value ) {
				$value = 600;
			} elseif ( 0 > $value ) {
				$value = 0;
			}
			return $value;
		}

		/**
		 * Sanitize checkbox
		 *
		 * @param  number $input setting input.
		 * @return number        setting input value.
		 */
		static public function sanitize_checkbox( $input ) {
			if ( $input ) {
				$output = '1';
			} else {
				$output = false;
			}
			return $output;
		}

		/**
		 * Sanitize HEX color
		 *
		 * @param  string $color setting input.
		 * @return string        setting input value.
		 */
		static public function sanitize_hex_color( $color ) {

		    if ( '' === $color ) {
		        return '';
			}

		    // 3 or 6 hex digits, or the empty string.
		    if ( preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
		        return $color;
			}

		    return '';
		}

		/**
		 * Sanitize html
		 *
		 * @param  string $input 	setting input.
		 * @return mixed        	setting input value.
		 */
		static public function sanitize_html( $input ) {
			return wp_kses_post( $input );
		}

		/**
		 * Sanitize Select choices
		 *
		 * @param  string $input 	setting input.
		 * @param  object $setting 	setting object.
		 * @return mixed        	setting input value.
		 */
		static public function sanitize_multi_choices( $input, $setting ) {

			// Get list of choices from the control
			// associated with the setting.
			$choices = $setting->manager->get_control( $setting->id )->choices;
			$input_keys = $input;

			foreach ( $input_keys as $key => $value ) {
				if ( ! array_key_exists( $value, $choices ) ) {
					unset( $input[ $key ] );
				}
			}

			// If the input is a valid key, return it;
			// otherwise, return the default.
			return ( is_array( $input ) ? $input : $setting->default );
		}

		/**
		 * Sanitize Select choices
		 *
		 * @param  string $input 	setting input.
		 * @param  object $setting 	setting object.
		 * @return mixed        	setting input value.
		 */
		static public function sanitize_choices( $input, $setting ) {

			// Ensure input is a slug.
			$input = sanitize_key( $input );

			// Get list of choices from the control
			// associated with the setting.
			$choices = $setting->manager->get_control( $setting->id )->choices;

			// If the input is a valid key, return it;
			// otherwise, return the default.
			return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
		}

		/**
		 * Sanitize Font weight
		 *
		 * @param  mixed $input setting input.
		 * @return mixed        setting input value.
		 */
		static public function sanitize_font_weight( $input ) {

		    $valid = array(
		        'normal',
				'bold',
				'100',
				'200',
				'300',
				'400',
				'500',
				'600',
				'700',
				'800',
				'900',
		    );

		    if ( in_array( $input, $valid ) ) {
		        return $input;
		    } else {
		        return 'normal';
		    }
		}
	}
}// End if().

/**
 *  Kicking this off by calling 'get_instance()' method
 */
$ast_customizer_sanitizes = AST_Customizer_Sanitizes::get_instance();
