<?php

class Users{

    
    private $users_Id;
    private $users_Name;
    private $users_SurName;
    private $users_Email;
    private $users_Password;

	public function __construct($users_Id, $users_Name, $users_SurName, $users_Email, $users_Password) {
        $this->users_Id = $users_Id;
        $this->users_Name = $users_Name;
        $this->users_SurName = $users_SurName;
        $this->users_Email = $users_Email;
        $this->users_Password = $users_Password;
    }

    public function getUsers_Id(){
		return $this->users_Id;
	}

	public function setUsers_Id($users_Id){
		$this->users_Id = $users_Id;
	}

	public function getUsers_Name(){
		return $this->users_Name;
	}

	public function setUsers_Name($users_Name){
		$this->users_Name = $users_Name;
	}

	public function getUsers_SurName(){
		return $this->users_SurName;
	}

	public function setUsers_SurName($users_SurName){
		$this->users_SurName = $users_SurName;
	}

	public function getUsers_Email(){
		return $this->users_Email;
	}

	public function setUsers_Email($users_Email){
		$this->users_Email = $users_Email;
	}

	public function getUsers_Password(){
		return $this->users_Password;
	}

	public function setUsers_Password($users_Password){
		$this->users_Password = $users_Password;
	}
}