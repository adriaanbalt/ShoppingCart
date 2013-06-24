/**
 * Dropdown
 * @author Brian Fegan
 * 
 * @methods
 * Initialize the plugin:
 * $('.dropdown').dropdown();
 *
 * @html:
 * <select>
 *  <option value="1">Option #1</option>
 *  <option value="2">Option #2</option>
 * 	<option value="3">Option #3</option>
 * 	<option value="4" selected="selected">Option #4</option>
 * 	<option value="5" disabled="disabled">Option #5</option>
 * </select>
 * 
 * @css:
 * 
 */
/*global window, document, jQuery */
(function ($) {
	
	var oDefaults = {
			strClassName		: 'dropdown',	// the className of the replacement element 
			strExtraClassName	: null,			// an extra className to distinguish between different dropdowns
			strDefaultLabel		: '',			// if supplied, will replace first option when plugin first loads
			strPosition			: 'auto',		// dropdown positioned 'above' or 'below' label; 'auto' places in either position based on availability
			intWidth			: null,			// the width of the dropdown replacement
			fnBlur				: null,			// callback to trigger when dropdown replacement blurs
			fnClose				: null,			// callback to trigger when dropdown replacement closes
			fnFocus				: null,			// callback to trigger when dropdown replacement focuses
			fnOpen				: null			// callback to trigger when dropdown replacement opens
		},
		$window	= $(window),
		$html = $('html'),
		methods = {}, // contains publicly accessibly methods;

		/* Private methods */
		
		/**
		 * Builds the dropdown replacement markup
		 * 
		 * @param oDropdown {Object} object we are currently working with
		 */
		buildDropdownMarkup = function(oDropdown) {
			
			var i,
				j,
				$optgroup,
				$optgroupItem,
				$optgroupList,
				$options,
				$option;
			
			// build out the markup for the replacement dropdown
			oDropdown.$dropdown			= $('<div />').addClass(oDropdown.strClassName).css({'visibility':'hidden'});
			oDropdown.$arrow			= $('<div />').addClass('dropdown-arrow').css('display','none').appendTo(oDropdown.$dropdown);
			oDropdown.$label			= $('<div />').addClass('dropdown-label').css('display','none').appendTo(oDropdown.$dropdown).html('<span></span>').find('span');
			oDropdown.$listContainer	= $('<div />').addClass('dropdown-list-container').css({'display':'none','position':'absolute'}).html('<div class="dropdown-list-wrapper"></div>').appendTo(oDropdown.$dropdown);
			oDropdown.$listWrapper		= oDropdown.$listContainer.children();
			oDropdown.$list				= $('<ul />').css('list-style','none').appendTo(oDropdown.$listWrapper);
			
			// add extra class if it exists
			if (oDropdown.strExtraClassName) {
				oDropdown.$dropdown.addClass(oDropdown.strExtraClassName);
			}
			
			// if this select uses optgroups
			if (oDropdown.$optgroups.length) {
				
				// loop through the optgroups
				for (i=0; i<oDropdown.$optgroups.length; i++) {
					
					// get the current optgroup and its child options
					$optgroup	= oDropdown.$optgroups.eq(i);
					$options	= oDropdown.$optgroups.eq(i).find('option');
					
					// create a replacment list item for the optgroup
					$optgroupItem = $('<li />').addClass('optgroup').html('<div class="optgroup"><span>' + $optgroup.attr('label') + '</span></div><ul></ul>');
					
					$optgroupList = $optgroupItem.find('ul');
					
					// loop through its child options and add them
					for (j=0; j<$options.length; j++) {
						
						// get the current option
						$option = $options.eq(j);
						
						// if this option is disabled, add the disabled class
						if ($option.attr('disabled')) {
							$optgroupList.append('<li class="disabled"><div><span>' + $option.text() + '</span></div></li>');	
						} else {
							$optgroupList.append('<li><div><span>' + $option.text() + '</span></div></li>');
						}
						
					}
					
					// append this optgroup replacement to the parent list
					oDropdown.$list.append($optgroupItem);
					
				}
				
			}
			
			// there are no optgroups, just append options to the parent list
			else {
			
				// Add options to new list element
				for (i=0; i<oDropdown.$options.length; i++) {
					
					// get the current option
					$option	= oDropdown.$options.eq(i);
					
					// if this option is disabled, add the disabled class
					if ($option.attr('disabled')) {
						oDropdown.$list.append('<li class="disabled" data-option-value="' + $option.attr('value') + '"><div><span>' + $option.text() + '</span></div></li>');	
					} else {
						oDropdown.$list.append('<li data-option-value="' + $option.attr('value') + '"><div><span>' + $option.text() + '</span></div></li>');
					}
					
				}
				
			}
			
			// save the list items representing the options
			oDropdown.$items = oDropdown.$list.find('li').not('.optgroup');
			
			// add helper classes for easier CSS styling
			oDropdown.$list.children().first().addClass('first');
			oDropdown.$list.children().last().addClass('last');
			
		},
	
		/**
		 * This method is used when there is no set width passed in to the plugin AND
		 * there is no width set in the css for the dropdown replacement.
		 * When those conditions are met we loop through the options to find the widest, which
		 * is not always the option with the most characters
		 * 
		 * @param oDropdown {Object} the data for this dropdown
		 */
		getWidestOptionText = function(oDropdown) {
			var $div			= $('<div />').css({'position':'absolute','left':'-9999px'}).appendTo('body'), 
				$options		= oDropdown.$options,
				intOptionsLen	= $options.length,
				intWidest		= 0,
				strWidest,
				intWidth,
				strText,
				i;
			// loop through these to find the widest text
			for (i=0; i<=intOptionsLen; i++) {
				strText = (i < intOptionsLen) ? $options.eq(i).html() : oDropdown.strDefaultLabel; 
				intWidth = $div.html(strText).width();
				if (intWidth > intWidest) {
					intWidest = intWidth;
					strWidest = strText; 
				}
			}
			// remove this from the DOM and return the widest text
			$div.remove();
			return strWidest;	
		},
	
		/**
		 * Set the dropdown replacement's width, label, selected item and oDropdown.strValue
		 * 
		 * @param oDropdown {Object} object we are currently working with
		 */
		setDropdownProperties = function(oDropdown) {
			
			var	$selectedOption		= oDropdown.$select.find(':selected'),
				intSelectedIndex	= oDropdown.$options.index($selectedOption),
				intDropdownWidth,
				strTempPosition;
			
			// to accurately measure width of the dropdown, set dropdown position to absolute
			// so it does not inherit width from its ancestor if position is relative and not floated
			strTempPosition = (oDropdown.$dropdown.css('position').toLowerCase() === 'absolute') ? 'absolute' : 'relative';
			oDropdown.$dropdown.css('position','absolute');
			
			// get the css width of the dropdown, might be 0 or auto
			intDropdownWidth = parseInt(oDropdown.$dropdown.css('width'), 10);
			
			// reset css that we needed to get intDropdownWidth to get further width and height calculations
			oDropdown.$dropdown.css('position',strTempPosition);
			oDropdown.$arrow.css('display','block');
			oDropdown.$label.parent().css('display','block');
			oDropdown.$listContainer.css('display','block');
							
			// a width was passed in to the plugin and its a valid number
			if ( !(isNaN(oDropdown.intWidth)) && oDropdown.intWidth > 0 ) {
				oDropdown.$dropdown.css('width', oDropdown.intWidth+'px');
				oDropdown.$listContainer.css('width', oDropdown.intWidth+'px');
			}
			
			// css IS NOT set for the dropdown replacement element, we autosize
			else if (isNaN(intDropdownWidth) || intDropdownWidth === 0) {
				oDropdown.$label.text( getWidestOptionText(oDropdown) );
				oDropdown.$dropdown.css('width', oDropdown.$label.parent().outerWidth()+'px');
				oDropdown.$listContainer.css('width', oDropdown.$label.parent().outerWidth()+'px');
			}
			
			//  css IS set for the dropdown replacement element, so use it for the list container
			else {
				oDropdown.$listContainer.css('width', intDropdownWidth+'px');
			}
						
			// if we have a default label, use that, otherwise use the first option
			if (oDropdown.strDefaultLabel.length > 0) {
				oDropdown.$label.text(oDropdown.strDefaultLabel);
			} else {
				oDropdown.$label.text($selectedOption.text());
			}
			
			// save the outer height of the label and the list
			oDropdown.intLabelHeight = oDropdown.$label.parent().outerHeight();
			oDropdown.intListHeight = oDropdown.$list.outerHeight();
			//oDropdown.$listWrapper.css('height', oDropdown.$list.outerHeight()+'px');
			
			// give this replaced list item the selected class
			oDropdown.$items.eq(intSelectedIndex).addClass('selected');
			
			// set the current value of the dropdown
			oDropdown.strValue	= $selectedOption.attr('value');
			
		},
		
		/**
		 * Closes all other dropdowns except this one
		 */
		closeOpenDropdowns = function() {
			var $open	= $('.dropdown-open'),
				len		= $open.length,
				i;
			for (i=0; i<len; i++) {
				closeDropdown($open.eq(i).data('dropdown'));
			}			
		},
		
		/**
		 * Opens the dropdown
		 * @param oDropdown {Object} object we are currently working with
		 */
		openDropdown = function(oDropdown) {
			
			var intDropdownOffsetTop	= oDropdown.$dropdown.offset().top,
				intDropdownListBottom	= intDropdownOffsetTop + oDropdown.intLabelHeight + oDropdown.intListHeight;
			
			// set the state of this dropdown as open
			oDropdown.strState = 'open';
			
			// closes all open dropdowns
			closeOpenDropdowns();
			
			// bind an event to close the dropdown if anything else on the page is clicked
			$html.bind('mousedown.dropdown', function (e) {
				if ( $(e.target).parents('.'+oDropdown.strClassName).length === 0 ) {
					closeDropdown(oDropdown);
				}
			});
			
			// if the dropdown is set to always display "above" the label OR
			// dropdown position is set to "auto" AND
			// positioning below the label means the window is going to cut it off AND
			// there is ample space to position above the label
			if ( oDropdown.strPosition === 'above' || ( (oDropdown.strPosition === 'auto') && (intDropdownListBottom > ($window.height() + $window.scrollTop())) && ((intDropdownOffsetTop - oDropdown.intListHeight) >= 0) ) ) {
				oDropdown.$listContainer.css('top', (oDropdown.intListHeight*-1)+'px');
				oDropdown.$dropdown.addClass('dropdown-above');
			} else {
				oDropdown.$listContainer.css('top', oDropdown.intLabelHeight+'px');
			}
			
			// add class to indicate dropdown is open
			oDropdown.$dropdown.addClass('dropdown-open');
			
			// lets show the dropdown
			oDropdown.$listContainer.show();

			// trigger open callback if there is one
			if (oDropdown.fnOpen) {
				oDropdown.fnOpen(oDropdown);
			}
			
		},
		
		/**
		 * Closes the dropdown
		 * @param oDropdown {Object} object we are currently working with
		 */
		closeDropdown = function(oDropdown) {
			
			// set the state of this dropdown as closed
			oDropdown.strState = 'closed';
			
			// hide this dropdown
			oDropdown.$listContainer.hide();
			
			// remove dropdown open classes
			oDropdown.$dropdown.removeClass('dropdown-open dropdown-above');
			
			// unbind the close dropdown event
			$html.unbind('mousedown.dropdown');
			
			// trigger close callback if there is one
			if (oDropdown.fnClose) {
				oDropdown.fnClose(oDropdown);
			}
			
		},
		
		/**
		 * Performs the updating of the replacement markup
		 */
		doDropdownItemSelection = function(oDropdown, intSelectedIndex) {
			
			// get the replacement list item for the new intSelectedIndex
			var $item = oDropdown.$items.eq(intSelectedIndex);
			
			// add the selected class for this item
			oDropdown.$items.removeClass('selected');
			$item.addClass('selected');
			
			// replace the dropdown replacement label
			oDropdown.$label.html($item.text());
			
			// store value for this replacement dropdown
			oDropdown.strValue = $item.attr('data-option-value');
			
		},
		
		/**
		 * Takes in the jquery object of the select element and returns the oDropdown associated with it
		 * @param $select {Object}
		 */
		getDropdownObjFromSelect = function($select) {
			return $select.next().data('dropdown');
		},
		
		/**
		 * Monitors change event on original select element
		 */
		onSelectChange = function() {
			
			var $select		= $(this),
				oDropdown	= getDropdownObjFromSelect($select);
			
			// pass this oDropdown object and the new selectedIndex to update the replacement
			doDropdownItemSelection(oDropdown, $select[0].selectedIndex);
			
			// trigger change callback if there is one
			if (oDropdown.fnChange) {
				oDropdown.fnChange(oDropdown);
			}
			
		},
		
		/**
		 * Monitors focus event on the original select element and brings focus to replacement dropdown
		 */
		onSelectFocus = function() {
			var oDropdown = getDropdownObjFromSelect($(this));
			openDropdown(oDropdown);
			if (oDropdown.fnFocus) {
				oDropdown.fnFocus(oDropdown);
			}
		},
		
		/**
		 * Monitors focus event on the original select element and brings focus to replacement dropdown
		 */
		onSelectBlur = function() {
			var oDropdown = getDropdownObjFromSelect($(this));
			closeDropdown(oDropdown);
			if (oDropdown.fnBlur) {
				oDropdown.fnBlur(oDropdown);
			}
		},
		
		/**
		 * Add a class to style hover events on the dropdown replacement
		 */
		onDropdownMouseover = function() {
			$(this).addClass('dropdown-over');
		},
		
		/**
		 * Remove the class to style hover events on the dropdown replacement
		 */
		onDropdownMouseout = function() {
			$(this).removeClass('dropdown-over');
		},
		
		/**
		 * This event handler gets triggered whenever the replacement dropdown gets clicked. In this case,
		 * any time a list item is clicked, that event bubbles up to this handler as well
		 */
		onDropdownClick = function() {
			
			// get our oDropdown instance
			var oDropdown = $(this).data('dropdown');
			
			// if the replacement is NOT disabled
			if ( ! oDropdown.$dropdown.hasClass('disabled') ) {
				
				// open or close the dropdown replacement
				if (oDropdown.strState === 'closed') {
					openDropdown(oDropdown);
				} else if (oDropdown.strState === 'open') {
					closeDropdown(oDropdown);
				}
				
			}
			
		},
		
		/**
		 * Event handler that sets the selected item of the actual select element when a 
		 * list item from the replacement dropdown is selected.
		 * NOTE: The updating of dropdown replacement markup is called from the select change event handler.
		 */
		onDropdownItemClick = function() {
			
			var $item = $(this),
				oDropdown;
				
			if ( ! $item.hasClass('disabled') ) {
				
				// get the oDropdown object for this list item
				oDropdown = $item.parents('.dropdown-open').first().data('dropdown');
				
				// set the selectedIndex of the original select element using traditional DOM method
				oDropdown.$select[0].selectedIndex = oDropdown.$items.index($item);
				oDropdown.$select.change();
				
			}

		},
		
		/**
		 * Set up the event handlers for this particular replacement dropdown
		 * 
		 * @param oDropdown {Object} object we are currently working with
		 */
		setDropdownEvents = function(oDropdown) {
			
			// monitor change, focus and blur events for original select control
			oDropdown.$select.change(onSelectChange).focus(onSelectFocus).blur(onSelectBlur);
			
			// mouseover, mouseout and click dropdown replacement
			oDropdown.$dropdown.mouseover(onDropdownMouseover).mouseout(onDropdownMouseout).click(onDropdownClick);
			
			// option replacement item click
			oDropdown.$items.click(onDropdownItemClick);
			
		};
		
	/**
	 * A publicly accessible initialize method that gets called on an element or series of elements
	 */
	methods.init = function (oOptions) {
		
		// Loop through the jQuery objects passed in
		this.each(function () {
			
			var $select	= $(this),
				oDropdown;
			
			// only do this if we have not initialized the plugin on this element yet
			if ( ! $select.data('initialized') ) {
				
				// create a new oDropdown instance for this select element
				oDropdown 				= {};
				
				// merge in our options and defaults
				$.extend(oDropdown, oDefaults, oOptions || {});
				
				// save the original select element stuff
				oDropdown.strState		= 'closed';
				oDropdown.$select 		= $select;
				oDropdown.strName		= oDropdown.$select.attr('name');
				oDropdown.$optgroups	= oDropdown.$select.find('optgroup');
				oDropdown.$options		= oDropdown.$select.find('option');
				
				// make sure our position option is consistent
				oDropdown.strPosition = oDropdown.strPosition.toLowerCase(); 
				
				// build the markup for this instance
				buildDropdownMarkup(oDropdown);
				
				// append this markup so we can set dropdown text and css properties
				oDropdown.$dropdown.insertAfter($select);
				
				// set text and css properties for this replacement
				setDropdownProperties(oDropdown);
				
				// set up events for this replacement
				setDropdownEvents(oDropdown);
				
				// hide the list container
				oDropdown.$listContainer.css('display','none');
				
				// save this object as data for later use and hide it
				$select.data('initialized', true).css({
					'position'		: 'absolute',
					'left'			: '-9999px'
				});
				
				// show the replacement
				oDropdown.$dropdown.data('dropdown', oDropdown).css('visibility','visible');	
								
			}
			
		});
		
		return this;
			
	};
	
	/**
	 * A publicly accessible way to just update the dropdown label and selected item without
	 * the change event firing
	 */
	methods.updateDropdownSelectedItem = function (newSelectedIndex) {
		doDropdownItemSelection(this.data('dropdown'), newSelectedIndex);
		return this;
	};
	
	// set up the jQuery plugin and chaining
	$.fn.dropdown = function (method) {
		if ( methods[method] ) {
			return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
		} else if ( typeof method === 'object' || ! method ) {
			return methods.init.apply( this, arguments );
		}		
	};
	
}(jQuery));