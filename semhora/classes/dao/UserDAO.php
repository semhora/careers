<?php
namespace dao;
use vo;

/*
 * Classe dao de usuários (data access object) para receber os parametros e fazer as opera��es no banco de dados
 *
 * @author Diego Andrade <diegogandradex@gmail.com>
 * @version 0.1
 */
class UserDAO extends ConnectionPDO
{

    /**
     * Método construtor - pega a conex�o com o banco de dados
     * @access public
     * @return void
     */
    public function __construct() {
        $con = ConnectionPDO::getConnection();
        $this->pdo = $con->getLink();
    }

    /**
     * Método get - pega o usuário no banco de dados de acordo com o filtro
     * @access protected
     * @return Object vo\UserVO
     * @param Array $filter
     */
    protected function get($filter)
    {
        try{
            $where = array();

            if (isset($filter['id']) && $filter['id'])
            {
                $where[] = "id = :id";
                $arrDados[':id'] = $filter['id'];
                $arrBind[':id'] = \PDO::PARAM_INT;
            } else if (isset($filter['login']) && $filter['login'] && isset($filter['pass']) && $filter['pass'])
            {
                $where[] = "login = :login";
                $where[] = "password = :pass";
                $arrDados[':login'] = $filter['login'];
                $arrDados[':pass'] = $filter['pass'];
                $arrBind[':login'] = \PDO::PARAM_STR;
                $arrBind[':pass'] = \PDO::PARAM_STR;
            }

            if(!$where)
                throw new \Exception("Parametros inválidos.");

            $strWhere = " where ";
            $strWhere .= implode(" AND ", $where);

            $sql = "select * from users $strWhere";
            $stmt = $this->pdo->prepare($sql);

            foreach ($arrDados as $ind => &$val) {
                $stmt->bindParam($ind, $val, $arrBind[$ind]);
            }

            $stmt->execute();
            $user = $stmt->fetchAll(\PDO::FETCH_OBJ);

            if(count($user) != 1)
            {
                return false;
            }else{
                
                $userVO = new vo\UserVO();
                $userVO->setEmail($user[0]->email);
                $userVO->setLogin($user[0]->login);
                $userVO->setName($user[0]->nome);
                $userVO->setPass($user[0]->password);
                $userVO->setId($user[0]->id);

                return $userVO;
            }
            
        } catch (\PDOException $pdoEx) {
            return false;
        } catch (\Exception $ex) {
            echo "Exception: ";
            var_dump($ex);
            die;
        }
    }

    /**
     * Método getAll - pega todos os usuários
     * @access public
     * @return ArrayObject vo\UserVO
     */
    public function getAll()
    {
        try{
            $arrUsers = array();

            $sql = "select * from users";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $users = $stmt->fetchAll(\PDO::FETCH_OBJ);

            if(count($users) > 0)
            {
                foreach($users as $user)
                {
                    $userVO = new vo\UserVO();
                    $userVO->setEmail($user->email);
                    $userVO->setLogin($user->login);
                    $userVO->setName($user->nome);
                    $userVO->setPass($user->password);
                    $userVO->setId($user->id);

                    $arrUsers[] = $userVO;
                }

                return $arrUsers;
            }

        } catch (\PDOException $pdoEx) {
            return false;
        } catch (\Exception $ex) {
            echo "Exception: ";
            var_dump($ex);
            die;
        }
    }

    /**
     * Método update - atualiza o usuário no banco de dados
     * @access public
     * @return boolean
     * @param Object \vo\UserVo
     */
    public  function update(\vo\UserVO $user)
    {
        try{

            $nome = $user->getName();
            $email = $user->getEmail();
            $pass = $user->getPass();
            $id = $user->getId();

            $sql = "update users set nome = :nome, email = :email, password = :pass where id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':nome', $nome, \PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, \PDO::PARAM_STR);
            $stmt->bindParam(':pass', $pass, \PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);

            $stmt->execute();

            return ($stmt->rowCount() == 1) ? true : false;

        }catch (\PDOException $pdoEx) {

            return false;
        } catch (\Exception $ex) {
            echo "Exception: ";
            var_dump($ex);
            die;
        }

    }

    /**
     * Método updateLastLogin - atualiza o último login do usuário no banco de dados
     * @access protected
     * @return boolean
     * @param int $id
     */
    protected function updateLastLogin($id)
    {
        $sql = "update users set lastLogin = now() where id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, \PDO::PARAM_STR);

        $stmt->execute();

        return ($stmt->rowCount() == 1) ? true : false;
    }

    /**
     * Método insert - cadastra o usuário no banco de dados
     * @access protected
     * @return boolean
     * @param Object \vo\UserVo
     */
    protected function insert(vo\UserVO $user)
    {
        try{
            
            $sql = "insert into users (nome, login, email, password, createdAt, lastLogin) values (:nome, :login, :email, :pass, now(), now())";
            $name = $user->getName();
            $login = $user->getLogin();
            $email = $user->getEmail();
            $pass = $user->getPass();

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':nome', $name, \PDO::PARAM_STR);
            $stmt->bindParam(':login', $login, \PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, \PDO::PARAM_STR);
            $stmt->bindParam(':pass', $pass, \PDO::PARAM_STR);
            
            $stmt->execute();

            return ($stmt->rowCount() == 1) ? true : false;
            
        } catch (\PDOException $pdoEx) {
            return false;
        } catch (\Exception $ex) {
            echo "Exception: ";
            var_dump($ex);
            die;
        }
    }

    /**
     * Método validaLogin - valida o login do usuário
     * @access protected
     * @return boolean
     * @param String $login
     */
    protected function validaLogin($login)
    {
        try{

            $sql = "select * from users where login = :login";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":login",$login, \PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetchAll(\PDO::FETCH_OBJ);

            return (count($user) <= 0) ? true : false;

        } catch (\PDOException $pdoEx) {
            return false;
        } catch (\Exception $ex) {
            echo "Exception: ";
            var_dump($ex);
            die;
        }
    }

    /**
     * Método delete - deleta o usuário
     * @access public
     * @return boolean
     * @param int $id
     */
    public function delete($id){

        try{

            $sql = "delete from users where id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();

            return ($stmt->rowCount() == 1) ? true : false;

        } catch (\PDOException $pdoEx) {
            return false;
        } catch (\Exception $ex) {
            echo "Exception: ";
            var_dump($ex);
            die;
        }

    }
}