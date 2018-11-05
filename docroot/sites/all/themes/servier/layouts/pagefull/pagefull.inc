<?php
/**
 * @file
 * Implementation of hook_panels_layouts().
 */
$plugin = array(
	'title' => t('Full-width page'),
	'category' => t('FKH: Pages'),
	'icon' => 'pagefull.png',
	'theme' => 'pagefull',
	'regions' => array(
		'main' => t('Main')
	),
);
