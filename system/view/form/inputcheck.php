<?php

namespace System\View\Form;

class InputCheck extends InputField
{
	public function __construct($label, $name, $id = null) 
	{
		parent::__construct($label, $name, "checkbox", $id);
	}
	
	public function getHTML()
	{
		return '<div class="field check">'.$this->getInputHTML().$this->getLabelHTML().'</div>';
	}
}

