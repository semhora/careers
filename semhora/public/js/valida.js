/* 
 * função para verificar se formato de email é válido
 * @param string email
 */
function checkEmail(email)
{
    var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
    return filter.test(email);
}

/*
*  função genérica para validar formulários
*  necessita dos inputs com a classe form-control e o atributo chat, indicanto a quantidade de caracteres mínima
*  para validar emails, o id do input deve ser 'email'
*  @param null
* */
function valida()
{
    var erro = false;
        
    $(".form-control").each(function(){
        if(typeof $(this).attr("char") !== undefined && $(this).attr("char") != false){
            if($(this).val().length < $(this).attr("char")){
                $(this).css("border-color","#a94442");
                erro = true;
            }else if($(this).attr("id") == "email"){
                if(!checkEmail($(this).val())){
                    $(this).css("border-color","#a94442");
                    erro = true;
                }else{
                    $(this).css("border-color","");
                }
            }else{
                $(this).css("border-color","");
            }
        }
    });

    if(erro){
        if($("#tipo-modal").hasClass("alert-success")){
           $("#tipo-modal").switchClass("alert-success","alert-danger");
           $(".modal-title").switchClass("txt-azul","txt-vermelho").html("Erro de preenchimento");
        }
        $("#error-text").html("Os campos em destaque estão inválidos.");
        $("#modal-load").modal();
        return false;
    }else{
        return true;
    }
}

/*
* função para manipular uma janela modal do bootstrap
* @param string tipo - sendo 1 para erro e 2 para sucesso
* @param string msg - mensagem para ser exibida no modal
* @param string titulo - para inserir o titulo no modal
* */
function manipulaModal(tipo, msg, titulo)
{
    if(tipo == 2){
        if($("#tipo-modal").hasClass("alert-danger")){
           $("#tipo-modal").switchClass("alert-danger","alert-success");
           $("#modal-title").switchClass("txt-vermelho","txt-azul");
        }else{
            $("#tipo-modal").addClass("alert-success");
            $("#modal-title").addClass("txt-verde");
        }
    }else if(tipo == 1){
        if($("#tipo-modal").hasClass("alert-success")){
           $("#tipo-modal").switchClass("alert-success","alert-danger");
           $("#modal-title").switchClass("txt-azul","txt-vermelho");
        }else{
            $("#tipo-modal").addClass("alert-danger");
            $("#modal-title").addClass("txt-vermelho");
        }
    }
    
    $("#error-text").html(msg);
    $("#modal-load").css("z-index", "1051");

    if(titulo)
        $("#modal-title").html(titulo);
    
    $("#modal-load").modal();
}

$(function(){
    /**
     * acionando validação de formulário quando ocorre o submit
     */
    $("#formCard").submit(function(){
        return valida();
    });

    /*
    * ação genérica para o click do botão de remover informação
    * */
    $(".glyphicon-trash").click(function(){

        var r = confirm("Deseja remover este evento?");
        if (r == true) {

            /*
            * acionando ajax para remover a informação
            * */
            $.ajax({
                type: "POST",
                url: "?method=remove",
                data: {id: $(this).attr("id")},
                success: function(data) {
                    if(data == true)
                        manipulaModal(2,"Removido com sucesso!", "Concluído.");
                    else
                        manipulaModal(2,"Erro ao remover.!", "Erro!");
                }
            });

            $('#modal-load').on('hidden.bs.modal', function () {
                location.reload();
            });
        }
    });

});