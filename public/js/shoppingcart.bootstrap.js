
/**
 * @fileOverview SHOPCART bootstrap JavaScript file
 * @author <a href="mailto:adriaan@BALT.us">Adriaan Scholvinck</a> - <a href="http://BALT.us">www.BALT.us</a> 
 * @version 1
 */

 /**
 * @name window.SHOPCART
 * @description 
 * @namespace The global namespace for the SHOPPINGCART.
 * @author <a href='mailto:adriaan@balt.us'>Adriaan Scholvinck</a>
 */
window.SHOPCART = (function(self, window, undefined){
	
	/**
	 * @name SHOPCART-_initialize
	 * @exports SHOPCART-_initialize as SHOPCART
	 * @function
	 * @description The initialize method that kicks off all SHOPCART functionality
	 */
	var _initialize = function() {
		
		// prevent bootstrap from executing twice
		if (self.initialized) {
			return;
		}
		
		// console overwrite for IE8
		if (window.console === undefined) {
			window.console = {};
			console.log = function() {};
			console.error = function() {};
		}
		
		console.log('SHOPCART.initialze');

		// Set body now that DOM is available	
		setup();

		// prevent bootstrap from executing twice
		self.initialized = true;
	
	},

	setup = function(){

		console.log ( 'root :', root );
			
		$('#searchbox').selectize({
			valueField: 'url',
			labelField: 'name',
			searchField: ['name'],
			maxOptions: 10,
			options: [],
			create: false,
			render: {
				option: function(item, escape) {
					return '<div><img src="'+ item.icon +'">' +escape(item.name)+'</div>';
				}
			},
			optgroups: [
				{value: 'product', label: 'Products'},
				{value: 'category', label: 'Categories'}
			],
			optgroupField: 'class',
			optgroupOrder: ['product','category'],
			load: function(query, callback) {
				if (!query.length) return callback();
				$.ajax({
					url: root+'/api/search',
					type: 'GET',
					dataType: 'json',
					data: {
						q: query
					},
					error: function() {
						callback();
					},
					success: function(res) {
						callback(res.data);
					}
				});
			},
			onChange: function(){
				window.location = this.items[0];
			}
		});
	};
	
	// SHOPCART public variables & methods
	return {
		/**
		 * @name SHOPCART.HAS_TOUCH
		 * @description Defines if touch events are supported. */ 
		HAS_TOUCH: ('ontouchstart' in window),
		/**
		 * @name SHOPCART.$document
		 * @description Stored jQuery reference to document */
		$document: $(document),
		/**
		 * @name SHOPCART.$window
		 * @description Stored jQuery reference to window */
		$window: $(window),
		/**
		 * @name SHOPCART.$html
		 * @description Stored jQuery reference to html element */
		$html: $('html'),
		/**
		 * @name SHOPCART.$body
		 * @description Stored jQuery reference to body element */
		$body: null,
		initialize: _initialize
	};

}(window.SHOPCART || {}, window, undefined));


// Initialize functionality
$(document).ready(SHOPCART.initialize);

