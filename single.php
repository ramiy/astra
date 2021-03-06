<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php if ( ast_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>
		
<?php endif ?>

<?php get_footer(); ?>
