<?php

namespace System\Utils;

class Request
{
    public static function Post($key)
	{
		return self::Req($key, 1);
	}
    public static function Get($key)
	{
		return self::Req($key, 0);
	}
	public static function Path($index=null)
	{
		static $path = null;
		if($path === null) $path = self::ParsePath();
		
		if($index === null) return $path;
		else 
		if(isset($path[$index])) return $path[$index];
		
		return null;
	}
	
	private static function Req($key, $type)
	{
		if($type == 0) $source = &$_GET;
		else $source = &$_POST;
		
		if(isset($source[$key]))
		{
			return htmlspecialchars($source[$key]);
		}
		return null;
	}
	private static function ParsePath()
	{
		$dir = str_replace("index.php", "", $_SERVER['PHP_SELF']);
		$req = str_replace($dir, "", $_SERVER['REQUEST_URI']);
		
		if($req)
		{
			$slice = strpos($req, "?");
			if($slice !== false) $req = substr($req, $slice+1);

			return explode("/", $req);
		}
		return [];
	}
}

