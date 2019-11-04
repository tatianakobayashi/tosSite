<?php

/**
 *  
 */
class Issue{
	private $siteName;
	private $tosUrl;
	private $topic;
	private $quote;

	function __construct($siteName, $tosUrl, $topic, $quote){
		$this->siteName = $siteName;
		$this->tosUrl = $tosUrl;
		$this->topic = $topic;
		$this->quote = $quote;
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
}
