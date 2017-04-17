<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

?>

<?php ast_entry_before(); ?>

<article itemtype="http://schema.org/CreativeWork" itemscope="itemscope" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php ast_entry_top(); ?>

	<?php ast_entry_content_single(); ?>
	
	<?php ast_entry_bottom(); ?>

</article><!-- #post-## -->

<?php ast_entry_after(); ?>
