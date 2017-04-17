<?php
/**
 * Ast Nav Menu Walker Class.
 *
 * @package     Astra
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2015, Brainstorm Force
 * @link        http://www.brainstormforce.com
 * @since       Astra 1.0.0
 */

/**
 * Ast_Nav_Menu_Walker extends Walker_Nav_Menu
 */
if ( ! class_exists( 'Ast_Nav_Menu_Walker' ) && class_exists( 'Walker_Nav_Menu' ) ) :

	/**
	 * Ast_Nav_Menu_Walker extends Walker_Nav_Menu
	 */
	class Ast_Nav_Menu_Walker extends Walker_Nav_Menu {

		/**
		 * Top Level Item Count
		 *
		 * @var integer
		 */
		private $top_level_item_count = 0;

		/**
		 * Traverse elements to create list from elements.
		 *
		 * Display one element if the element doesn't have any children otherwise,
		 * display the element and its children. Will only traverse up to the max
		 * depth and no ignore elements under that depth. It is possible to set the
		 * max depth to include all depths, see walk() method.
		 *
		 * This method should not be called directly, use the walk() method instead.
		 *
		 * @since 1.0.0
		 *
		 * @param object $element           Data object.
		 * @param array  $children_elements List of elements to continue traversing.
		 * @param int    $max_depth         Max depth to traverse.
		 * @param int    $depth             Depth of current element.
		 * @param array  $args              An array of arguments.
		 * @param string $output            Passed by reference. Used to append additional content.
		 */
		function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
			$id_field = $this->db_fields['id'];

			if ( is_object( $args[0] ) ) {
				$args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
			}

			return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
		}

		/**
		 * Start the element output.
		 *
		 * @see Walker_Nav_Menu::start_el()
		 *
		 * @since 1.0.0
		 *
		 * @global int $_nav_menu_placeholder
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param object $item   Menu item data object.
		 * @param int    $depth  Depth of menu item. Used for padding.
		 * @param array  $args   Not used.
		 * @param int    $id     Not used.
		 */
		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

			global $wp_query;
			$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent.

		  	if ( $args->has_children ) {
				$css_class[] = 'menu-item-has-children';
				$args->after = '<button role="button" class="ast-menu-toggle" aria-expanded="false"></button>';
			}

			// passed classes.
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

			// build html.
			$output .= $indent . '<li id="menu-item-' . esc_attr( $item->ID ) . '" class="' . $class_names . ' menu-item-' . esc_attr( $item->ID ) . '">';

			// link attributes.
			$attributes  = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
			$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target ) . '"' : '';
			$attributes .= ! empty( $item->xfn )        ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
			$attributes .= ! empty( $item->url )        ? ' href="' . esc_attr( $item->url ) . '"' : '';
			$attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

			$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
				$args->before,
				$attributes,
				$args->link_before,
				apply_filters( 'the_title', $item->title, $item->ID ),
				$args->link_after,
				$args->after
			);

			// build html.
			$output .= apply_filters( 'ast_walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}

		/**
		 * Ends the element output, if needed.
		 *
		 * @since 1.0.0
		 *
		 * @see Walker::end_el()
		 *
		 * @param string   $output Passed by reference. Used to append additional content.
		 * @param WP_Post  $item   Page data object. Not used.
		 * @param int      $depth  Depth of page. Not Used.
		 * @param stdClass $args   An object of wp_nav_menu() arguments.
		 */
		function end_el( &$output, $item, $depth = 0, $args = array() ) {

			$output .= "</li>\n";

			/**
			 * Add logo in the middle of navigation
			 *
			 * If current menu is a top level menu [and] It is equal to our menu middle point.
			 */
			if ( isset( $item->menu_item_parent ) ) {
				if ( '0' === $item->menu_item_parent ) {
					$this->top_level_item_count++;

					$output .= apply_filters( 'ast_nav_menu_el_after_' . $args->menu_id, '', $this->top_level_item_count );
				}
			}
		}
	}

endif;
