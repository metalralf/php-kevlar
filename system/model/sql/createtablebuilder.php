<?php

namespace System\Model\Sql;

class CreateTableBuilder extends SqlQueryBuilder
{
	private $fields;
	private $primaryKey;
	private $foreignKeys;
	
	public function addField($name, $type, $size=null, $constraints="")
	{
		if(!is_array($this->fields)) $this->fields = [];
		
		$this->fields[] = "`".$name."` ".$type . ($size ? "(".$size.")" : "") . ($constraints ? " ".$constraints : "");
		
		return $this;
	}
	public function setAutoIncrement()
	{
		if($this->fields) 
		{
			$this->fields[ count($this->fields)-1 ] .= " UNSIGNED AUTO_INCREMENT";
		}
		return $this;
	}
	public function addPrimaryKey($field)
	{
		if(!is_array($this->primaryKey)) $this->primaryKey = [];
		
		$this->primaryKey[] = "`".$field."`";
		
		return $this;
	}
	public function addForeignKey($field, $refTable, $refKey)
	{
		if(!is_array($this->foreignKeys)) $this->foreignKeys = [];
		
		$this->foreignKeys[] = "FOREIGN KEY (`".$field."`) REFERENCES `".$refTable."`(`".$refKey."`)";
		return $this;
	}
	
	protected function build()
	{
		$this->result = "CREATE TABLE IF NOT EXISTS `".$this->table."` (";
		$this->result .= implode(", ", $this->fields);
		
		if($this->primaryKey) 
		{
			$this->result .= (", PRIMARY KEY (".implode(",", $this->primaryKey).")");
		}
		if($this->foreignKeys)
		{	
			$this->result .= (", ".implode(", ", $this->foreignKeys));
		}
		$this->result .= ") ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;";
	}
}

