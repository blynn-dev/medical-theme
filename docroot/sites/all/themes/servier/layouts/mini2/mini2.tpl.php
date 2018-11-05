<?php
/**
 * Panel layout.
 *
 * Variables:
 * - $id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 *   panel of the layout. This layout supports the following sections:
 *   - $content['first']: Content in the first area.
 *   - $content['second']: Content in the second area.
 */
?><div class="columns"<?php if (!empty($css_id)) { print " id=\"$css_id\""; } ?>><?php
	?><div class="column"><?php
		print $content['first'];
	?></div><?php
	?><div class="column"><?php
		print $content['second'];
	?></div><?php
?></div><?php
