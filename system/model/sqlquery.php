<?php

namespace System\Model;

class SqlQuery
{
	public static function CreateTable($table, $fields, $priKey="id", $firstAI=true)
	{
		$sql = "CREATE TABLE IF NOT EXISTS `".$table."` (";
		
		if($fields)
		{
			if($firstAI) $fields[0] .= " AUTO_INCREMENT";
			$sql .= implode(", ", $fields);
		}
		
		if($priKey) $sql .= (", PRIMARY KEY(`".$priKey."`)");
		$sql .= ") ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;";
		
		return $sql;
	}
}
