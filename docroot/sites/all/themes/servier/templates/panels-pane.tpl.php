<?php
/**
 * @file
 * Panel pane template.
 *
 * Variables available:
 * - $pane->type: the content type inside this pane
 * - $pane->subtype: The subtype, if applicable. If a view it will be the
 *   view name; if a node it will be the nid, etc.
 * - $title: The title of the content
 * - $content: The actual content
 * - $links: Any links associated with the content
 * - $more: An optional 'more' link (destination only)
 * - $admin_links: Administrative links associated with the content
 * - $feeds: Any feed icons or associated with the content
 * - $display: The complete panels display object containing all kinds of
 *   data including the contexts and all of the other panes being displayed.
 */

// Opening markup
if ($pane_prefix) {
	print $pane_prefix;
}
?><div class="<?php print $classes; ?>" <?php print $id; ?>><?php
	if ($admin_links) {
		print $admin_links;
	}
	print render($title_prefix);
	print render($title_suffix);

	// Render the title
	if ($title) {
		if (isset($title_heading) && $title_heading) {
			// The heading tag may be set on the pane configuration
			print '<' . $title_heading . '>' . $title . '</' . $title_heading . '>';
		} elseif (($pane->type == 'node_content' && $pane->configuration['build_mode'] == 'full') || $pane->type == 'page_title') {
			// If the heading tag isn't set, and this is a node title
			print '<h1>' . $title . '</h1>';
		} else {
			// If the heading tag isn't set, and this isn't a node title
			print '<h2>' . $title . '</h2>';
		}
	}

	// Main content
	print render($content);

	// Additional links
	if ($links) {
		print $links;
	}
	if ($more) {
		print $more;
	}

// Closing markup
?></div><?php
if ($pane_suffix) {
	print $pane_suffix;
}
