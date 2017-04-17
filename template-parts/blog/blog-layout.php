<?php
/**
 * Template for Blog
 *
 * @package     Astra
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2015, Brainstorm Force
 * @link        http://www.brainstormforce.com
 * @since       Astra 1.0.0
 */

?>
<div <?php ast_blog_layout_class( 'blog-layout-1' ); ?>>

	<div class="ast-blog-featured-section post-thumb ast-col-md-12">
		<?php ast_blog_post_featured_format(); ?>
	</div><!-- .post-thumb -->

	<div class="post-content ast-col-md-12">
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			
			<?php ast_blog_get_post_meta( array( 'date', 'link' ) ); ?>
		</header><!-- .entry-header -->

		<div class="entry-content clear" itemprop="text">

			<?php ast_entry_content_before(); ?>

			<?php ast_the_excerpt(); ?>

			<?php ast_entry_content_after(); ?>

			<?php
				wp_link_pages( array(
					'before'      => '<div class="page-links">' . ast_default_strings( 'string-blog-page-links-before', false ),
					'after'       => '</div>',
					'link_before' => '<span class="page-link">',
					'link_after'  => '</span>',
				) );
			?>
		</div><!-- .entry-content .clear -->

		<footer class="entry-footer">
			
		</footer><!-- .entry-footer -->
	</div><!-- .post-content -->

</div> <!-- .blog-layout-1 -->
