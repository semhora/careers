<?php
namespace Application\Src\AppClass;

use Application\Models\Usuario;

/**
 * Classe de gerenciamento de sessão
 * @author Gabriel de Figueiredo Corrêa
 * @since 01/10/2017
 *
 */
class Session
{
    /**
     * Criar a sessão do usuário.
     * @param Usuario $usuario
     */
    public function criar(Usuario $usuario) {
        $_SESSION['ID'] = $usuario->getId();
        $_SESSION['NOME'] = $usuario->getUser();
    }
    
    /**
     * Encerra a sessão do usuário.
     */
    public function encerrar() {
        $_SESSION = null;
    }
}