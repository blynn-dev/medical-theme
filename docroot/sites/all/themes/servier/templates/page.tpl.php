<?php
/**
 * @file
 * A single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['content']: The main content of the current page.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */

// Global header
?><header class="page-header fixed-top" id="header"><div class="shell"><?php
	// Logo opening tag
	if ($is_front) { ?><h1 class="logo"><?php } else { ?><div class="logo"><?php }
		// Logo SVG
		?><a href="<?php print $front_page; ?>" rel="home"><img src="/<?php print path_to_theme(); ?>/img/logo.svg" alt="<?php print $site_name; if ($site_name && $site_slogan) { print ', '; } print $site_slogan; ?>" height="335" width="133" /></a><?php
	// Logo closing tag
	if (!$is_front) { ?></div><?php } else { ?></h1><?php }

	// Mobile menu control
	?><button class="bg-mobile-button navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button><?php

	// Render the header region
	?><nav id="nav"><?php
		print render($page['header']);
	?></nav><?php
?></div></header><?php

// Drupal messages and editor links
$renderedTabs = trim(render($tabs));
if ($messages || $renderedTabs || $action_links) {
	?><div class="page-toolbox"><div class="shell"><?php
		print $messages;
		print $renderedTabs;
		if ($action_links) {
			?><ul class="action-links"><?php
				print render($action_links);
			?></ul><?php
		}
	?></div></div><?php
}

// Main content area
?><main class="page-main" id="main"><?php
	if ($page_manager) {
		// If Page Manager is handling the page, no extra markup is needed here
		print render($page['content']);
	} else {
		// If Page Manager isn't handling the page, display the page title and main content with simple markup
		?><div class="shell"><?php
			print render($title_prefix);
			print render($title_suffix);
			if ($title) {
				?><h1><?php print $title; ?></h1><?php
			}
			print render($page['content']);
		?></div><?php
	}
?></main><?php

// Global footer
?><footer class="page-footer"><div class="shell"><?php
	// Add the Servier logo
	?><div class="footer-logo"><a href="https://servier.com/"><span class="element-invisible">Servier</span><svg class="icon-svg icon-logo-servier" viewBox="0 0 335 112" height="168" width="56"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/<?php print path_to_theme(); ?>/img/icons.svg#logo-servier"></use></svg></a></div><?php

	// Render the main footer region
	print render($page['footer']);
?></div></footer><?php
