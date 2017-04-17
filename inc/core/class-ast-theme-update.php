<?php
/**
 * Theme Update
 *
 * @package     Astra
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2015, Brainstorm Force
 * @link        http://www.brainstormforce.com
 * @since       Astra 1.0.0
 */

if ( ! class_exists( 'Ast_Theme_Update' ) ) {

	/**
	 * Ast_Theme_Update initial setup
	 *
	 * @since 1.0.0
	 */
	class Ast_Theme_Update {

		/**
		 * Class instance.
		 *
		 * @access private
		 * @var $instance Class instance.
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 *  Constructor
		 */
		public function __construct() {

			// Theme Updates.
			add_action( 'init', __CLASS__ . '::init' );

		}

		/**
		 * Implement theme update logic.
		 *
		 * @since 1.0.0
		 * @return void
		 */
		static public function init() {

			do_action( 'astra_auto_update_before' );

			// Get auto saved version number.
			$saved_version = get_option( '_astra_auto_version', '0' );

			// If matches the current version then skip the next steps.
			if ( version_compare( $saved_version, AST_THEME_VERSION, '=' ) ) {
				return;
			}

			// Update auto saved version number.
			update_option( '_astra_auto_version', AST_THEME_VERSION );

			do_action( 'astra_auto_update_after' );
		}
	}
}// End if().

/**
 * Kicking this off by calling 'get_instance()' method
 */
$ast_theme_update = Ast_Theme_Update::get_instance();
