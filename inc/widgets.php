<?php
/**
 * Widget and sidebars related functions
 *
 * @package     Astra
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2015, Brainstorm Force
 * @link        http://www.brainstormforce.com
 * @since       Astra 1.0.0
 */

/**
 * WordPress filter - Widget Tags
 */
if ( ! function_exists( 'ast_widget_tag_cloud_args' ) ) :

	/**
	 * WordPress filter - Widget Tags
	 *
	 * @param  array $args Tag arguments.
	 * @return array       Modified tag arguments.
	 */
	function ast_widget_tag_cloud_args( $args = array() ) {

		$sidebar_link_font_size = ast_get_option( 'font-size-body', '', 15 );

		$args['smallest'] = intval( $sidebar_link_font_size ) - 2;
		$args['largest']  = intval( $sidebar_link_font_size ) + 3;
		$args['unit']     = 'px';

		return apply_filters( 'ast_widget_tag_cloud_args', $args );
	}
	add_filter( 'widget_tag_cloud_args', 'ast_widget_tag_cloud_args', 90 );

endif;

/**
 * Wordpress filter - Widget Categories
 */
if ( ! function_exists( 'ast_filter_widget_tag_cloud' ) ) :

	/**
	 * Wordpress filter - Widget Categories
	 *
	 * @param  array $tags_data Tags data.
	 * @return array            Modified tags data.
	 */
	function ast_filter_widget_tag_cloud( $tags_data ) {

		if ( is_tag() ) {
			foreach ( $tags_data as $key => $tag ) {
				if ( get_queried_object_id() === (int) $tags_data[ $key ]['id'] ) {
					$tags_data[ $key ]['class'] = $tags_data[ $key ]['class'] . ' current-item';
				}
			}
		}

		return apply_filters( 'ast_filter_widget_tag_cloud', $tags_data );
	}
	add_filter( 'wp_generate_tag_cloud_data', 'ast_filter_widget_tag_cloud' );

endif;

/**
 * Register widget area.
 */
if ( ! function_exists( 'ast_widgets_init' ) ) :

	/**
	 * Register widget area.
	 *
	 * @see https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 */
	function ast_widgets_init() {

		register_sidebar( apply_filters( 'ast_widgets_init', array(
			'name'          => esc_html__( 'Main Sidebar', 'astra' ),
			'id'            => 'sidebar-1',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) ) );
	}
	add_action( 'widgets_init', 'ast_widgets_init' );

endif;
