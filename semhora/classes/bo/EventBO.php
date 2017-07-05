<?php
namespace bo;
use dao;
use vo;
use util;

/**
 * Classe bo de events (business object) para implantar lógicas e fazer a comunicação entre a controller e a classe do banco de dados
 * 
 * @author Diego Andrade <diegogandradex@gmail.com> 
 * @version 0.1 
 */ 
class EventBO extends dao\EventDAO
{

    /**
     * Método register - método que irá validar os campos enviados para salvalos no banco de dados
     * @access public 
     * @param  Array $request
     * @return boolean
    */
    public function register($request)
    {

        $event = $this->validaEvent($request);

        if($event instanceof vo\EventVO){

            $ret = ($this->insert($event)) ? true : false;
            
        }else{

            $ret = false;
        }

        return $ret;
    }

    /**
     * Método change - método que irá validar os campos enviados para edita-los no banco de dados
     * @access protected 
     * @param  Array $request
     * @return boolean
    */
    public function change($request)
    {
        $event = $this->validaEvent($request);

        return ($event instanceof vo\EventVO) ?
                    $this->update($event) : false;
    }

    /**
     * Método remove - método que irá remover o evento selecionado
     * @access public
     * @param Int id
     * @return void
     */
    public function remove($id)
    {
        print $this->delete($_POST['id']);
    }

    /**
     * Método validaEvent - método que irá validar os campos do event
     * @access private 
     * @param  Array $request
     * @return boolean || ArrayObject \vo\EventVO;
    */
    private function validaEvent($request)
    {

        $event = new \vo\EventVO;
        $erro = false;

        if(isset($request['id']) && filter_var($request['id'], FILTER_SANITIZE_STRING))
            $event->setId(trim($request['id']));

        if(isset($request['nome']) && filter_var($request['nome'], FILTER_SANITIZE_STRING))
            $event->setNome(trim(utf8_decode($request['nome'])));
        else
            $erro = true;

        if(isset($request['descricao']) && filter_var($request['descricao'], FILTER_SANITIZE_STRING))
            $event->setDescricao(trim(nl2br(utf8_decode($request['descricao']))));
        else
            $erro = true;

        if(isset($request['local']) && filter_var($request['local'], FILTER_SANITIZE_STRING))
            $event->setLocal(trim(utf8_decode($request['local'])));
        else
            $erro = true;

        if(isset($request['horario']) && filter_var($request['horario'], FILTER_SANITIZE_STRING))
            $event->setHorario(trim($request['horario']));
        else
            $erro = true;

        if(isset($request['imagem']) && filter_var($request['imagem'], FILTER_SANITIZE_STRING))
            $event->setImagem(trim(utf8_decode($request['imagem'])));

        if(isset($request['status']))
            $event->setStatus(trim($request['status']));
        else
            $erro = true;

        if(isset($request['author']) && filter_var($request['author'], FILTER_SANITIZE_STRING))
            $event->setAuthor(trim(utf8_decode($request['author'])));

        return ($erro) ? false : $event;
    }

    /**
     * Método getEvents - método que irá pegar os events de acordo com os filtros de titulo, autor, caminho e corpo do event
     * @access public 
     * @param  Array $filter
     * @return ArrayObject EventVO;
    */
    public function getEvents($filter)
    {
        $filter = filter_var_array($filter,FILTER_SANITIZE_STRING);
        return $this->get($filter);
    }

    /**
     * Método getEvents - método que irá pegar todos os events
     * @access public
     * @param  Array $filter
     * @return ArrayObject EventVO;
    */
    public function getAllEvents()
    {
        return $this->get();
    }
}