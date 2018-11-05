// Run when the page is ready
jQuery(function($) {
	// JavaScript test
	$('html').removeClass('no-js').addClass('js');

	// Linearize simple data tables on small screens
	// Tables must have the following structure:
	// - a <thead> with a single row of <th> with no [colspan]s
	// - a <tbody> with at least one row and no [colspan]s (unless that cell fills its entire row)
	// - no nested <table>s or [rowspan]s
	$('table')
		.has('thead tr th')
		.has('tbody tr')
		.not(
			':has(' +
				'table,' +
				'thead td,' +
				'thead tr:not(:only-child),' +
				'thead [colspan],' +
				'[colspan]:not(:only-child),' +
				'[rowspan]' +
			')'
		)
		.each(function() {
			// Add all column headings to an array (in order)
			// If a column heading has no text, but has an input, use the value of the input instead
			var tableHeaders = [];
			$(this).find('thead th').each(function() {
				if ($(this).text().trim() == '' && $(this).has('input')) {
					tableHeaders.push($(this).find('input').val());
				} else {
					tableHeaders.push($(this).text());
				}
			});

			// For each row, loop through the cells and assign the corresponding header from the array to a data attribute
			$(this).find('tbody tr').each(function() {
				$(this).children('td, th').each(function(i) {
					$(this).attr('data-th', tableHeaders[i]);
				});
			});

			// Add a class for CSS
			$(this).addClass('table-linearize');
		});

	// Open external links in a new window
	$('a[href^="http://"],a[href^="https://"')
		.not(
			'a[href^="http://' + window.location.host + '"],' +
			'a[href^="https://' + window.location.host + '"],' +
			'a[href^="http://servier.com"],' +
			'a[href^="https://servier.com"],' +
			'a[href^="http://www.servier.com"],' +
			'a[href^="https://www.servier.com"]'
		)
		.attr('target', '_blank');

	// Open PDF links in a new window
	$(
		'a[href$=".pdf"],' +
		'a[href$=".PDF"]'
	)
		.attr('target', '_blank');

	// Add rel="noopener" to links that open a new window, for security
	$('a[target="_blank"]').attr('rel', 'noopener noreferrer');
});
