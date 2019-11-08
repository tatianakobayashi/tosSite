<?php

/**
 *  
 */
class Topic{
	private $english;
	private $id;
	private $translation;

	function __construct($english, $translation){
		$this->english = $english;
		$this->translation = $translation;
	}

	public function getTranslation()
	{
		return $this->translation;
	}
	public function setTranslation($translation)
	{
		$this->translation = $translation;
	}

	public function getEnglish()
	{
		return $this->english;
	}
	public function setEnglish($english)
	{
		$this->english = $english;
	}	

	public function getId()
	{
		return $this->id;
	}
	public function setId($id)
	{
		$this->id = $id;
	}
}
