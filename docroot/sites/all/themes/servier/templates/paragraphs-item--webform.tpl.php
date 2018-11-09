<?php
/**
 * @file
 * A single paragraph item.
 *
 * Available variables:
 * - $content: An array of content items. Use render($content) to print them
 *   all, or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. By default the following classes are available, where
 *   the parts enclosed by {} are replaced by the appropriate values:
 *   - entity
 *   - entity-paragraphs-item
 *   - paragraphs-item-{bundle}
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened into
 *   a string within the variable $classes.
 *
 * @see template_preprocess()
 * @see template_preprocess_entity()
 * @see template_process()
 */

// Hide fields to render separately
hide($content['field_p_webform_ref']);

// Only print the webform block if the current user has access to view the webform node
if (isset($field_p_webform_ref) && isset($field_p_webform_ref[0]) && $field_p_webform_ref[0]['access']) {
	// Get the form node ID
	$webformnid = trim(strip_tags(render($content['field_p_webform_ref'])));

	// Load the form block
	$block = block_load('webform', 'client-block-' . $webformnid);

	// If the form block is not enabled, the render array may be missing some properties
	// Add defaults for any missing properties that are required to render the block
	if (!isset($block->region)) {
		$block->region = -1;
	}
	if (!isset($block->title)) {
		$block->title = NULL;
	}
	if (!isset($block->cache)) {
		$block->cache = -1;
	}

	// Render the form block
	$renderarray = _block_get_renderable_array(_block_render_blocks(array($block)));
	$output = drupal_render($renderarray);

	if ($output) {
		// Print the rendered block, if available
		print $output;
	} else {
		// If the form has no content or couldn't render, print a div that will not display to override Drupal's fallback
		?><div class="hidden"></div><?php
	}
} else {
	// If the user doesn't have access, print a div that will not display to override Drupal's fallback
	?><div class="hidden"></div><?php
}
