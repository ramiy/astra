<?php
/**
 * Gravity Forms File.
 *
 * @package Astra
 */

// If plugin - 'Gravity Forms' not exist then return.
if ( ! class_exists( 'GFForms' ) ) {
	return;
}

/**
 * Astra Gravity Forms
 */
if ( ! class_exists( 'Ast_Gravity_Forms' ) ) :

	/**
	 * Astra Gravity Forms
	 *
	 * @since 1.0.0
	 */
	class Ast_Gravity_Forms {

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
			AST_Enqueue_Scripts::register_style( 'ast-site-compatible-gravity-forms', 	AST_THEME_URI . 'assets/css/unminified/site-compatible/gravity-forms.css', 		 array(), AST_THEME_VERSION, 'all' );
		}

	}

endif;

/**
*  Kicking this off by calling 'get_instance()' method
*/
$ast_gravity_forms  = Ast_Gravity_Forms::get_instance();
