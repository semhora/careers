( function ( $ ) {
	// Creating Object
	var APP = {} || APP;
	APP.api = {};
	APP.fn = {};
	APP.profile = {};

    if (!window.location.origin) {
		window.location.origin = window.location.protocol + "//" + window.location.hostname + (window.location.port ? ':' + window.location.port: '');
	}

	// Global vars
	var plocation   = window.location,
	    domain      = window.location.origin;

	APP.details = function(){

		$('.btn-details').on('click', function(){
			var parent = $(this).parent();
			$('.item-details', parent).toggle();
		});

	}

    // Function to Init
    APP.init = function(){ 
    	APP.details();
    };

    APP.init();

} )( jQuery ) ;