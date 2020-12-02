<?php

namespace System\View;

class ViewParser
{
	private $html;
	private $vars;
	private $default;
	
	public function __construct($html) 
	{
		$this->html = $html;
		$this->vars = [];
		$this->default = [];
		
		if(preg_match_all("/{{.+}}/", $html, $matches))
		{
			if($matches) 
			{
				$matches = $matches[0];
				
				foreach($matches as $match)
				{
					$name = trim($match, "{}");
					$name = explode("|", $name);
					$this->default[ $name[0] ] = (isset($name[1]) ? $name[1] : "");
					$name = $name[0];
					
					$this->vars[$name] = $match;
				}
			}
		}
	}
	
	public function render($model)
	{
		$result = $this->html;
		
		foreach($this->vars as $var => $original)
		{
			$value = $this->default[$var];
			
			if(is_array($model))
			{
				if(isset($model[$var]) && $model[$var])
				{
					$value = $model[$var];
				}
			}
			else
			if(is_object($model))
			{
				if(isset($model->{$var}) && $model->{$var}) 
				{
					$value = $model->{$var};
				}
				else 
				if(method_exists($model, $var))
				{
					$r = call_user_func([$model, $var]);
					if($r) $value = $r;
				}
			}
			
			$result = str_replace($original, $value, $result);
		}
		
		return $result;
	}
}

