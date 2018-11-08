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
hide($content['field_p_banner_img']);

// Generate an ID to use for the scroll link
$bannerID = drupal_html_id('content');

?><div class="banner"><?php
	?><div class="banner-image"><?php
		print render($content['field_p_banner_img']);
	?></div><?php
	?><div class="banner-content"><div class="shell"><?php
		print render($content);

		// Print the scroll link
		?><a href="#<?php print $bannerID; ?>" class="banner-scroll"><span class="element-invisible">Next section</span><svg class="icon-svg icon-down" viewBox="0 0 32 26" height="26" width="32"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/<?php print path_to_theme(); ?>/img/icons.svg#down"></use></svg></a><?php
	?></div></div><?php
?></div><?php

// Print the (invisible) target for the scroll link
?><div id="<?php print $bannerID; ?>"></div><?php
