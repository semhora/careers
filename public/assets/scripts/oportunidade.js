/* CONTROLE DOS COMPONENTES */
FormatarFormulario();

$('#formulario').ajaxForm({
	url: '/work/send-curriculum',
	type: 'post',
	dataType: 'json',
	beforeSubmit: function(){
		if(ValidarFormulario() != false){
			$.blockUI({ 
				message: $('#htmlMsgLoaderGif').val()
			});
		}else{
			exit();
		}
	},
	success: function(retorno){
		if (retorno.Redirect != ''){
			if (retorno.MensagemErro != ''){
				alert(retorno.MensagemErro);
			}
			
			window.location = retorno.Redirect;
		}else if (retorno.MensagemErro == ''){
			if(retorno.SUCESSO == 'OK'){
				alert('Currículo enviado com sucesso!');
				LimparFormulario();
			}
		}else{
			alert(retorno.MensagemErro);
		}
		
		$.unblockUI();
	},
    error: function(e){
    	$.unblockUI();
		alert('Ocorreu um erro inesperado!');
	}
});

$('#btnCancelar').click(function(){
	LimparFormulario();
});

$('#curriculo').bind('change', function() {
	  //this.files[0].size gets the size of your file.
	  $('#tamanhoArquivoAtual').val(this.files[0].size);
	  $('#tipoArquivoAtual').val(this.files[0].type);
});

/* IMPLEMENTAÇÃO DAS FUNÇÕES */
function FormatarFormulario(){
	MascaraSoLetras();
	
	if($('#indHabilitaOportunidade').val() == 'N'){
		$('#nome, #curriculo, #btnCancelar').attr('disabled', true);
	}
	
	if($('#indHabilitaEndereco').val() == 'N'){
		$('#campoEndereco').hide();
	}
}

function LimparFormulario(){
	$('#nome').val('');
	$('#curriculo').val('');
	$('#nome').focus();
}

function ValidarFormulario(){
	if($('#indHabilitaOportunidade').val() == 'N'){
		alert('No momento todas as nossas vagas estão preenchidas. Assine a nossa \nNewsletter para receber e-mails com novas oportunidades!');
		$('#emailNewsletter').focus();
		return false;
	}
	
	if($('#nome').val() == ''){
		alert('Informe o seu nome!');
		$('#nome').focus();
		return false;
	}
	
	if($('#curriculo').val() == ''){
		alert('Informe o arquivo a ser enviado!');
		$('#curriculo').focus();
		return false;
	}
	
	if(parseFloat($('#tamanhoArquivoAtual').val()) > parseFloat($('#tamanhoMaximoArquivo').val())){
		alert('O arquivo excede o tamanho máximo permitido (' + TamanhoArquivoHumanizado(parseFloat($('#tamanhoMaximoArquivo').val()), 1000) + ')!');
		$('#curriculo').focus();
		return false;
	}
	
	var arrayTiposPermitidos = new Array();
	arrayTiposPermitidos = $('#tipoArquivoPermitido').val().split(':');
	
	if( $.inArray($('#tipoArquivoAtual').val(), arrayTiposPermitidos) == -1 ){
		alert('Tipo de arquivo inválido!');
		$('#curriculo').focus();
		return false;
	}
}