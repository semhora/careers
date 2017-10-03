$('#btnAssinar').click(function(){
	if(ValidarFormularioNewsletter() != false){
		$.blockUI({ 
			message: '<h1><img src="http://www.ibranch.com.br/site/assets/img/icons/ajax-loader.gif" /> Assinando...</h1>',
			onBlock: function() {
				retorno = Ajax('http://www.ibranch.com.br/site/newsletter/newsletterAcoesAjax.php', 'emailNewsletter=' + $('#emailNewsletter').val());
				if(retorno.SUCESSO == 'OK'){
					alert('Assinatura realizada com sucesso!');
					LimparFormularioNewsletter();
				}
			}
		});
	}
});

/* FUNÇÕES */
function ValidarFormularioNewsletter(){
	if($('#emailNewsletter').val() == ''){
		alert('Informe o seu e-mail!');
		$('#emailNewsletter').focus();
		return false;
	}
	
	if(!ValidarEmail($('#emailNewsletter').val())){
		alert('E-mail inválido!');
		$('#emailNewsletter').focus();
		return false;
	}	
}

function LimparFormularioNewsletter(){
	$('#emailNewsletter').val('');
}

function FormatarFooter(){
	if($('#indHabilitaEnderecoFooter').val() == 'N'){
		$('#campoEnderecoFooter').hide();
	}
}