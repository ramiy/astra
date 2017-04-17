<?php
/**
 * Template for 404
 *
 * @package     Astra
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2015, Brainstorm Force
 * @link        http://www.brainstormforce.com
 * @since       Astra 1.0.0
 */

?>
<div class="ast-404-layout-1">
	
	<?php ast_the_title( '<header class="page-header"><h1 class="page-title">', '</h1></header><!-- .page-header -->' ); ?>
	
	<div class="page-content">
		
		<div class="page-sub-title">
			<?php ast_default_strings( 'string-404-sub-title' ); ?>
		</div>
		
		<div class="ast-404-search">
			<?php the_widget( 'WP_Widget_Search' ); ?>
		</div>

	</div><!-- .page-content -->
</div>
