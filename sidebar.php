<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

$sidebar = apply_filters( 'ast_get_sidebar', 'sidebar-1' );

?>

<div itemtype="http://schema.org/WPSideBar" itemscope="itemscope" id="secondary" <?php ast_secondary_class(); ?> role="complementary">

	<div class="sidebar-main">

		<?php ast_sidebars_before(); ?>
		
		<?php if ( is_active_sidebar( $sidebar ) ) : ?>

			<?php dynamic_sidebar( $sidebar ); ?>

		<?php endif; ?>
		
		<?php ast_sidebars_after(); ?>

	</div><!-- .sidebar-main -->
</div><!-- #secondary -->
