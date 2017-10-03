<?php
namespace Application\Src\Abstracts;

use PDO;

/**
 * Classe de conexão com o banco de dados
 * @author Gabriel de Figueiredo Corrêa
 * @since: 30/09/2017
 * @package Application\Src
 * 
 */
abstract class BaseDataAccess 
{

	/**
	 * Database
	 *
	 */
	private static $dbh;

	/**
	 * Indicador de Transacao
	 *
	 * @var boolean
	 */
	private static $trans = false;
	
	/**
	 * DataBase Transacional
	 *
	 */
	private static $dbTransaction;
	
	/**
	 *
	 * Id do ultimo registro inserido em uma tabela.
	 *
	 */
	private static $lastInsertId;

	/**
	 * Inicializa a conexão com o banco de dados.
	 *
	 */
	private function createConnection() 
	{
		try {
			$this->dbh = new PDO ( DATA_BASE['DSN'], DATA_BASE['USER'], DATA_BASE['PASSWORD'] );
		} catch ( PDOException $ex ) {
			$this->raise_error ( 'db_mysql::__construct() - Could not select and/or connect to database' . '-' . "Error!: " . $ex->getMessage () );
		}
	}

	/**
	 * Executa a query. Retorna o statement.
	 *
	 * @param  string    $query
	 * @param  array     $params
	 * @return statement $stmt
	 * 
	 */
	public function executeQuery($query, $params = false)
	{
		if (self::$trans) {
			$this->dbh = self::$dbTransaction;
		}
		else{
			$this->createConnection ();
		}

		$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $this->dbh->prepare ( $query );
		if ($params) {
			foreach ( $params as $key => $value ) {
				if (empty ( $value )) {
					$value = null;
				}

				$stmt->bindValue ( $key, $value );
			}
		}

		$stmt->execute ();

		if (!self::$trans) {
			$this->closeConnection ();
		}
		return $stmt;
	}

	/**
	 * Retorna um unico valor
	 *
	 * @param  string    $query
	 * @param  array     $params
	 * @param  boolean   $trans
	 * @return record
	 */
	public function getOne($query, $params = false, $trans = false) 
	{
		if (! $this->trans) {
			$this->createConnection ();
		}

		$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $this->dbh->prepare ( $query );
		if ($params) {
			foreach ( $params as $key => $value ) {
				$stmt->bindValue ( $key, $value );
			}
		}

		$stmt->execute ();

		if (! $this->trans) {
			$this->closeConnection ();
		}

		return $stmt->fetchColumn ();
	}

	/**
	 * Inicia a transação
	 *
	 */
	public function startTransaction() 
	{
		$base = new BaseDataAccess();
		$base->createConnection ();
		$base->dbh->beginTransaction ();
		self::$trans = true;
		self::$dbTransaction = $base->dbh;
	}
	
	/**
	 * Conclui a transação
	 *
	 */
	public function commitTransaction() 
	{
		self::$dbTransaction->commit ();
		self::$dbTransaction = null;
		self::$trans = false;
	}
	
	/**
	 * Desfaz a transação
	 *
	 */
	public function rollbackTransaction() 
	{
		self::$dbTransaction->rollBack ();
		self::$dbTransaction = null;
		self::$trans = false;
	}

	/**
	 * Fecha as conexões do MySQL.
	 *
	 * @param  none
	 * @return boolean
	 */
	public function closeConnection() 
	{
		$this->dbh = null;
	}
	
	/**
	 * Recupera o ultimo id de inserção de uma tabela
	 * @return integer
	 */
	public function getLastInsertId()
	{
		if (self::$trans) {
			$this->dbh = self::$dbTransaction;
		}
		else{
			$this->createConnection ();
		}

		$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$lastInsertId = $this->dbh->prepare ( 'SELECT LAST_INSERT_ID()' );
		$lastInsertId->execute ();

		self::$lastInsertId = $lastInsertId->fetchColumn ();

		if (!self::$trans) {
			$this->closeConnection ();
		}

		return self::$lastInsertId;
	}
}