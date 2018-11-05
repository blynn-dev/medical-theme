<?php
/**
 * @file
 * Implementation of hook_panels_layouts().
 */
$plugin = array(
	'title' => t('Single region mini-panel'),
	'category' => t('FKH: Mini panels'),
	'icon' => 'mini.png',
	'theme' => 'mini',
	'regions' => array(
		'main' => t('Main')
	),
);
