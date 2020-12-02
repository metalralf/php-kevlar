<?php

namespace System\View\Form;

class InputSelect extends InputField
{
	private $options;
	
	public function __construct($label, $name, $options, $id=null) 
	{
		parent::__construct($label, $name, "", $id);
		
		$this->options = $options;
	}
	
	protected function getInputHTML()
	{
		$html = '<select name="'.$this->name.'" id="'.$this->id.'">';
		
		foreach($this->options as $k=>$v)
		{
			$html .= ('<option value="'.$k.'"'.($this->value !== null && $this->value == $k ? ' selected' : '').'>'.$v.'</option>');
		}
		$html .= '</select>';
		
		return $html;
	}
}