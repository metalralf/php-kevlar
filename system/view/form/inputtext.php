<?php

namespace System\View\Form;

class InputText extends InputField
{
	public function __construct($label, $name, $id = null) 
	{
		parent::__construct($label, $name, "", $id);
	}
	
	protected function getInputHTML()
	{
		return '<textarea name="'.$this->name.'" id="'.$this->id.'">'.($this->value !== null ? $this->value : '').'</textarea>';
	}
}
