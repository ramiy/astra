<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

?>
			<?php ast_content_bottom(); ?>

			</div> <!-- ast-container -->

		</div><!-- #content -->

		<?php ast_content_after(); ?>

		<?php ast_footer_before(); ?>

		<?php ast_footer(); ?>

		<?php ast_footer_after(); ?>

	</div><!-- #page -->

	<?php wp_footer(); ?>

	<?php ast_body_bottom(); ?>

	</body>
</html>
