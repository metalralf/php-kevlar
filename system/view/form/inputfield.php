<?php

namespace System\View\Form;

class InputField
{
	protected $label;
	protected $name;
	protected $id;
	protected $value;
	private $type;
	
	public function __construct($label, $name, $type="text", $id=null) 
	{
		$this->label = $label;
		$this->name = $name;
		$this->type = $type;
		$this->id = $id;
		
		if(!$this->id) $this->id = $name;
		$this->value = null;
	}
	
	public function getName() 
	{
		return $this->name;
	}
	
	public function getId() 
	{
		return $this->id;
	}
	public function setId($id) 
	{
		$this->id = $id;
	}
		
	public function setValue($value) 
	{
		$this->value = $value;
	}
		
	/**
	 Get HTML text of this input field
	 @return string The HTML content
	 */
	public function getHTML()
	{
		return '<div class="field">'.$this->getLabelHTML().$this->getInputHTML().'</div>';
	}
	
	protected function getLabelHTML()
	{
		return '<label for="'.$this->id.'">'.$this->label.'</label>';
	}
	protected function getInputHTML()
	{
		return '<input type="'.$this->type.'" name="'.$this->name.'" id="'.$this->id.'"'.($this->value !== null ? ' value="'.$this->value.'"' : '').'>';
	}
}

