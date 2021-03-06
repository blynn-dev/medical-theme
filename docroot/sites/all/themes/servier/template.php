<?php
/**
 * Preprocess maintenance-page.tpl.php
 */
function servier_preprocess_maintenance_page(&$vars) {
	servier_preprocess_html($vars);
}
//*/

/**
 * Preprocess html.tpl.php
 */
function servier_preprocess_html(&$vars) {
	// Add JS libraries
	$theme_path = path_to_theme();

	// https://github.com/Keyamoon/svgxuse
	// SVGxUse - polyfill for SVG <use> referencing external files
	drupal_add_js($theme_path . '/js/libraries/svgxuse.min.js', array('group' => JS_LIBRARY, 'every_page' => TRUE));
}
//*/

/**
 * Preprocess page.tpl.php
 */
function servier_preprocess_page(&$vars) {
	// Add a variable to determine whether the page is handled by Page Manager
	if (module_exists('page_manager') && page_manager_get_current_page()) {
		$vars['page_manager'] = true;
	} else {
		$vars['page_manager'] = false;
	}
}
//*/

/**
 * Preprocess node.tpl.php
 */
function servier_preprocess_node(&$vars) {
	// Remove the more link in the teaser display
	unset($vars['content']['links']['node']['#links']['node-readmore']);
}
//*/

/**
 * Render simplified menu links
 */
function servier_menu_link($vars) {
	$element = $vars['element'];
	$sub_menu = '';

	// Render the link
	$output = l($element['#title'], $element['#href'], $element['#localized_options']);

	// Render the submenu (if any)
	if ($element['#below']) {
		$sub_menu = drupal_render($element['#below']);
	}

	// Render the menu item without classes on the <li>
	return '<li>' . $output . $sub_menu . '</li>';
}
//*/

/**
 * Render main menu links
 */
function servier_menu_link__main_menu($vars) {
	$element = $vars['element'];
	$sub_menu = '';

	// Add a class to each link
	$element['#localized_options']['attributes']['class'][] = 'nav-link';

	// Render the link
	$output = l($element['#title'], $element['#href'], $element['#localized_options']);

	// Render the submenu (if any)
	if ($element['#below']) {
		$sub_menu = drupal_render($element['#below']);
	}

	// Render the menu item
	return '<li class="nav-item">' . $output . $sub_menu . '</li>';
}
//*/

/**
 * Render social menu links
 */
function servier_menu_link__menu_social($vars) {
	$element = $vars['element'];
	$sub_menu = '';

	// Sanitize the original link text
	check_plain($element['#title']);

	// Allow HTML in the link content
	$element['#localized_options']['html'] = TRUE;

	// Check if this is a recognized social media site
	if (substr($element['#href'], 0, 20) === 'https://twitter.com/') {
		// Add the SVG and wrapper to the link content
		$element['#title'] = '<span class="element-invisible">' . $element['#title'] . '</span><svg class="icon-svg icon-twitter" viewBox="0 0 252 206" height="16" width="20"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/' . path_to_theme() . '/img/icons.svg#twitter"></use></svg>';
	} else if (substr($element['#href'], 0, 25) === 'https://www.linkedin.com/') {
		// Add the SVG and wrapper to the link content
		$element['#title'] = '<span class="element-invisible">' . $element['#title'] . '</span><svg class="icon-svg icon-linkedin" viewBox="0 0 450 450" height="16" width="16"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/' . path_to_theme() . '/img/icons.svg#linkedin"></use></svg>';
	}

	// Render the link
	$output = l($element['#title'], $element['#href'], $element['#localized_options']);

	// Render the submenu (if any)
	if ($element['#below']) {
		$sub_menu = drupal_render($element['#below']);
	}

	// Render the menu item
	return '<li>' . $output . $sub_menu . '</li>';
}
//*/

/**
 * Render a field with no extra markup (can be overridden by field.tpl.php)
 */
function servier_field($vars) {
	$output = '';

	// Render the label, if it's not hidden
	if (!$vars['label_hidden']) {
		$output .= '<h2>' . $vars['label'] . '</h2>';
	}

	// Render the items
	foreach ($vars['items'] as $delta => $item) {
		$output .= drupal_render($item);
	}

	return $output;
}
//*/

/**
 * Remove the (all day) text after dates that have the all day flag
 */
function servier_date_all_day_label() {
	return '';
}
//*/

/**
 * Remove default icons from file fields
 */
function servier_file_icon($vars) {
	return '';
}
//*/

/**
 * Simplify links to file field files.
 */
function servier_file_link($vars) {
	$file = $vars['file'];
	$url = file_create_url($file->uri);

	// Set options as per anchor format described at
	// http://microformats.org/wiki/file-format-examples
	$options = array(
		'attributes' => array(
			'type' => $file->filemime . '; length=' . $file->filesize,
		),
	);

	// Use the description as the link text if available.
	if (empty($file->description)) {
		$link_text = $file->filename;
	} else {
		$link_text = $file->description;
	}

	return l($link_text, $url, $options);
}
//*/

/**
 * Remove panel separators
 */
function servier_panels_default_style_render_region($vars) {
	return implode('', $vars['panes']);
}
//*/

/**
 * Remove the default wrapper div from forms
 */
function servier_form($vars) {
	$element = $vars['element'];

	if (isset($element['#action'])) {
		$element['#attributes']['action'] = drupal_strip_dangerous_protocols($element['#action']);
	}

	element_set_attributes($element, array(
		'method',
		'id'
	));

	if (empty($element['#attributes']['accept-charset'])) {
		$element['#attributes']['accept-charset'] = 'UTF-8';
	}

	return '<form' . drupal_attributes($element['#attributes']) . '>' . $element['#children'] . '</form>';
}
//*/

/**
 * Simplify login form
 */
function servier_form_user_login_alter(&$form) {
	// Remove default field descriptions
	$form['name']['#description'] = '';
	$form['pass']['#description'] = '';
}
//*/
