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
hide($content['field_p_columns_1']);
hide($content['field_p_columns_2']);
hide($content['field_p_columns_3']);

?>
 


<div class="row foot-border">
	<?php
	?><div class="col-sm foot-border-right"><?php
		print render($content['field_p_columns_1']);
	?></div><?php
	?><div class="col-sm foot-border-right"><?php
		print render($content['field_p_columns_2']);
	?></div><?php
	?><div class="col-sm"><?php
		print render($content['field_p_columns_3']);
	?></div><?php
?>
</div> 

<?php
 