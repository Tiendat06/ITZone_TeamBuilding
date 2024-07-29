<?php

class Account{
    private string $account_id;
    private string $account_username;
    private string $account_password;
    private string $person_id;
    private string $role_id;

    public function __construct($account_id, $account_username, $account_password, $person_id, $role_id){
        $this->account_id = $account_id;
        $this->account_username = $account_username;
        $this->account_password = $account_password;
        $this->person_id = $person_id;
        $this->role_id = $role_id;
    }

    public function getAccountId(){
        return $this->account_id;
    }

    public function getAccountUsername(){
        return $this->account_username;
    }

    public function getAccountPassword(){
        return $this->account_password;
    }

    public function getPersonId(){
        return $this->person_id;
    }

    public function getRoleId(){
        return $this->role_id;
    }

    public function setAccountId($account_id){
        $this->account_id = $account_id;
    }

    public function setAccountUsername($account_username){
        $this->account_username = $account_username;
    }

    public function setAccountPassword($account_password){
        $this->account_password = $account_password;
    }

    public function setPersonId($person_id){
        $this->person_id = $person_id;
    }

    public function setRoleId($role_id){
        $this->role_id = $role_id;
    }

}

?>