<?php

namespace System\Model\Sql;

abstract class SqlQueryBuilder
{
	protected $table;
	protected $result;
	protected $where;
	
	public function __construct($table) 
	{
		$this->table = $table;
		$this->result = null;
		$this->where = null;
	}
	
	public function where($where)
	{
		if(!is_string($where))
		{
			foreach($where as &$a) $a = "`".$a."`=:".$a;
			$where = implode(" AND ", $where);
		}
		
		$this->where = "WHERE ".$where;
	}
	
	protected abstract function build();
	
	public function getResult()
	{
		if($this->result === null) $this->build();
		return $this->result;
	}
}