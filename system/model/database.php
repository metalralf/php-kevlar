<?php

namespace System\Model;

class Database
{
	public function __construct($type, $host, $dbName, $user, $pass) 
	{
		$dsn = $type.":host=".$host.";dbname=".$dbName.";charset=utf8mb4";
		
		$this->error = null;
		 
		try
		{
			$this->connection = new \PDO($dsn, $user, $pass);
			$this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			$this->connection->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
			
			if(!self::$defaultConnection) self::$defaultConnection = $this;
		} 
		catch(\PDOException $ex) 
		{
			$this->connection = false;
			$this->error = $ex->getMessage();
		}
	}
	
	public function execute($sql, $params=null) 
	{
		if($this->connection)
		{
			$this->error = null;
			
			try
			{
				$this->query = $this->connection->prepare($sql);
				return $this->query->execute($params);
			} 
			catch(\PDOException $ex) 
			{	
				$this->error = $ex->getMessage();
			}
		}
		return false;
	}
	public function getResult() 
	{
		return $this->query->fetchAll(\PDO::FETCH_ASSOC);
	}
	public function getLastId()
	{
		return $this->connection->lastInsertId();
	}
	
	public function getError()
	{
		return $this->error;
	}
	public function getConnection() 
	{
		return $this->connection;
	}
	
	public static function GetDefaultConnection()
	{
		return self::$defaultConnection;
	}
	
	private static $defaultConnection = null;
	
	private $connection;
	private $query;
	private $error;
}
