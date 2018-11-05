<?php
/**
 * @file
 * Implementation of hook_panels_layouts().
 */
$plugin = array(
	'title' => t('Two region mini-panel'),
	'category' => t('FKH: Mini panels'),
	'icon' => 'mini2.png',
	'theme' => 'mini2',
	'regions' => array(
		'first' => t('First'),
		'second' => t('Second')
	),
);
