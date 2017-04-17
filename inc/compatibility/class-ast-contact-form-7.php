<?php
/**
 * Contact Form 7 Compatibility File.
 *
 * @package Astra
 */

// If plugin - 'Contact Form 7' not exist then return.
if ( ! class_exists( 'WPCF7' ) ) {
	return;
}

/**
 * Astra Contact Form 7 Compatibility
 */
if ( ! class_exists( 'Ast_Contact_Form_7' ) ) :

	/**
	 * Astra Contact Form 7 Compatibility
	 *
	 * @since 1.0.0
	 */
	class Ast_Contact_Form_7 {

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
			add_action( 'wp_enqueue_scripts', array( $this, 'add_styles' ) );
		}

		/**
		 * Add Styles Callback
		 */
		function add_styles() {
			AST_Enqueue_Scripts::register_style( 'ast-site-compatible-contact-Form-7', 	AST_THEME_URI . 'assets/css/unminified/site-compatible/contact-Form-7.css', 		 array(), AST_THEME_VERSION, 'all' );
		}

	}

endif;

/**
*  Kicking this off by calling 'get_instance()' method
*/
$ast_contact_form_7  = Ast_Contact_Form_7::get_instance();
