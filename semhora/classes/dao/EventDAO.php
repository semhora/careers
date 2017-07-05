<?php
/*
 * Classe dao de events (data access object) para receber os parametros e fazer as opera��es no banco de dados
 *
 * @author Diego Andrade <diegogandradex@gmail.com>
 * @version 0.1
 */
namespace dao;

use vo;
use util;

class EventDAO extends ConnectionPDO
{

    /**
     * Método construtor - pega a conexao com o banco de dados
     * @access public
     */
    public function __construct()
    {
        $con = ConnectionPDO::getConnection();
        $this->pdo = $con->getLink();
    }

    /**
     * Método get - trabalha os filtros para montar a query e busca os events no banco de dados
     * @access protected
     * @param  Array $filter = array()
     * @return ArrayObject EventVO;
     */
    protected function get($filter = array())
    {
        try{

            $strWhere = "";
            $where = array();

            if (isset($filter['id']) && $filter['id']) {
                $where[] = "id = :id";
                $arrDados[':id'] = $filter['id'];
                $arrBind[':id'] = \PDO::PARAM_INT;
            } else if (isset($filter['any']) && $filter['any']) {
                $where[] = "upper(nome) like :any || upper(local) like :any";
                $arrDados[':any'] = "%".strtoupper($filter['any'])."%";
                $arrBind[':any'] = \PDO::PARAM_STR;
            } else if (isset($filter['status'])) {
                $where[] = "status = :status";
                $arrDados[':status'] = $filter['status'];
                $arrBind[':status'] = \PDO::PARAM_BOOL;
            }

            if($where){

                $strWhere = " where ";
                $strWhere .= implode(" AND ", $where);
            }

            $sql = "select * from events $strWhere";
            $stmt = $this->pdo->prepare($sql);

            if(isset($arrDados)){

                foreach ($arrDados as $ind => &$val) {
                    $stmt->bindParam($ind, $val, $arrBind[$ind]);
                }
            }

            $stmt->execute();
            $event = $stmt->fetchAll(\PDO::FETCH_OBJ);

            return $this->setViewObject($event);

        } catch (\PDOException $pdoEx) {
            return false;
        } catch (\Exception $ex) {
            echo "Exception: ";
            var_dump($ex);
            die;
        }
    }

    /**
     * Método update - atualiza o event no banco de dados
     * @access protected
     * @param  Object \vo\EventVO
     * @return boolean
     */
    protected function update(\vo\EventVO $event)
    {
        try{

            $sql = "update
                      events
                    set
                      nome = :nome,
                      descricao = :descricao,
                      local = :local,
                      horario = :horario,
                      imagem = :imagem,
                      status = :status,
                      author = :author
                    where
                      id = :id";

            $nome = $event->getNome();
            $descricao = $event->getDescricao();
            $local = $event->getLocal();
            $horario = $event->getHorario();
            $imagem = $event->getImagem();
            $status = $event->getStatus();
            $author = $event->getAuthor();
            $id = $event->getId();

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':nome', $nome, \PDO::PARAM_STR);
            $stmt->bindParam(':descricao', $descricao, \PDO::PARAM_STR);
            $stmt->bindParam(':local', $local, \PDO::PARAM_STR);
            $stmt->bindParam(':horario', $horario, \PDO::PARAM_STR);
            $stmt->bindParam(':imagem', $imagem, \PDO::PARAM_STR);
            $stmt->bindParam(':status', $status, \PDO::PARAM_STR);
            $stmt->bindParam(':author', $author, \PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, \PDO::PARAM_STR);

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
     * Método insert - insere os dados no banco de dados
     * @access protected
     * @param  Object \vo\EventVO
     * @return boolean
     */
    protected function insert(vo\EventVO $event)
    {
        try{

            $sql = "insert into
                      events
                        (
                          nome,
                          descricao,
                          local,
                          horario,
                          imagem,
                          status,
                          author,
                          createdAt
                        ) values (
                          :nome,
                          :descricao,
                          :local,
                          :horario,
                          :imagem,
                          :status,
                          :author,
                          now()
                        )";

            $nome = $event->getNome();
            $descricao = $event->getDescricao();
            $local = $event->getLocal();
            $horario = $event->getHorario();
            $imagem = $event->getImagem();
            $status = $event->getStatus();
            $author = $event->getAuthor();

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':nome', $nome, \PDO::PARAM_STR);
            $stmt->bindParam(':descricao', $descricao, \PDO::PARAM_STR);
            $stmt->bindParam(':local', $local, \PDO::PARAM_STR);
            $stmt->bindParam(':horario', $horario, \PDO::PARAM_STR);
            $stmt->bindParam(':imagem', $imagem, \PDO::PARAM_STR);
            $stmt->bindParam(':status', $status, \PDO::PARAM_STR);
            $stmt->bindParam(":author", $author, \PDO::PARAM_STR);

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
     * Método delete - apaga o event no banco de dados
     * @access public
     * @param  Int $id
     * @return boolean
     */
    public function delete($id)
    {

        try{

            $sql = "delete from events where id = :id";
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

    /**
     * Método setViewObject - transforma o retorno do banco de dados em vo (view object) para melhor manipula��o
     * @access public
     * @param  Array $eventStmt
     * @return ArrayObject EventVO
     */
    private function setViewObject($eventStmt)
    {

        $arrEvents = array();

        if(count($eventStmt) > 0)
        {
            foreach($eventStmt as $event)
            {
                $eventVO = new \vo\EventVO();
                if(isset($event->id))
                    $eventVO->setId($event->id);

                $ex = explode(" ",$event->horario);
                $data = util\Util::formataData($ex[0], false)." ".$ex[1];

                $eventVO->setAuthor(utf8_encode($event->author));
                $eventVO->setNome(utf8_encode($event->nome));
                $eventVO->setDescricao(utf8_encode($event->descricao));
                $eventVO->setLocal(utf8_encode($event->local));
                $eventVO->setHorario($data);
                $eventVO->setImagem($event->imagem);
                $eventVO->setStatus($event->status);
                $eventVO->setCreatedAt($event->createdAt);

                $arrEvents[] = $eventVO;
            }
        }

        return $arrEvents;
    }

} 