<?php

namespace System\Utils;

class AutoLoad
{
	public static function Init()
	{
		spl_autoload_register(function($path)
		{
			require_once strtolower( str_replace("\\", "/", $path) ).".php";
		});
	}
	public static function Start($dir)
	{
		require_once $dir.'/config.php';
		require_once $dir.'/main.php';
	}
}

