<?php
/**
 * Cornerstone Compatibility File.
 *
 * @package Astra
 */

// If plugin - 'Cornerstone' not exist then return.
if ( ! class_exists( 'Cornerstone_Plugin' ) ) {
	return;
}

/**
 * Astra Cornerstone Compatibility
 */
if ( ! class_exists( 'Ast_Cornerstone' ) ) :

	/**
	 * Astra Cornerstone Compatibility
	 *
	 * @since 1.0.0
	 */
	class Ast_Cornerstone {

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

			add_filter( 'body_class', array( $this, 'cornerstone_compatibility' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'add_styles' ) );
		}

		/**
		 * Astra cornerstone_compatibility
		 *
		 * @param array $classes Classes for the body element.
		 *
		 * @return array
		 */
		function cornerstone_compatibility( $classes ) {

			global $post;

			if ( is_singular() ) {
				if ( isset( $post->post_content ) && has_shortcode( $post->post_content, 'cs_content' ) ) {
					$classes[] = 'ast-cornerstone-compatibility';
				}
			}
			return $classes;
		}

		/**
		 * Add Styles Callback
		 */
		function add_styles() {
			AST_Enqueue_Scripts::register_style( 'ast-site-compatible-cornerstone', 	AST_THEME_URI . 'assets/css/unminified/site-compatible/cornerstone.css', 		 array(), AST_THEME_VERSION, 'all' );
		}

	}

endif;

/**
*  Kicking this off by calling 'get_instance()' method
*/
$ast_cornerstone  = Ast_Cornerstone::get_instance();
