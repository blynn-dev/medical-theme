<?php
/**
 * @file
 * Implementation of hook_panels_layouts().
 */
$plugin = array(
	'title' => t('Max-width page'),
	'category' => t('FKH: Pages'),
	'icon' => 'pageshell.png',
	'theme' => 'pageshell',
	'regions' => array(
		'main' => t('Main')
	),
);
