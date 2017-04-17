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
			add_filter( 'loop_shop_columns', array( $this, 'loop_shop_columns_callback' ) );
			add_filter( 'ast_dynamic_css', array( $this, 'dynamic_css_callback' ), 10, 2 );
		}

		function dynamic_css_callback( $dynamic_css, $dynamic_css_filtered = '' ) {

			$theme_color  = ast_get_option( 'link-color' );
			$link_h_color = ast_get_option( 'link-h-color' );

			$btn_color    = ast_get_option( 'button-color' );
			if ( empty( $btn_color ) ) {
				$btn_color = ast_get_foreground_color( $theme_color );
			}

			$btn_h_color = ast_get_option( 'button-h-color' );
			if ( empty( $btn_h_color ) ) {
				$btn_h_color = ast_get_foreground_color( $link_h_color );
			}
			$btn_bg_color   = ast_get_option( 'button-bg-color', '', $theme_color );
			$btn_bg_h_color = ast_get_option( 'button-bg-h-color', '', $link_h_color );

			$css_output = array(
				'.woocommerce .product span.onsale' => array(
					'background-color' => $theme_color
				),
				'.woocommerce .product a.button, .woocommerce .woocommerce-message a.button' => array(
					'color'            => $btn_color,
					'border-color'     => $btn_bg_color,
					'background-color' => $btn_bg_color
				),
				'.woocommerce .product a.button:hover, .woocommerce .woocommerce-message a.button:hover' => array(
					'color'            => $btn_h_color,
					'border-color'     => $btn_bg_h_color,
					'background-color' => $btn_bg_h_color
				),
				'.woocommerce .woocommerce-message' => array(
					'border-top-color' => $theme_color
				),
				'.woocommerce .woocommerce-message::before' => array(
					'color' => $theme_color
				),
			);

			/* Parse CSS from array() */
			$css_output = ast_parse_css( $css_output );
			return $dynamic_css . $css_output;
		}

		/**
		 * Update Shop page grid
		 * @param  int $col Shop Column.
		 * @return int
		 */
		function loop_shop_columns_callback( $col ) {

			// Update shop product grid to 3.
			return 3;
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
