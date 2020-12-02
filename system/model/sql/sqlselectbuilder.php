<?php

namespace System\Model\Sql;

class SqlSelectBuilder extends SqlQueryBuilder
{
	protected function build()
	{
		$this->result = "SELECT * FROM `".$this->table."` ";
		if($this->where) $this->result .= (" ".$this->where);
		$this->result .= ";"; 
	}
}

