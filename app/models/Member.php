<?php

class Member extends Person{
    public function __construct($person_id, $person_name, $person_phone)
    {
        parent::__construct($person_id, $person_name, $person_phone);
    }
}

?>