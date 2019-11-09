<?php

/**
 *  
 */
class User{
	private $email;
	private $name;
	private $password;

	function __construct($email, $password, $name){
		$this->email = $email;
        $this->password = $password;
        $this->name = $name;
	}

	public function getPassword()
	{
		return $this->password;
	}
	public function setPassword($password)
	{
		$this->password = $password;
	}

	public function getEmail()
	{
		return $this->email;
	}
	public function setEmail($email)
	{
		$this->email = $email;
    }	  

	public function getName()
	{
		return $this->name;
	}
	public function setName($name)
	{
		$this->name = $name;
	}	
}
