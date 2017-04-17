<?php
/**
 * Template parts
 *
 * @package     Astra
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2015, Brainstorm Force
 * @link        http://www.brainstormforce.com
 * @since       Astra 1.0.0
 */

add_action( 'ast_masthead_toggle_buttons', 	'ast_masthead_toggle_buttons_primary' );
add_action( 'ast_masthead', 				'ast_masthead_primary_template' );
add_filter( 'wp_page_menu_args', 			'ast_masthead_custom_page_menu_items', 10, 2 );
add_filter( 'wp_nav_menu_items', 			'ast_masthead_custom_nav_menu_items', 10, 2 );
add_action( 'ast_footer_content', 			'ast_footer_small_footer_template', 5 );
add_action( 'ast_entry_content_single', 	'ast_entry_content_single_template' );
add_action( 'ast_entry_content_blog', 		'ast_entry_content_blog_template' );
add_action( 'ast_entry_content_404_page', 	'ast_entry_content_404_page_template' );

/**
 * Header Custom Menu Item
 */
if ( ! function_exists( 'ast_masthead_get_menu_items' ) ) :

	/**
	 * Custom Menu Item Markup
	 *
	 * => Used in hooks:
	 *
	 * @see ast_masthead_get_menu_items
	 * @see ast_masthead_custom_nav_menu_items
	 *
	 * @since 1.0.0
	 */
	function ast_masthead_get_menu_items() {

		// Get selected custom menu items.
		$markup   = '';
		$sections = ast_get_dynamic_header_content( 'header-main-rt-section' );

		if ( array_filter( $sections ) ) {
			ob_start();
			?>
			<li class="ast-masthead-custom-menu-items">
				<?php
				foreach ( $sections as $key => $value ) {
					if ( ! empty( $value ) ) {
						echo $value;
					}
				}
				?>
			</li>
			<?php
			$markup = ob_get_clean();
		}

		return apply_filters( 'ast_masthead_get_menu_items', $markup );
	}

endif;

/**
 * Header Custom Menu Item
 */
if ( ! function_exists( 'ast_masthead_custom_page_menu_items' ) ) :

	/**
	 * Header Custom Menu Item
	 *
	 * => Used in files:
	 *
	 * /header.php
	 *
	 * @since 1.0.0
	 * @param  array $args Array of arguments.
	 * @return array       Modified menu item array.
	 */
	function ast_masthead_custom_page_menu_items( $args ) {

		if ( isset( $args['theme_location'] ) ) {

			if ( 'primary' === $args['theme_location'] ) {

				$markup = ast_masthead_get_menu_items();

				if ( $markup ) {
					$args['after'] = $markup . '</ul>';
				}
			}
		}

		return $args;
	}

endif;

/**
 * Header Custom Menu Item
 */
if ( ! function_exists( 'ast_masthead_custom_nav_menu_items' ) ) :

	/**
	 * Header Custom Menu Item
	 *
	 * => Used in files:
	 *
	 * /header.php
	 *
	 * @since 1.0.0
	 * @param  array $items Nav menu item array.
	 * @param  array $args  Nav menu item arguments array.
	 * @return array       Modified menu item array.
	 */
	function ast_masthead_custom_nav_menu_items( $items, $args ) {

		if ( isset( $args->theme_location ) ) {

			if ( 'primary' === $args->theme_location ) {

				$markup = ast_masthead_get_menu_items();

				if ( $markup ) {
					$items .= $markup;
				}
			}
		}

		return $items;
	}

endif;

/**
 * Header toggle buttons
 */
if ( ! function_exists( 'ast_masthead_toggle_buttons_primary' ) ) {

	/**
	 * Header toggle buttons
	 *
	 * => Used in files:
	 *
	 * /header.php
	 *
	 * @since 1.0.0
	 */
	function ast_masthead_toggle_buttons_primary() {
		$menu_title = apply_filters( 'ast_main_menu_toggle_label', __( 'Menu', 'astra' ) );
		$menu_icon  = apply_filters( 'ast_main_menu_toggle_icon', 'menu-toggle-icon' )
		?>
		<div class="ast-button-wrap">
			<span class="screen-reader-text"><?php echo esc_html( $menu_title ); ?></span>
			<button type="button" class="menu-toggle main-header-menu-toggle" rel="main-menu" aria-controls='primary-menu' aria-expanded='false'>
				<i class="<?php echo esc_attr( $menu_icon ); ?>">
					<span class="mobile-menu"><?php echo esc_html( $menu_title ); ?></span>
				</i>
			</button>
		</div>
		<?php
	}
}

/**
 * Small Footer
 */
if ( ! function_exists( 'ast_footer_small_footer_template' ) ) {

	/**
	 * Small Footer
	 *
	 * => Used in files:
	 *
	 * /footer.php
	 *
	 * @since 1.0.0
	 */
	function ast_footer_small_footer_template() {

		$small_footer_layout = ast_get_option_meta( 'footer-sml-layout', '', 'footer-sml-layout-2' );

		if ( 'disabled' != $small_footer_layout ) {

			$small_footer_layout = str_replace( 'footer-sml-layout-', '', $small_footer_layout );

			// Default footer layout 1 is ast-footer-layout.
			if ( '1' == $small_footer_layout ) {
				$small_footer_layout = '';
			}
			get_template_part( 'template-parts/footer/footer-sml-layout', $small_footer_layout );
		}
	}
}

/**
 * Primary Header
 */
if ( ! function_exists( 'ast_masthead_primary_template' ) ) {

	/**
	 * Primary Header
	 *
	 * => Used in files:
	 *
	 * /header.php
	 *
	 * @since 1.0.0
	 */
	function ast_masthead_primary_template() {
		get_template_part( 'template-parts/header/header-main-layout' );
	}
}

/**
 * Single post markup
 */
if ( ! function_exists( 'ast_entry_content_single_template' ) ) {

	/**
	 * Single post markup
	 *
	 * => Used in files:
	 *
	 * /template-parts/content-single.php
	 *
	 * @since 1.0.0
	 */
	function ast_entry_content_single_template() {
		get_template_part( 'template-parts/single/single-layout' );
	}
}

/**
 * Blog post list markup for blog & search page
 */
if ( ! function_exists( 'ast_entry_content_blog_template' ) ) {

	/**
	 * Blog post list markup for blog & search page
	 *
	 * => Used in files:
	 *
	 * /template-parts/content-blog.php
	 * /template-parts/content-search.php
	 *
	 * @since 1.0.0
	 */
	function ast_entry_content_blog_template() {
		get_template_part( 'template-parts/blog/blog-layout' );
	}
}

/**
 * 404 markup
 */
if ( ! function_exists( 'ast_entry_content_404_page_template' ) ) {

	/**
	 * 404 markup
	 *
	 * => Used in files:
	 *
	 * /template-parts/content-404.php
	 *
	 * @since 1.0.0
	 */
	function ast_entry_content_404_page_template() {

		$layout_404 = ast_get_option( 'ast-404-layout' );
		$layout_404 = str_replace( '404-layout-', '', $layout_404 );

		// Default 404 is nothing but the 404 layout 1.
		if ( '1' == $layout_404 ) {
			$layout_404 = '';
		}

		get_template_part( 'template-parts/404/404-layout', $layout_404 );
	}
}
