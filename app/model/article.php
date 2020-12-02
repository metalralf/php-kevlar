<?php

namespace App\Model;

class Article
{
	private $title;
	private $intro;
	private $image;
	private $body;
	
	public function __construct($title) 
	{
		$this->title = $title;
	}
	
	public function setIntro($intro) 
	{
		$this->intro = $intro;
	}
	public function setImage($image) 
	{
		$this->image = $image;
	}
	public function setBody($body) 
	{
		$this->body = $body;
	}
	
	public function title() 
	{
		return $this->title;
	}
	public function intro() 
	{
		return $this->intro;
	}
	public function image() 
	{
		return $this->image;
	}
	public function body() 
	{
		return $this->body;
	}
}

