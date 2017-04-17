<?php
/**
 * Beaver Builder Compatibility File.
 *
 * @package Astra
 */

// If plugin - 'Builder Builder' not exist then return.
if ( ! class_exists( 'FLBuilderModel' ) ) {
	return;
}

/**
 * Astra Beaver Builder Compatibility
 */
if ( ! class_exists( 'Ast_Beaver_Builder' ) ) :

	/**
	 * Astra Beaver Builder Compatibility
	 *
	 * @since 1.0.0
	 */
	class Ast_Beaver_Builder {

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
			AST_Enqueue_Scripts::register_style( 'ast-site-compatible-site-origin', 	AST_THEME_URI . 'assets/css/unminified/site-compatible/bb-plugin.css', 		 array(), AST_THEME_VERSION, 'all' );
		}

	}

endif;

/**
*  Kicking this off by calling 'get_instance()' method
*/
$ast_beaver_builder  = Ast_Beaver_Builder::get_instance();
