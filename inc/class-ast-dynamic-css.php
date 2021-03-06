<?php
/**
 * Custom Styling output for Astra Theme.
 *
 * @package     Astra
 * @subpackage  Class
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2015, Brainstorm Force
 * @link        http://www.brainstormforce.com
 * @since       Astra 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Dynamic CSS
 */
if ( ! class_exists( 'AST_Dynamic_CSS' ) ) {

	/**
	 * Dynamic CSS
	 */
	class AST_Dynamic_CSS {

		/**
		 * Return CSS Output
		 *
		 * @return string Generated CSS.
		 */
		static public function return_output() {

			$dynamic_css = '';

			/**
			 *
			 * Contents
			 * - Variable Declaration
			 * - Global CSS
			 * - Typography
			 * - Page Layout
			 * 	- Sidebar Positions CSS
			 *  	- Full Width Layout CSS
			 *   - Fluid Width Layout CSS
			 *   - Box Layout CSS
			 *   - Padded Layout CSS
			 * - Blog
			 * 	- Single Blog
			 * - Typography of Headings
			 * - Header
			 * - Footer
			 * 	- Main Footer CSS
			 *  	- Small Footer CSS
			 * - 404 Page
			 * - Secondary
			 * - Global CSS
			 */

			/**
			 * - Variable Declaration
			 */
			$page_width                   = '100%';
			$site_content_width           = ast_get_option( 'site-content-width' , '' , 1200 );
			$ast_header_width             = ast_get_option( 'header-main-layout-width' );

			// Site Background Color.
			$box_bg_color      = ast_get_option( 'site-layout-outside-bg-color' );

			// Color Options.
			$text_color                   = ast_get_option( 'text-color' );
			$link_color                   = ast_get_option( 'link-color' );
			$link_hover_color             = ast_get_option( 'link-h-color' );

			// Typography.
			$body_font_size               = ast_get_option( 'font-size-body', '', 15 );
			$body_line_height             = ast_get_option( 'body-line-height' );
			$body_text_transform          = ast_get_option( 'body-text-transform' );
			$site_title_font_size         = ast_get_option( 'font-size-site-title' );
			$site_tagline_font_size       = ast_get_option( 'font-size-site-tagline' );
			$single_post_title_font_size  = ast_get_option( 'font-size-entry-title' );
			$archive_post_title_font_size = ast_get_option( 'font-size-page-title' );
			$heading_h1_font_size         = ast_get_option( 'font-size-h1' );
			$heading_h2_font_size         = ast_get_option( 'font-size-h2' );
			$heading_h3_font_size         = ast_get_option( 'font-size-h3' );
			$heading_h4_font_size         = ast_get_option( 'font-size-h4' );
			$heading_h5_font_size         = ast_get_option( 'font-size-h5' );
			$heading_h6_font_size         = ast_get_option( 'font-size-h6' );

			// Button Styling.
			$btn_border_radius            = ast_get_option( 'button-radius' );
			$btn_vertical_padding         = ast_get_option( 'button-v-padding' );
			$btn_horizontal_padding       = ast_get_option( 'button-h-padding' );
			$highlight_text_color         = ast_get_foreground_color( $link_color );

			/**
			 * Apply text color depends on link color
			 */
			$btn_text_color = ast_get_option( 'button-color' );
			if ( empty( $btn_text_color ) ) {
				$btn_text_color = ast_get_foreground_color( $link_color );
			}

			/**
			 * Apply text hover color depends on link hover color
			 */
			$btn_text_hover_color = ast_get_option( 'button-h-color' );
			if ( empty( $btn_text_hover_color ) ) {
				$btn_text_hover_color = ast_get_foreground_color( $link_hover_color );
			}
			$btn_bg_color       = ast_get_option( 'button-bg-color', '', $link_color );
			$btn_bg_hover_color = ast_get_option( 'button-bg-h-color', '', $link_hover_color );

			// Spacing of Big Footer.
			$small_footer_divider_color = ast_get_option( 'footer-sml-divider-color' );
			$small_footer_divider       = ast_get_option( 'footer-sml-divider' );

			/**
			 * Small Footer Styling
			 */
			$small_footer_layout  = ast_get_option( 'footer-sml-layout', '', 'footer-sml-layout-1' );
			$ast_footer_width             = ast_get_option( 'footer-layout-width' );

			// Blog Post Title Typography Options.
			$single_post_max       = ast_get_option( 'blog-single-width' );
			$single_post_max_width = ast_get_option( 'blog-single-max-width' );
			$blog_width            = ast_get_option( 'blog-width' );
			$blog_max_width        = ast_get_option( 'blog-max-width' );

			$css_output = array();

			// Body Font Family.
			$body_font_family = ast_body_font_family();
			$body_font_weight = ast_get_option( 'body-font-weight' );

			$css_output = array(

				// HTML.
				'html' => array(
					'font-size' => ast_get_css_value( $body_font_size * 6.25, '%' ),
				),
				'a, .page-title' => array(
					'color' => $link_color,
				),
				'a:hover, a:focus' => array(
					'color' => $link_hover_color,
				),
				'body, button, input, select, textarea' => array(
					'font-family'    => $body_font_family,
					'font-weight'    => $body_font_weight,
					'font-size'      => ast_get_css_value( $body_font_size, 'rem' ),
					'line-height'    => ast_get_css_value( $body_line_height, 'dimension' ),
					'text-transform' => $body_text_transform,
				),
				'.site-title a' => array(
					'font-size' => ast_get_css_value( $site_title_font_size, 'rem' ),
				),
				'.site-header .site-description' => array(
					'font-size' => ast_get_css_value( $site_tagline_font_size, 'rem' ),
				),
				'.entry-title' => array(
					'font-size' => ast_get_css_value( $archive_post_title_font_size, 'rem' ),
				),
				'.comment-reply-title' => array(
					'font-size' => ast_get_css_value( $body_font_size * 1.66666, 'rem' ),
				),
				'.ast-comment-list #cancel-comment-reply-link' => array(
					'font-size' => ast_get_css_value( $body_font_size, 'rem' ),
				),
				'h1, .entry-content h1, .entry-content h1 a' => array(
					'font-size' => ast_get_css_value( $heading_h1_font_size, 'rem' ),
				),
				'h2, .entry-content h2, .entry-content h2 a' => array(
					'font-size' => ast_get_css_value( $heading_h2_font_size, 'rem' ),
				),
				'h3, .entry-content h3, .entry-content h3 a' => array(
					'font-size' => ast_get_css_value( $heading_h3_font_size, 'rem' ),
				),
				'h4, .entry-content h4, .entry-content h4 a' => array(
					'font-size' => ast_get_css_value( $heading_h4_font_size, 'rem' ),
				),
				'h5, .entry-content h5, .entry-content h5 a' => array(
					'font-size' => ast_get_css_value( $heading_h5_font_size, 'rem' ),
				),
				'h6, .entry-content h6, .entry-content h6 a' => array(
					'font-size' => ast_get_css_value( $heading_h6_font_size, 'rem' ),
				),
				'.ast-single-post .entry-title, .page-title' => array(
					'font-size'   => ast_get_css_value( $single_post_title_font_size, 'rem' ),
					'line-height' => '1.2',
				),
				'#secondary, #secondary button, #secondary input, #secondary select, #secondary textarea' => array(
					'font-size' => ast_get_css_value( $body_font_size, 'rem' ),
				),

				// Global CSS.
				'::selection' => array(
					'background-color' => $link_color,
					'color'            => $highlight_text_color,
				),
				'body, h1, .entry-title a, .entry-content h1, .entry-content h1 a, h2, .entry-content h2, .entry-content h2 a, h3, .entry-content h3, .entry-content h3 a, h4, .entry-content h4, .entry-content h4 a, h5, .entry-content h5, .entry-content h5 a, h6, .entry-content h6, .entry-content h6 a' => array(
					'color' => $text_color,
				),

				// Typography.
				'.tagcloud a:hover, .tagcloud a:focus, .tagcloud a.current-item' => array(
					'color'            => ast_get_foreground_color( $link_color ),
					'border-color'     => $link_color,
					'background-color' => $link_color,
				),

				// Header - Main Header CSS.
				'.main-header-menu a' => array(
					'color' => $text_color,
				),

				// Main - Menu Items.
				'.main-header-menu li:hover > a,
				 .main-header-menu .ast-masthead-custom-menu-items a:hover,
				 .main-header-menu .current-menu-item > a,
				 .main-header-menu .current-menu-ancestor > a,
				 .main-header-menu .current_page_item > a,
				 .main-header-menu .current-menu-item > .ast-menu-toggle,
				 .main-header-menu .current-menu-ancestor > .ast-menu-toggle,
				 .main-header-menu .current_page_item > .ast-menu-toggle' => array(
					'color' => $link_color,
				),

				// Input tags.
				'input:focus, input[type="text"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="password"]:focus, input[type="reset"]:focus, input[type="search"]:focus, textarea:focus' => array(
					'border-color' => $link_color,
				),
				'input[type="radio"]:checked, input[type=reset], input[type="checkbox"]:checked, input[type="checkbox"]:hover:checked, input[type="checkbox"]:focus:checked, input[type=range]::-webkit-slider-thumb' => array(
					'border-color'     => $link_color,
					'background-color' => $link_color,
					'box-shadow'       => 'none',
				),

				// Small Footer.
				'.site-footer a:hover + .post-count, .site-footer a:focus + .post-count' => array(
					'background'   => $link_color,
					'border-color' => $link_color,
				),

				// Single Post Meta.
				'.ast-comment-meta' => array(
					'line-height' => '1.666666667',
					'font-size' => ast_get_css_value( $body_font_size * 0.8571428571, 'rem' ),
				),
				'.single .nav-links .nav-previous, .single .nav-links .nav-next, .single .ast-author-details .author-title, .ast-comment-meta' => array(
					'color' => $link_color,
				),

				// Button Typography.
				'.menu-toggle, button, .ast-button, input#submit, input[type="button"], input[type="submit"], input[type="reset"]' => array(
					'border-radius'    => ast_get_css_value( $btn_border_radius, 'px' ),
					'padding'          => ast_get_css_value( $btn_vertical_padding, 'px' ) . ' ' . ast_get_css_value( $btn_horizontal_padding, 'px' ),
					'color'            => $btn_text_color,
					'border-color'     => $btn_bg_color,
					'background-color' => $btn_bg_color,
				),
				'.menu-toggle, button, .ast-button, input#submit, input[type="button"], input[type="submit"], input[type="reset"]' => array(
					'border-radius'    => ast_get_css_value( $btn_border_radius, 'px' ),
					'padding'          => ast_get_css_value( $btn_vertical_padding, 'px' ) . ' ' . ast_get_css_value( $btn_horizontal_padding, 'px' ),
					'color'            => $btn_text_color,
					'border-color'     => $btn_bg_color,
					'background-color' => $btn_bg_color,
				),
				'button:focus, .menu-toggle:hover, button:hover, .ast-button:hover, input[type=reset]:hover, input[type=reset]:focus, input#submit:hover, input#submit:focus, input[type="button"]:hover, input[type="button"]:focus, input[type="submit"]:hover, input[type="submit"]:focus' => array(
					'color'            => $btn_text_hover_color,
					'border-color'     => $btn_bg_hover_color,
					'background-color' => $btn_bg_hover_color,
				),
				'.search-submit, .search-submit:hover, .search-submit:focus' => array(
					'color'            => ast_get_foreground_color( $link_color ),
					'background-color' => $link_color,
				),

				// Blog Post Meta Typography.
				'.entry-meta, .entry-meta *' => array(
					'line-height' => '1.45',
					'color'       => $link_color,
				),
				'.entry-meta a:hover, .entry-meta a:hover *, .entry-meta a:focus, .entry-meta a:focus *' => array(
					'color'       => $link_hover_color,
				),

				// Blockquote Text Color.
				'blockquote, blockquote a' => array(
					'color' => ast_adjust_brightness( $text_color, 75, 'darken' ),
				),

				// 404 Page.
				'.ast-404-layout-1 .ast-404-text' => array(
					'font-size' => ast_get_css_value( '200', 'rem' ),
				),

				// Widget Title.
				'.widget-title' => array(
					'font-size' => ast_get_css_value( $body_font_size * 1.428571429, 'rem' ),
					'color'     => $text_color,
				),
				'#cat option, .secondary .calendar_wrap thead a, .secondary .calendar_wrap thead a:visited' => array(
			    	'color' => $link_color,
				),
				'.secondary .calendar_wrap #today, .ast-progress-val span' => array(
			    	'background' => $link_color,
				),
				'.secondary a:hover + .post-count, .secondary a:focus + .post-count' => array(
					'background'   => $link_color,
					'border-color' => $link_color,
				),
				'.calendar_wrap #today > a' => array(
			    	'color' => ast_get_foreground_color( $link_color ),
				),

				// Pagination.
				'.ast-pagination a, .page-links .page-link, .single .post-navigation a' => array(
						'color' => $link_color,
				),
				'.ast-pagination a:hover, .ast-pagination a:focus, .ast-pagination > span:hover:not(.dots), .ast-pagination > span.current, .page-links > .page-link, .page-links .page-link:hover, .post-navigation a:hover' => array(
						'color' => $link_hover_color,
				),
			);

			/* Parse CSS from array() */
			$parse_css = ast_parse_css( $css_output );

			/* Global Responsive */
			$genral_global_responsive = array(
				'.ast-container, .fl-builder #content .entry-header, .ast-container, .js_active #content .entry-header, .no-touchevents #content .entry-header' => array(
					'max-width' => $page_width,
				),
			);

			/* Width for Header */
			if ( 'content' != $ast_header_width ) {
				$genral_global_responsive = array(
					'#masthead .ast-container' => array(
						'max-width' => '100%',
						'padding-left' => '35px',
						'padding-right' => '35px',
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= ast_parse_css( $genral_global_responsive, '544' );
			}

			/* Width for Footer */
			if ( 'content' != $ast_footer_width ) {
				$genral_global_responsive = array(
					'.ast-small-footer .ast-container' => array(
						'max-width' => '100%',
						'padding-left' => '35px',
						'padding-right' => '35px',
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= ast_parse_css( $genral_global_responsive, '544' );
			}

			/* Width for Comments for Page Builder Template */
			$page_builder_comment = array(
				'.ast-page-builder-template .comments-area, .single.ast-page-builder-template .entry-header, .single.ast-page-builder-template .post-navigation' => array(
					'max-width' => ast_get_css_value( $site_content_width, 'px' ),
					'margin-left' => 'auto',
					'margin-right' => 'auto',
				),
			);

			/* Parse CSS from array()*/
			$parse_css .= ast_parse_css( $page_builder_comment, '544' );

			$separate_container_css = array(
				'body, .ast-separate-container' => array(
					'background-color' => $box_bg_color,
				),
			);
			$parse_css .= ast_parse_css( $separate_container_css );

			/* Site width Responsive */
			$site_width = array(
				'.ast-container' => array(
					'max-width' => ast_get_css_value( $site_content_width, 'px' ),
				),
			);

			/* Responsive Typography */
			if ( apply_filters( 'ast_responsive_typography_enabled', true ) ) {
				$responsive_typography = array(
				'html' => array(
						'font-size' => ast_get_css_value( $body_font_size * 5.7, '%' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= ast_parse_css( $responsive_typography, '' ,'768' );
			}

			/* Parse CSS from array()*/
			$parse_css .= ast_parse_css( $site_width, '768' );

			/* Blog */
			if ( 'custom' === $blog_width ) :
				$blog_css  = '@media (min-width:920px) {';
					$blog_css .= '.blog .site-content > .ast-container, .archive .site-content > .ast-container, .search .site-content > .ast-container{';
						$blog_css .= 'max-width:' . $blog_max_width . 'px;';
					$blog_css .= '}';
				$blog_css .= '}';
				$parse_css .= $blog_css;
			endif;

			/* Single Blog */
			if ( 'custom' === $single_post_max ) :
					$single_blog_css = '@media (min-width:920px) {';
					$single_blog_css .= '.single .site-content > .ast-container{';
					$single_blog_css .= 'max-width:' . $single_post_max_width . 'px;';
					$single_blog_css .= '}';
					$single_blog_css .= '}';
					$parse_css       .= $single_blog_css;
			endif;

			/* Small Footer CSS */
			if ( 'disabled' != $small_footer_layout ) :
				$sml_footer_css = '.ast-small-footer {';
					$sml_footer_css .= 'border-top-style:solid;';
					$sml_footer_css .= 'border-top-width:' . $small_footer_divider . 'px;';
					$sml_footer_css .= 'border-top-color:' . $small_footer_divider_color;
				$sml_footer_css .= '}';
				if ( 'footer-sml-layout-2' != $small_footer_layout ) {
					$sml_footer_css .= '.ast-small-footer-wrap{';
						$sml_footer_css .= 'text-align: center;';
					$sml_footer_css .= '}';
				}
				$parse_css .= $sml_footer_css;
			endif;

			/* 404 Page */
			$parse_css .= ast_parse_css(
				array(
					'.ast-404-layout-1 .ast-404-text' => array(
						'font-size'   => ast_get_css_value( 100, 'rem' ),
					),
				), '', '919'
			);

			$dynamic_css = apply_filters( 'ast_dynamic_css', $parse_css );
			$custom_css  = ast_get_option( 'custom-css' );

			if ( '' != $custom_css ) {
				$dynamic_css .= $custom_css;
			}

			// trim white space for faster page loading.
			$dynamic_css = AST_Enqueue_Scripts::trim_css( $dynamic_css );

			return $dynamic_css;
		}

		/**
		 * Return post meta CSS
		 *
		 * @param  boolean $return_css Return the CSS.
		 * @return mixed              Return on print the CSS.
		 */
		static public function return_meta_output( $return_css = false ) {

			/**
			 * - Page Layout
			 *
			 * 	- Sidebar Positions CSS
			 */
			$secondary_width        = ast_get_option( 'site-sidebar-width' );
			$primary_width          = absint( 100 - $secondary_width );
			$meta_style             = '';

			// Header Separator.
			$header_separator       = ast_get_option( 'header-main-sep' );
			$header_separator_color = ast_get_option( 'header-main-sep-color' );

			$meta_style .= '.ast-header-break-point .site-header {';
			$meta_style .= 'border-bottom-width:' . ast_get_css_value( $header_separator, 'px' ) . ';';
			$meta_style .= 'border-bottom-color:' . $header_separator_color . ';';
			$meta_style .= '}';
			$meta_style .= '@media (min-width: 768px) {';
			$meta_style .= '.main-header-bar {';
			$meta_style .= 'border-bottom-width:' . ast_get_css_value( $header_separator, 'px' ) . ';';
			$meta_style .= 'border-bottom-color:' . $header_separator_color . ';';
			$meta_style .= '}';
			$meta_style .= '}';

			if ( 'no-sidebar' !== ast_page_layout() ) :
				$meta_style .= '@media (min-width: 768px) {';
				$meta_style .= '#primary {';
				$meta_style .= 'width:' . $primary_width . '%;';
				$meta_style .= '}';
				$meta_style .= '#secondary {';
				$meta_style .= 'width:' . $secondary_width . '%;';
				$meta_style .= '}';
				$meta_style .= '}';
			endif;

			if ( false != $return_css ) {
				return $meta_style;
			}

			wp_add_inline_style( 'ast-theme-css', $meta_style );
		}
	}
}// End if().
