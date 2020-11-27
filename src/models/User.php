<?php

class User{
    private $email;
    private $username;
    private $password;

    public function __construct(string $email, string $username, string $password){
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
    }

    public function setEmail(string $email){
        $this->email = $email;
    }

    public function setUsername(string $username){
        $this->username = $username;
    }

    public function setPassword(string $password){
        $this->password = $password;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getPassword(){
        return $this->password;
    }

    
}