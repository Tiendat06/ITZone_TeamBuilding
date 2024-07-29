<?php

class PersonService{
    private PersonRepository $personRepository;
    public function __construct()
    {
        $this->personRepository = new PersonRepository();
    }
}

?>