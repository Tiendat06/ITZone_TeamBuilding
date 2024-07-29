<?php

abstract class Person{
    private string $person_id;
    private string $person_name;
    private string $person_phone;

    public function __construct($person_id, $person_name, $person_phone){
        $this->person_id = $person_id;
        $this->person_name = $person_name;
        $this->person_phone = $person_phone;
    }

    public function getPersonId(){
        return $this->person_id;
    }

    public function getPersonName(){
        return $this->person_name;
    }

    public function getPersonPhone(){
        return $this->person_phone;
    }

    public function setPersonId($person_id){
        $this->person_id = $person_id;
    }

    public function setPersonName($person_name){
        $this->person_name = $person_name;
    }

    public function setPersonPhone($person_phone){
        $this->person_phone = $person_phone;
    }
}

?>