<?php
namespace dao;
require_once(FULL_PATH."config/db.php");

/**
 * Porque usar Prepared Statment?
 * https://websec.wordpress.com/2010/03/19/exploiting-hard-filtered-sql-injections/
 *
 * Class ConnectionPDO
 */
class ConnectionPDO
{

    private $link;
    private $connected = false;

    private $errors = array();

    /**
     * N�o � necess�rio instanciar, basta chamar ConnectionPDO::getConnection();
     * Caso queria acessar o PDO diretamente: ConnectionPDO::getConnection()->getLink();
     */
    protected $pdo;

    public function __construct() {
    }

    /**
     * Conecta a base de dados
     * Os erros s�o objetos Exceptions
     *
     * @return bool|PDO
     */
    public function connect()
    {
        try {
            $this->link = new \PDO("mysql:host=".DB_HOST.";dbname=".DB_BANCO, DB_USER, DB_PASS);
            $this->link->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->connected = true;
            return $this->link;
        } catch (Exception $e) {
            $this->connected = false;
            $this->errors[] = $e;
            return false;
        }
    }

    /**
     * Retorna a lista de erros onde cada posi��o � uma exception
     * Ou seja, voc� pode recuperar toda a informa��o ($error[0]->getMessage(), etc)
     *
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Retorna a conex�o com o banco
     *
     * @return ConnectionPDO
     */
    public static function getConnection()
    {
        $_ = new self;
        $_->connect();
        return $_;
    }

    /**
     * Retorna o link com PDO
     *
     * @return PDO
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Verifica se esta conectado ou n�o ao banco de dados
     *
     * @return bool
     */
    public function isConnected()
    {
        return $this->connected;
    }

    /**
     * Ao imprimir o objeto, ele mostra se est� ou n�o conectado
     * (para debug)
     *
     * @return string
     */
    public function __toString()
    {
        return 'Connection is ' . ($this->isConnected() ? 'ON' : 'OFF');
    }

    /**
     * N�o � poss�vel clonar este objeto
     * (Singleton-like pattern)
     *
     * @return bool
     */
    public function __clone()
    {
        return false;
    }

}