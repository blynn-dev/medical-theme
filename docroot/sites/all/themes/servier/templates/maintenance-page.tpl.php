<?php
/**
 * @file
 * A single Drupal page while in maintenance mode.
 *
 * All the available variables are mirrored in html.tpl.php and page.tpl.php.
 * Some may be blank but they are provided for consistency.
 *
 * @see template_preprocess()
 * @see template_preprocess_maintenance_page()
 *
 * @ingroup themeable
 */
?><!DOCTYPE html>
<html lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>" class="no-js">
<head>
<meta http-equiv="x-ua-compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<?php print $head; ?>
<title><?php print $head_title; ?></title>
<?php print $styles; ?>
<?php print $scripts; ?>
</head>
<body class="<?php print $classes; ?>"><?php
	?><div id="top"><a href="#main" class="skipnav"><?php print t('Skip to main content'); ?></a></div><?php

	// Global header
	?><header class="page-header" id="header"><div class="shell"><?php
		// Render the header region
		if (!empty($header)) {
			print $header;
		}
	?></div></header><?php

	// Main content area
	?><main class="page-main" id="main"><div class="shell"><?php
		if (!empty($title)) {
			?><h1><?php print $title; ?></h1><?php
		}
		if (!empty($content)) {
			print $content;
		}
	?></div></main><?php

	// Global footer
	?><footer class="page-footer"><div class="shell"><?php
		// Render the main footer region
		if (!empty($footer)) {
			print $footer;
		}
	?></div></footer><?php
?></body>
</html>
