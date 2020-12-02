<?php

namespace System\Utils;

class Dev
{
	public static function Enabled($enabled=true)
	{
		self::$enabled = $enabled;
	}
	public static function Dump($var)
	{
		if(self::$enabled)
		{
			echo '<pre>';
			var_dump($var);
			echo '</pre>';
		}
	}
	
	private static $enabled = false;
}

