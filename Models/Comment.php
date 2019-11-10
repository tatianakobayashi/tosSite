<?php

class Comment{
    private $id;
    private $title;
    private $text;
    private $importance;
    private $classification; // bom, neutro ou ruim
    private $userId;

    function __construct($title, $text, $importance, $classification, $userId){
        $this->title = $title;
        $this->text = $text;
        $this->importance = $importance;
        $this->classification = $classification;
        $this->userId = $userId;
    }

    public function getId()
	{
		return $this->id;
	}
	public function setId($id)
	{
		$this->id = $id;
	}

    public function getTitle()
	{
		return $this->title;
	}
	public function setTitle($title)
	{
		$this->title = $title;
	}

    public function getText()
	{
		return $this->text;
	}
	public function setText($text)
	{
		$this->text = $text;
	}

	public function getImportance()
	{
		return $this->importance;
	}
	public function setImportance($importance)
	{
		$this->importance = $importance;
	}	

	public function getUserId()
	{
		return $this->userId;
	}
	public function setUseruserId($userId)
	{
		$this->userId = $userId;
	}

	public function getClassification()
	{
		return $this->classification;
	}
	public function setClassification($classification)
	{
		$this->classification = $classification;
	}
}
