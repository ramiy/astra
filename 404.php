<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Astra
 * @since 1.0.0
 */

get_header(); ?>

<?php if ( ast_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>
		
<?php endif ?>

	<div id="primary" <?php ast_primary_class(); ?>>
		<main id="main" class="site-main" role="main">

			<?php ast_entry_before(); ?>

			<section class="error-404 not-found">

				<?php ast_entry_top(); ?>

				<?php ast_entry_content_404_page(); ?>
				
				<?php ast_entry_bottom(); ?>

			</section><!-- .error-404 -->

			<?php ast_entry_after(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php if ( ast_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>
		
<?php endif ?>

<?php get_footer(); ?>
