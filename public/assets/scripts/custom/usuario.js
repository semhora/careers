/*
 * Nome do arquivo: usuario.js
 * Criado por: Gabriel de Figueiredo Corrêa
 * Data de criação: 01/10/2017
 * 
 * Modificado por: Gabriel de Figueiredo Corrêa
 * Data da modificação: 02/10/2017
 * */

$('#btnEnviar').click(function(){
	if(ValidarFormulario() != false){
		$.blockUI({ 
			message: '<h1><img src='+ $('#imgAjaxLoader').val() +' /> Enviando...</h1>',
			onBlock: function() {
				var md5 = $.md5($('#password').val());
				$('#password').val(md5);
				retorno = Ajax('/autenticar', $('#formulario').serialize());
			}
		});
	}
});

/* FUNÇÕES */
function ValidarFormulario(){
	if($('#username').val() == ''){
		alert('Informe o usuário!');
		$('#username').focus();
		return false;
	}
	
	if($('#password').val() == ''){
		alert('Informe a senha!');
		$('#password').focus();
		return false;
	}
}