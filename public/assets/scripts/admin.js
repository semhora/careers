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

	APP.messages = function(){
		setTimeout(function(){ $('.logged .alert.active').fadeOut(); }, 1000);
	};

	APP.delete = function(){

		$('.delete').on('click', function(){
			
			if(confirm('Deseja realmente excluir este dado?'))
				return true;

			return false;

		});

	}

    // Function to Init
    APP.init = function(){ 
    	APP.messages();
    	APP.delete();
    };

    APP.init();

} )( jQuery ) ;