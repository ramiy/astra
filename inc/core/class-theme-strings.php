<?php
/**
 * Astra Theme Strings
 *
 * @package     Astra
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2015, Brainstorm Force
 * @link        http://www.brainstormforce.com
 * @since       Astra 1.0.0
 */

/**
 * Default Strings
 */
if ( ! function_exists( 'ast_default_strings' ) ) {

	/**
	 * Default Strings
	 *
	 * @since 1.0.0
	 * @param  string  $key  String key.
	 * @param  boolean $echo Print string.
	 * @return mixed        Return string or nothing.
	 */
	function ast_default_strings( $key, $echo = true ) {

		$defaults = apply_filters( 'ast_default_strings', array(

			// Header.
			'string-header-skip-link' 				 => esc_html__( 'Skip to content', 'astra' ),

			// 404 Page Strings.
			'string-404-sub-title'                   => esc_html__( 'It looks like the link pointing here was faulty. May be try searching?', 'astra' ),

			// Search Page Strings.
			'string-search-nothing-found'            => esc_html__( 'Nothing Found', 'astra' ),
			'string-search-nothing-found-message'    => esc_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'astra' ),
			'string-full-width-search-message'       => esc_html__( 'Start typing and press enter to search', 'astra' ),
			'string-full-width-search-placeholder'   => esc_html__( 'Start Typing...', 'astra' ),
			'string-header-cover-search-placeholder' => esc_html__( 'Start Typing...', 'astra' ),
			'string-search-input-placeholder'        => esc_html__( 'Search ...', 'astra' ),

			// Comment Template Strings.
			'string-comment-reply-link'              => esc_html__( 'Reply', 'astra' ),
			'string-comment-edit-link'               => esc_html__( 'Edit', 'astra' ),
			'string-comment-awaiting-moderation'     => esc_html__( 'Your comment is awaiting moderation.', 'astra' ),
			'string-comment-title-reply'             => esc_html__( 'Leave a Comment', 'astra' ),
			'string-comment-cancel-reply-link'       => esc_html__( 'Cancel Reply', 'astra' ),
			'string-comment-label-submit'            => esc_html__( 'Post Comment &raquo;', 'astra' ),
			'string-comment-label-message'           => esc_html__( 'Type here..', 'astra' ),
			'string-comment-label-name'              => esc_html__( 'Name*', 'astra' ),
			'string-comment-label-email'             => esc_html__( 'Email*', 'astra' ),
			'string-comment-label-website'           => esc_html__( 'Website', 'astra' ),
			'string-comment-closed'                  => esc_html__( 'Comments are closed.', 'astra' ),
			'string-comment-navigation-title'        => esc_html__( 'Comment navigation', 'astra' ),
			'string-comment-navigation-next'         => esc_html__( 'Newer Comments', 'astra' ),
			'string-comment-navigation-previous'     => esc_html__( 'Older Comments', 'astra' ),

			// Blog Default Strings.
			'string-blog-page-links-before'          => esc_html__( 'Pages:', 'astra' ),
			'string-blog-meta-author-by'             => esc_html__( 'By ', 'astra' ),
			'string-blog-meta-leave-a-comment'       => esc_html__( 'Leave a Comment', 'astra' ),
			'string-blog-meta-one-comment'           => esc_html__( '1 Comment', 'astra' ),
			'string-blog-meta-multiple-comment'      => esc_html__( '% Comments', 'astra' ),
			'string-blog-navigation-next'            => esc_html__( 'Next Page', 'astra' ) . ' <span class="ast-right-arrow">&rarr;</span>',
			'string-blog-navigation-previous'        => '<span class="ast-left-arrow">&larr;</span> ' . esc_html__( 'Previous Page', 'astra' ),

			// Single Post Default Strings.
			'string-single-page-links-before'        => esc_html__( 'Pages:', 'astra' ),
			'string-single-navigation-next'          => esc_html__( 'Next Post', 'astra' ) . ' <span class="ast-right-arrow">&rarr;</span>',
			'string-single-navigation-previous'      => '<span class="ast-left-arrow">&larr;</span> ' . esc_html__( 'Previous Post', 'astra' ),

			// Content None.
			'string-content-nothing-found-message'   => esc_html__( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'astra' ),

		), 1 );

		$output = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';

		/**
		 * Print or return
		 */
		if ( $echo ) {
			echo $output;
		} else {
			return $output;
		}
	}
}// End if().
