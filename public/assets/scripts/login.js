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

    // doLogin
    APP.admin = {

    	doLogin: function(){

    		$('#form-login').on('submit', function(){
	    		
	    		var ajaxUrl = '/admin/json/login';
	    		var dados = $(this).serialize();

	    		$.ajax({
	    			url: ajaxUrl,
	    			data: dados,
	    			type: 'POST',
	    			dataType: 'json',
	    			success: function( data ){

	    				console.log(data.message);

	    				if( data.status == 'true' ){
	    					
	    					createCookie('userid', data.userid, 1);
	    					window.location = '/admin/events';
	    				
	    				}else{

	    					$('.alert.alert-danger').fadeIn();
	    					$('.alert.alert-danger').text( data.message );
	    				
	    				} // if( data.status ){ ... }

	    			},
	    			error: function( e ){
	    				console.log("ERROR:");
	    				$('body').append( e.responseText );
	    			}

	    		});

	    		return false;

    		});
    	},

    };

    // Function to Init
    APP.init = function(){ 
    	APP.admin.doLogin();
    };

    APP.init();

} )( jQuery ) ;