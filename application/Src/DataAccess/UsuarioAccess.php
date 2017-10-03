<?php
namespace Application\Src\DataAccess;

use Application\Src\Abstracts\BaseDataAccess;
use Application\Models\Usuario;

/**
 * Classe de acesso ao banco de dados. 
 * @author Gabriel de Figueiredo Corrêa
 * @since 01/10/2017
 */
class UsuarioAccess extends BaseDataAccess
{
    /**
     * Validação das credenciais do usuário.
     * @param Usuario $usuario
     * @return \Application\Src\Abstracts\string
     */
    public function autenticar(Usuario $usuario) {
        $params = [
            'USER' => $usuario->getUser(),
            'PASSWORD' => $usuario->getPassword()
        ];
        
        return $this->getOne("SELECT ID 
                                FROM sem_hora.USUARIO
                               WHERE NOME = :USER
                                 AND SENHA = :PASSWORD
                                 AND IND_HABILITADO = 'S'", $params);
    }
    
    /**
     * Busca por um usuárui específico.
     * @param int $id
     * @return \Application\Src\Abstracts\statement
     */
    public function buscar(int $id) {
        $params = ['ID' => $id];
        
        return $this->executeQuery('SELECT ID,
                                    	   NOME,
                                    	   SENHA,
                                           IND_HABILITADO
                                      FROM sem_hora.USUARIO
                                     WHERE ID = :ID', $params);
    }
}