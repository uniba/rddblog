// Splits a single list into a number of lists, which can be styled into a multicolumn list.
//
// usage $("#my_list_id").columns(n);
// - Splits the list with id "my_list_id" into n columns.
//
// The lists will be nested inside an unordered list whose id is the same as the original list's.
// Note that the original list will be deleted.
//
// Parameters:
// numberOfColumns: the number of columns to split the list into.
// padIncompleteColumns: If set to true, and the source list does not contain enough items to 
//                       completely fill the last column, the plugin will pad that column with
//                       <li>&nbsp;</li>.
//
jQuery.fn.columns = function(numberOfColumns, padIncompleteColumns) {
	return this.each(function () {
		var $this = jQuery(this);
		
		var targetId = $this.attr("id");
		$this.attr("id", targetId + "_src");

		var container = "<ul id=\"" + targetId + "\"></ul>";

		$this.after(container);
		target = $this.next();

		// Create some sublists in the new list. We'll need as many as we have columns.
		createSubLists(target, numberOfColumns);

		// Move the contents of the old list into the new ones.
		splitList(jQuery("li", $this), jQuery("ul", target), numberOfColumns, padIncompleteColumns);

		// Apply styles to alternating columns.
		applyStyle(jQuery("ul", target), "even", "odd");

		// Remove the old list from the DOM.
		$this.remove();
	});

	function createSubLists(container, numberOfSublists) {
		for (i = 0; i < numberOfSublists; i++)
			container.append("<ul></ul>");
	}

	
	function splitList(source, target, numberOfColumns, padIncompleteColumns) {
		column = 0;
		counter = 0;

		// Determine how many items we need to stuff in each column to reach the full number.
		itemsPerColumn = Math.ceil(source.length / numberOfColumns);

		source.each(function (i) {
			// Select the columns and put the list item in the current one.
			target[column].appendChild(this);
			counter++;
	
			if (counter == itemsPerColumn) {
				// We've filled one column, move to the next.
				column ++;
				counter = 0;
			}
		});

		// If we can't fill up the columns, add more items.
		if (counter != 0 && padIncompleteColumns)
			while (counter < itemsPerColumn) {
				jQuery(target[column]).append("<li>&nbsp;</li>");
				counter++;
			}
	}
		
	// Applies the even style to even numbered columns, and the odd style to odd numbered columns.
	function applyStyle(columns, even, odd) {
		columns.each(function (i) {
			// We're using i+1 because the index is 0 based, so the 1st column is 0, etc.
			// If we don't do this, then the odd/even columns would be inverted (eg. column index 2 is actually the third visible column).
			jQuery(this).addClass(((i+1) % 2) == 0
				? even
				: odd);
		});
	}
}

