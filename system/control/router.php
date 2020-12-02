<?php

namespace System\Control;

class Router
{
	public static function Route($path, $callBack)
	{
		if(!self::$executed && \System\Utils\Request::Path(0) == $path)
		{
			self::$executed = true;
			
			$path = \System\Utils\Request::Path();
			unset($path[0]);
			
			call_user_func_array($callBack, $path);
		}
		return new static;
	}
	public static function DefaultMethod($callBack)
	{
		if(!self::$executed)
		{
			call_user_func($callBack, \System\Utils\Request::Path());
		}
	}
	
	private static $executed = false;
}
