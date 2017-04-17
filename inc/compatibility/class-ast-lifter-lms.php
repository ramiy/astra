<?php
/**
 * Lifter LMS Compatibility File.
 *
 * @package Astra
 */

// If plugin - 'Lifter LMS' not exist then return.
if ( ! class_exists( 'LifterLMS' ) ) {
	return;
}

/**
 * Astra Lifter LMS Compatibility
 */
if ( ! class_exists( 'Ast_Lifter_LMS' ) ) :

	/**
	 * Astra Lifter LMS Compatibility
	 *
	 * @since 1.0.0
	 */
	class Ast_Lifter_LMS {

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

			add_filter( 'llms_get_theme_default_sidebar', array( $this, 'ast_llms_sidebar' ) );
			add_action( 'after_setup_theme', array( $this, 'ast_llms_theme_support' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'add_styles' ) );
		}

		/**
		 * Display LifterLMS Course and Lesson sidebars
		 * on courses and lessons in place of the sidebar returned by
		 * this function
		 *
		 * @param    string $id    default sidebar id (an empty string).
		 * @return   string
		 */
		function ast_llms_sidebar( $id ) {
			$sidebar_id = 'sidebar-1'; // replace this with your theme's sidebar ID.
			return $sidebar_id;
		}

		/**
		 * Declare explicit theme support for LifterLMS course and lesson sidebars
		 *
		 * @return   void
		 */
		function ast_llms_theme_support() {
			add_theme_support( 'lifterlms-sidebars' );
		}

		/**
		 * Add Styles Callback
		 */
		function add_styles() {
			AST_Enqueue_Scripts::register_style( 'ast-site-compatible-lifter-lms', 	AST_THEME_URI . 'assets/css/unminified/site-compatible/lifter-lms.css', 		 array(), AST_THEME_VERSION, 'all' );
		}
	}

endif;

/**
*  Kicking this off by calling 'get_instance()' method
*/
$ast_lifter_lms  = Ast_Lifter_LMS::get_instance();
