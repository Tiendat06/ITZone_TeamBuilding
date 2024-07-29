<?php

class Mentor extends Person{
    private string $mentor_key;

    public function __construct($person_id, $person_name, $person_phone, $mentor_key)
    {
        parent::__construct($person_id, $person_name, $person_phone);
        $this->mentor_key = $mentor_key;
    }

    public function getMentorKey(){
        return $this->mentor_key;
    }

    public function setMentorKey($mentor_key){
        $this->mentor_key = $mentor_key;
    }
}

?>