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
// Hide the fields to render them separately
hide($content['field_p_image']);
hide($content['field_p_image_link']);

// Render the image and check if it has alt text
$img = render($content['field_p_image']);
$imgHasAlt = (isset($field_p_image) && isset($field_p_image[0]) && $field_p_image[0]['alt'] && trim(strip_tags($field_p_image[0]['alt'])) != '' ? TRUE : FALSE);

// Render the optional link URL
$imgLink = trim(strip_tags(render($content['field_p_image_link'])));

// Link the image if it has alt text and a link URL is included
if ($imgHasAlt && $imgLink != '') {
	$img = l($img, $imgLink, array('html' => TRUE, 'attributes' => array('class' => 'img-link')));
}

// Print the rendered image
?><div class="align-center"><?php
	print $img;
?></div><?php
