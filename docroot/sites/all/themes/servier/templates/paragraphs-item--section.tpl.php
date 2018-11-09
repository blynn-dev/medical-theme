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
hide($content['field_p_section_anchor']);
hide($content['field_p_section_theme']);
hide($content['field_p_section_img']);

// Generate class
$sectionClass = drupal_html_class('theme-' . trim(strip_tags(render($content['field_p_section_theme']))));

// Generate ID if needed
$sectionID = trim(strip_tags(render($content['field_p_section_anchor'])));
if ($sectionID != '') {
	$sectionID = ' id="' . drupal_html_id($sectionID) . '"';
}

// Render the image URL as a background style
// Also add a class so sections with background images can be styled differently if needed
$sectionBg = trim(strip_tags(render($content['field_p_section_img'])));
if ($sectionBg != '') {
	$sectionBg = ' style="background-image:url(' . "'" . $sectionBg . "'" . ')"';
	$sectionClass .= ' section-bg';
}

?><div class="section <?php print $sectionClass; ?>"<?php print $sectionBg; print $sectionID; ?>><?php
	?><div class="shell"><?php
		print render($content);
	?></div><?php
?></div><?php
