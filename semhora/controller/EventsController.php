<?php
namespace controller;

use bo\EventBO;
use util;

/**
 * Esta classe de controller para os events
 * 
 * @author Diego Andrade <diegogandradex@gmail.com> 
 * @version 0.1 
 */

class EventsController extends HeaderController{
    
    /**
     * Variavel recebe o business object (bo) de events - que ira interagir com o banco de dados
     * @access private 
     * @name $events 
    */
    private $events; 

    /**
     * Metodo construtor - chama o construtor da classe extendida, que ira fazer a autenticacao
     *                   - instancia a classe bo de events
     * @access public 
     * @return void
     * $param @logado default true - se passado como false, consegue acessar o sistema sem autenticar - no caso do blog.
    */ 
    public function __construct($logado = true)
    {
        parent::__construct($logado);
        
        $this->events = new EventBO();
    }

    /**
     * Metodo getAll - funcao que vai pegar todos os events na bo sem nenhum filtro
     * @access public 
     * @return void
    */
    public function getAll()
    {
        return $this->events->getAllEvents();
    }
    
    /**
     * Metodo getByFilter - funcao que vai pegar todos os events na bo, com os filtros do campo de busca
     * @access public 
     * @return void
    */    
    public function getByFilter($filter)
    {
        return $this->events->getEvents($filter);
    }
    
    /**
     * Metodo save - funcao que vai salvar o novo event na bo
     * @access public 
     * @param Array $request
     * @return void
    */
    public function save($post, $files)
    {
        if($files['imagem']['tmp_name'] != '')
        {
            $imagem = $this->uploadFiles($files);
            $post['imagem'] = $imagem;
        }

        if(isset($post['data']))
            $post['horario'] = util\Util::formataData($post['data'])." ".$post['horario'];

        $ret = $this->events->register($post);

        if($ret === true){
            $msg["color"] = "alert-success";
            $msg["glyphicon"] = "glyphicon glyphicon-ok";
            $msg["text"] = "Evento cadastrado com sucesso.";
        }else{
            $msg["color"] = "alert-danger";
            $msg["glyphicon"] = "glyphicon-exclamation-sign";
            $msg["text"] = "Erro ao cadastrar evento, verifique os campos do formulário.";
        }
        
        return $msg;
    }

    /**
     * Método edit - função que vai editar o novo event na bo
     * @access public
     * @param Array $request
     * @return Array
    */
    public function edit($post, $files)
    {
        if($files['imagem']['tmp_name'] != '')
        {
            $imagem = $this->uploadFiles($files);
            $post['imagem'] = $imagem;
        }

        if(isset($post['data']))
            $post['horario'] = util\Util::formataData($post['data'])." ".$post['horario'];

        $ret = $this->events->change($post);

        if($ret === true){
            $msg["color"] = "alert-success";
            $msg["glyphicon"] = "glyphicon glyphicon-ok";
            $msg["text"] = "Event editado com sucesso.";
        }else{
            $msg["color"] = "alert-danger";
            $msg["glyphicon"] = "glyphicon-exclamation-sign";
            $msg["text"] = "Erro ao editar evento, verifique os campos digitados.";
        }

        return $msg;
    }

    /**
     * Método remove - método que irá remover o evento selecionado
     * @access public
     * @param Int id
     * @return void
     */
    public function removeEvento($id)
    {
        $this->events->remove($id);
    }


    /**
     * Método uploadFiles - método que irá salvar o arquivo enviado pelo usuário
     * @access public
     * @param Array $files
     * @return boolean
     */
    private function uploadFiles($files)
    {
        $uploadDir = __DIR__."\\..\\public\\uploads\\";
        $imageInfo = pathinfo($_FILES['imagem']['name']);
        $imagem = $imageInfo['filename'].
                  util\Util::randString(15).".".
                  $imageInfo['extension'];
        $uploadfile = $uploadDir . $imagem;

        $ret = (move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadfile))
                    ?
                    $imagem : false;

        return $ret;
    }
}