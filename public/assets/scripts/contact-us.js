/* Configurações do compenente do Google Maps */
var ContactUs = function () {

    return {
        //main function to initiate the module
        init: function () {
			var map;
			$(document).ready(function(){
			  map = new GMaps({
				div: '#map',
	            lat: $('#latitude').val(),
				lng: $('#longitude').val(),
			  });
			  var marker = map.addMarker({
		            lat: $('#latitude').val(),
					lng: $('#longitude').val(),
		            title: 'iBranch',
		            infoWindow: {
		                content: "<strong>Edifício:</strong> " + $('#edificio').val() + 
		                		 "<br/><strong>Endereço:</strong> " + $('#endereco').val() 
		            }
		        });

			   marker.infoWindow.open(map, marker);
			});
        }
    };

}();

/* CONTROLE DOS COMPONENTES */
FormatarFormulario();
ContadorCaracteresRestantes();

$('#btnEnviar').click(function(){
	if(ValidarFormulario() != false){
		$.blockUI({ 
			message: '<h1><img src='+ $('#imgAjaxLoader').val() +' /> Enviando...</h1>',
			onBlock: function() {
				retorno = Ajax('/email/send-contact', $('#formulario').serialize());
				
				if(retorno.SUCESSO == 'OK'){
					alert('E-mail enviado com sucesso!');
					LimparFormulario();
				}
			}
		});
	}
});

$('#btnCancelar').click(function(){
	LimparFormulario();
});

/* FUNÇÕES */
function ValidarFormulario(){
	if($('#nome').val() == ''){
		alert('Informe o seu nome!');
		$('#nome').focus();
		return false;
	}
	
	if($('#email').val() == ''){
		alert('Informe o seu e-mail!');
		$('#email').focus();
		return false;
	}
	
	if(!ValidarEmail($('#email').val())){
		alert('E-mail inválido!');
		$('#email').focus();
		return false;
	}
	
	if($('#mensagem').val() == ''){
		alert('O campo mensagem deve ser preenchido!');
		$('#mensagem').focus();
		return false;
	}
}

function LimparFormulario(){
	$('#nome').val('');
	$('#email').val('');
	$('#telefone').val('');
	$('#assunto').val('');
	$('#mensagem').val('');
	$("#contador").html('900');
	$('#nome').focus();
}

function FormatarFormulario(){
	MascaraTelefone();
	MascaraSoLetras();
	
	if($('#indHabilitaEndereco').val() == 'N'){
		$('#map, #campoEndereco').hide();
	}
}

function ContadorCaracteresRestantes(){
	$(".limitador-caracteres").keyup(function(event){
		 
        // pega a span onde esta a quantidade máxima de caracteres.
        var target    = $("#contador");
 
        // pego pelo atributo title a quantidade maxima permitida.
        var max        = target.attr('title');
 
        // tamanho da string dentro da textarea.
        var len     = $(this).val().length;
 
        // quantidade de caracteres restantes dentro da textarea.
        var remain    = max - len;
 
        // caso a quantidade dentro da textarea seja maior que
        // a quantidade maxima.
        if(len > max)
        {
            // abaixo vamos pegar tudo que tiver na string e limitar
            // a quantidade de caracteres para o máximo setado.
            // isso significa que qualquer coisa que seja maior que
            // o máximo será cortado.
            var val = $(this).val();
            $(this).val(val.substr(0, max));
 
            // setamos o restante para 0.
            remain = 0;
        }
 
        // atualizamos a quantidade de caracteres restantes.
        target.html(remain);
 
    });
}