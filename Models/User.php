<?php

/**
 *  
 */
class User{
	private $id;
	private $email;
	private $name;
	private $password;
	private $experience;

	function __construct($name, $email, $experience, $password){
		$this->email = $email;
        $this->password = $password;
		$this->name = $name;
		$this->experience = $experience;
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

	public function getExperience()
	{
		return $this->experience;
	}
	public function setExperience($experience)
	{
		$this->experience = $experience;
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
