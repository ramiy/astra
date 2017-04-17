<?php
/**
 * Sidebar Manager functions
 *
 * @package     Astra
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2015, Brainstorm Force
 * @link        http://www.brainstormforce.com
 * @since       Astra 1.0.0
 */

/**
 * Site Sidebar
 */
if ( ! function_exists( 'ast_page_layout' ) ) {

	/**
	 * Site Sidebar
	 *
	 * Default 'right sidebar' for overall site.
	 */
	function ast_page_layout() {

		if ( 'page-builder' == ast_get_content_layout() ) {
			$layout = 'no-sidebar';
		} elseif ( is_singular() ) {

			// If post meta value is empty,
			// Then get the POST_TYPE sidebar.
			$layout = ast_get_option_meta( 'site-sidebar-layout', '', '', true );

			if ( empty( $layout ) ) {

				$layout = ast_get_option( 'single-' . get_post_type() . '-sidebar-layout' );

				if ( 'default' == $layout || empty( $layout ) ) {

					// Get the GLOBAL sidebar value.
					// NOTE: Here not used `true` in the below function call.
					$layout = ast_get_option( 'site-sidebar-layout' );
				}
			}
		} else {

			if ( is_search() ) {

				$layout = ast_get_option( 'archive-post-sidebar-layout' );

			} else {

				$layout = ast_get_option( 'archive-' . get_post_type() . '-sidebar-layout' );

				if ( 'default' == $layout || empty( $layout ) ) {

					// Get the GLOBAL sidebar value.
					// NOTE: Here not used `true` in the below function call.
					$layout = ast_get_option( 'site-sidebar-layout' );
				}// End if().
			}
		}// End if().

		return apply_filters( 'ast_page_layout', $layout );
	}
}// End if().
