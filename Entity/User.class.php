<?php

class User {
    
    //Attributes
    private $userID;
    private $firstName;
    private $lastName;
    private $username;
    private $email;
    private $address;
    private $password;

    //getters
    public function getID(): int {
        return $this->userID;
    }
    public function getFirstName(): String {
        return $this->firstName;
    }
    public function getLastName(): String {
        return $this->lastName;
    }
    public function getUsername(): String {
        return $this->username;
    }
    public function getEmail(): String {
        return $this->email;
    }
    public function getAddress(): String {
        return $this->address;
    }
    public function getPassword(): String {
        return $this->password;
    }

    //setters
    public function setID(int $userID) {
        $this->userID = $userID;
    }
    public function setFirstName(String $firstName) {
        $this->firstName = $firstName;
    }
    public function setLastName(String $lastName) {
        $this->lastName = $lastName;
    }
    public function setUsername(String $username) {
        $this->username = $username;
    }
    public function setEmail(String $email) {
        $this->email = $email;
    }
    public function setAddress(String $address) {
        $this->address = $address;
    }
    public function setPassword(String $password) {
        $this->password = $password;
    }

    //Serialize obj to json
    public function jsonSerialize() {
        $obj = new stdClass;
        $obj->userID = $this->userID;
        $obj->firstName = $this->firstName;
        $obj->lastName = $this->lastName;
        $obj->username = $this->username;
        $obj->email = $this->email;
        $obj->address = $this->address;
        $obj->password = $this->password;
        return $obj;
    }

    //Verify password
    function verifyPass(string $passToVerify) {

        return password_verify($passToVerify, $this->getPassword());
    }

}
?>