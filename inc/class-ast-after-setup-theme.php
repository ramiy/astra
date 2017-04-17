<?php
/**
 * Astra functions and definitions.
 * Text Domain: astra
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * Astra is a very powerful theme and virtually anything can be customized
 * via a child theme.
 *
 * @package     Astra
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2015, Brainstorm Force
 * @link        http://www.brainstormforce.com
 * @since       Astra 1.0.0
 */

/**
 * AST_After_Setup_Theme initial setup
 *
 * @since 1.0.0
 */
if ( ! class_exists( 'AST_After_Setup_Theme' ) ) {

	/**
	 * AST_After_Setup_Theme initial setup
	 */
	class AST_After_Setup_Theme {

		/**
		 * Instance
		 *
		 * @var $instance
		 */
		private static $instance;

		/**
		 * Initiator
		 *
		 * @since 1.0.0
		 * @return object
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
			add_action( 'after_setup_theme', array( $this, 'content_width' ), 	0 );
			add_action( 'after_setup_theme', array( $this, 'setup_theme' ), 	2 );
		}

		/**
		 * Content Width
		 *
		 * @since 1.0.0
		 */
		function content_width() {
			$GLOBALS['content_width'] = apply_filters( 'ast_content_width', 700 );
		}

		/**
		 * Setup theme
		 *
		 * @since 1.0.0
		 */
		function setup_theme() {

			do_action( 'ast_class_loaded' );

			if ( ! isset( $content_width ) ) {
				$content_width = 700;
			}

			/**
			 * Make theme available for translation.
			 * Translations can be filed in the /languages/ directory.
			 * If you're building a theme based on Next, use a find and replace
			 * to change 'astra' to the name of your theme in all the template files.
			 */
			load_theme_textdomain( 'astra', AST_THEME_DIR . '/languages' );

			/**
			 * Theme Support
			 */

			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );

			// Let WordPress manage the document title.
			add_theme_support( 'title-tag' );

			// Enable support for Post Thumbnails on posts and pages.
			add_theme_support( 'post-thumbnails' );

			// Switch default core markup for search form, comment form, and comments.
			// to output valid HTML5.
			add_theme_support( 'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			) );

			// Post formats.
			add_theme_support( 'post-formats', array(
				'gallery',
				'image',
				'link',
				'quote',
				'video',
				'audio',
				'status',
				'aside',
			) );

			// Add theme support for Custom Logo.
			add_theme_support( 'custom-logo', array(
				'width'       => 250,
				'height'      => 250,
				'flex-width'  => true,
				'flex-height' => true,
			) );

			// WooCommerce.
			add_theme_support( 'woocommerce' );

			// Load required widgets from plugin 'ast-widgets'.
			add_theme_support( 'ast-custom-js' );
			add_theme_support( 'ast-theme' );
			add_theme_support( 'ast-shortcodes' );

			add_theme_support( 'widget-address' );
			add_theme_support( 'widget-flickr-gallery' );
			add_theme_support( 'widget-instagram-gallery' );
			add_theme_support( 'widget-progress-bar' );
			add_theme_support( 'widget-info-box' );
			add_theme_support( 'widget-social-profiles' );
			add_theme_support( 'widget-newsletter' );
			add_theme_support( 'widget-image' );
			add_theme_support( 'widget-twitter-feeds' );
			add_theme_support( 'widget-custom-menu' );
			add_theme_support( 'widget-button' );
			add_theme_support( 'widget-recent-posts' );

			add_theme_support( 'mce-font-size' );
			add_theme_support( 'mce-font-family' );

			// Customize Selective Refresh Widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );

			/**
			 * This theme styles the visual editor to resemble the theme style,
			 * specifically font, colors, icons, and column width.
			 */
			add_editor_style( 'assets/css/unminified/editor-style.css' );
		}
	}
}// End if().

/**
 *  Kicking this off by calling 'get_instance()' method
 */
$ast_after_setup_theme = AST_After_Setup_Theme::get_instance();
