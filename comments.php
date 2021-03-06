<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	
	<?php ast_comments_before(); ?>

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<div class="comments-count-wrapper">
			<h3 class="comments-title">
				<?php
					printf( // WPCS: XSS OK.
						/* translators: 1: number of comments */
						esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'astra' ) ),
					number_format_i18n( get_comments_number() ), get_the_title() );
				?>
			</h3>
		</div>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation" aria-label="<?php esc_html_e( 'Comments Navigation', 'astra' ); ?>">
			<h3 class="screen-reader-text"><?php ast_default_strings( 'string-comment-navigation-next' ); ?></h3>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( ast_default_strings( 'string-comment-navigation-previous', false ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( ast_default_strings( 'string-comment-navigation-next', false ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="ast-comment-list">
			<?php wp_list_comments( array(
				'callback' => 'ast_theme_comment',
				'style' => 'ol',
			) ); ?>
		</ol><!-- .ast-comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation" aria-label="<?php esc_html_e( 'Comments Navigation', 'astra' ); ?>">
			<h3 class="screen-reader-text"><?php ast_default_strings( 'string-comment-navigation-next' ); ?></h3>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( ast_default_strings( 'string-comment-navigation-previous', false ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( ast_default_strings( 'string-comment-navigation-next', false ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php ast_default_strings( 'string-comment-closed' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>

	<?php ast_comments_after(); ?>

</div><!-- #comments -->
