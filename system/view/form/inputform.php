<?php

namespace System\View\Form;

class InputForm
{
	private $id;
	private $method;
	private $action;
	private $fields;
	private $button;
	
	public function __construct($id, $method="post", $action="", $button="Küldés") 
	{
		$this->id = $id;
		$this->method = $method;
		$this->action = $action;
		$this->button = $button;
		
		$this->fields = [];
	}
	
	/**
	 * @param InputField $inputField Description
	 * @return InputForm Description
	 */
	public function addField($inputField)
	{
		$inputField->setId( $this->id."-".$inputField->getName() );
		$this->fields[$inputField->getName()] = $inputField;
		
		return $this;
	}
	
	/**
	 * @return InputField Description
	 */
	public function getField($name)
	{
		return $this->fields[$name];
	}

	public function getHTML(&$model=null)
	{
		$html = '<form method="'.$this->method.'" action="'.$this->action.'" id="'.$this->id.'">';
		
		foreach($this->fields as $field)
		{
			if($model && isset($model[$field->getName()]))
			{
				$field->setValue($model[$field->getName()]);
			}
			$html .= $field->getHTML();
			
			$field->setValue(null);
		}
		
		$html .= ('<input type="submit" name="'.$this->id.'" value="'.$this->button.'" class="button">');
		$html .= '</form>';
		
		return $html;
	}
}

