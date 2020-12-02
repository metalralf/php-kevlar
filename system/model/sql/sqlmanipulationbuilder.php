<?php

namespace System\Model\Sql;

class SqlManipulationBuilder extends SqlQueryBuilder
{
	private $method;
	private $fields;

	public function __construct($table, $method=self::MTH_INSERT) 
	{
		parent::__construct($table);
		
		$this->method = $method;
		$this->fields = [];
	}
	
	public function setFields($fields)
	{
		$this->fields = $fields;
		return $this;
	}
	
	protected function build() 
	{
		switch($this->method)
		{
			case self::MTH_INSERT: $this->buildInsert(); break;
			case self::MTH_UPDATE: $this->buildUpdate(); break;
			case self::MTH_DELETE: $this->buildDelete(); break;
		}
	}
	
	const MTH_INSERT = "INSERT";
	const MTH_UPDATE = "UPDATE";
	const MTH_DELETE = "DELETE";
	
	private function buildInsert()
	{
		$this->result = $this->method." INTO `".$this->table."` ";
		$this->result .= ("(`".implode("`,`", $this->fields)."`) ");
		$this->result .= ("VALUES (:".implode(",:", $this->fields).");");
	}
	private function buildUpdate()
	{
		$this->result = $this->method." `".$this->table."` ";
		foreach($this->fields as &$field) $field = "`".$field."`=:".$field;
		$this->result .= ("SET ".implode(",", $this->fields));
		if($this->where) $this->result .= (" ".$this->where);
		$this->result .= ";";
	}
	private function buildDelete()
	{
		$this->result = $this->method." FROM `".$this->table."` ";
		if($this->where) $this->result .= (" ".$this->where);
		$this->result .= ";"; 
	}
}

