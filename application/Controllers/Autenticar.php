<?php
namespace Application\Controllers;

use Application\Models\Usuario;
use Application\Src\BusinessRules\UsuarioRules;
use Application\Src\DataAccess\UsuarioAccess;
use Application\Src\AppClass\BaseViewAjax;
use Application\Src\AppClass\Session;

/**
 * Classe de autenticação
 * 
 * @author Gabriel de Figueiredo Corrêa
 * @since 30/09/2017
 */
class Autenticar
{

    /**
     * Action: autenticar
     */
    public function autenticar()
    {
        try {
            $baseViewAjax = new BaseViewAjax();
            $usuario = new Usuario(null, $_POST['username'], $_POST['password']);
            
            // Verifica se as credenciais foram informadas.
            $usuarioRules = new UsuarioRules();
            $usuarioRules->autenticarLogin($usuario);
            
            // Verifica se o usuário existe no banco de dados.
            $usuarioAccess = new UsuarioAccess();
            $autenticarUsuario = $usuarioAccess->autenticar($usuario);
            
            if (! empty($autenticarUsuario)) {
                
                // Cria a sessão do usuário
                $result = $usuarioAccess->buscar($autenticarUsuario);
                $rows = $result->fetchAll();
                
                foreach ($rows as $row) {
                    $objUsuario = new Usuario($row['ID'], $row['NOME'], null);
                }
                
                $session = new Session();
                $session->criar($objUsuario);
                
                // Cria o retorno json
                $baseViewAjax->setDataKey('SUCESSO', 'OK');
                $baseViewAjax->setRedirect('/admin');
                
            }else {
                $baseViewAjax->setError('Usuário inexistente!');
            }
            
            echo json_encode($baseViewAjax->getData());
            
        } catch (Exception $ex) {
            $baseViewAjax->setError($ex->getMessage());
            echo json_encode($baseViewAjax->getData());
        }
    }
}