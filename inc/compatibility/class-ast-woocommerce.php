<?php
/**
 * WooCommerce Compatibility File.
 *
 * @link https://woocommerce.com/
 *
 * @package Astra
 */

// If plugin - 'WooCommerce' not exist then return.
if ( ! class_exists( 'WooCommerce' ) ) {
	return;
}

/**
 * Astra WooCommerce Compatibility
 */
if ( ! class_exists( 'Ast_Woocommerce' ) ) :

	/**
	 * Astra WooCommerce Compatibility
	 *
	 * @since 1.0.0
	 */
	class Ast_Woocommerce {

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

			add_action( 'woocommerce_before_main_content', array( $this, 'before_main_content_start' ), 10 );
			add_action( 'woocommerce_after_main_content', array( $this, 'before_main_content_end' ), 10 );

			add_action( 'wp_enqueue_scripts', array( $this, 'add_styles' ) );

			add_action( 'init', array( $this, 'woocommerce_init' ), 1 );
		}

		/**
		 * Remove Woo-Commerce Default actions
		 */
		function woocommerce_init() {
			remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
			remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
			remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
		}

		/**
		 * Add start of wrapper
		 */
		function before_main_content_start() {
			$site_sidebar = ast_page_layout();
			if ( 'left-sidebar' == $site_sidebar ) {
				 get_sidebar();
			}
			?>
			<div id="primary" class="content-area primary">
				<main id="main" class="site-main" role="main">
					<div class="ast-woocommerce-container">
			<?php
		}

		/**
		 * Add end of wrapper
		 */
		function before_main_content_end() {
			?>
					</div> <!-- .ast-woocommerce-container -->
				</main> <!-- #main -->
			</div> <!-- #primary -->
			<?php
			$site_sidebar = ast_page_layout();
			if ( 'right-sidebar' == $site_sidebar ) {
				 get_sidebar();
			}
		}

		/**
		 * Add Styles Callback
		 */
		function add_styles() {
			AST_Enqueue_Scripts::register_style( 'ast-site-compatible-woocommerce', 	AST_THEME_URI . 'assets/css/unminified/site-compatible/woocommerce.css', 		 array(), AST_THEME_VERSION, 'all' );
		}

	}

endif;

/**
*  Kicking this off by calling 'get_instance()' method
*/
$ast_woocommerce  = Ast_Woocommerce::get_instance();
