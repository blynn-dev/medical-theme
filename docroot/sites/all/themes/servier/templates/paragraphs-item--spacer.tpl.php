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
hide($content['field_p_spacer_size']);

// Generate class if needed
$spacerClass = trim(strip_tags(render($content['field_p_spacer_size'])));
if ($spacerClass > 1) {
	$spacerClass = ' ' . drupal_html_class('spacer-' . $spacerClass);
} else {
	$spacerClass = '';
}

?><div class="spacer<?php print $spacerClass; ?>"></div><?php
