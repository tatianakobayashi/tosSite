<?php

/**
 *  
 */
class Issue{
	private $siteName;
	private $tosUrl;
	private $topic;
	private $quote;
	private $id;
	private $edits;

	function __construct($siteName, $tosUrl, $topic, $quote, $edits){
		$this->siteName = $siteName;
		$this->tosUrl = $tosUrl;
		$this->topic = $topic;
		$this->quote = $quote;
		$this->edits = $edits;
	}

	public function getSiteName()
	{
		return $this->siteName;
	}
	public function setSiteName($siteName)
	{
		$this->siteName = $siteName;
	}

	public function getTosUrl()
	{
		return $this->tosUrl;
	}
	public function setTosUrl($tosUrl)
	{
		$this->tosUrl = $tosUrl;
	}

	public function getTopic()
	{
		return $this->topic;
	}
	public function setTopic($topic)
	{
		$this->topic = $topic;
	}

	public function getQuote()
	{
		return $this->quote;
	}
	public function setQuote($quote)
	{
		$this->quote = $quote;
	}	

	public function getId()
	{
		return $this->id;
	}
	public function setId($id)
	{
		$this->id = $id;
	}

	public function getEdits()
	{
		return $this->edits;
	}
	public function setEdits($edits)
	{
		$this->edits = $edits;
	}
}
