<?php
/**
 * BNR Flyout Compatibility File.
 *
 * @package Astra
 */

// If plugin - 'BNR Flyout' not exist then return.
if ( ! class_exists( 'FLBuilderModel' ) ) {
	return;
}

/**
 * Astra BNR Flyout Compatibility
 */
if ( ! class_exists( 'Ast_BNR_Flyout' ) ) :

	/**
	 * Astra BNR Flyout Compatibility
	 *
	 * @since 1.0.0
	 */
	class Ast_BNR_Flyout {

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
			AST_Enqueue_Scripts::register_style( 'ast-site-compatible-bnr-flyout', 	AST_THEME_URI . 'assets/css/unminified/site-compatible/bnr-flyout.css', 		 array(), AST_THEME_VERSION, 'all' );
		}

	}

endif;

/**
*  Kicking this off by calling 'get_instance()' method
*/
$ast_beaver_builder  = Ast_BNR_Flyout::get_instance();
