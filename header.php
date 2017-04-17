<?php
/**
 * The header for Astra Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

?><!DOCTYPE html>
<?php ast_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
<?php ast_head_top(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php ast_head_bottom(); ?>
<?php wp_head(); ?>
</head>

<body <?php ast_schema_body(); ?> <?php body_class(); ?>>

<?php ast_body_top(); ?>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php ast_default_strings( 'string-header-skip-link' ); ?></a>
	
	<?php ast_header_before(); ?>

	<?php ast_header(); ?>
	
	<?php ast_header_after(); ?>

	<?php ast_content_before(); ?>

	<div id="content" class="site-content">

		<div class="ast-container">

		<?php ast_content_top(); ?>
