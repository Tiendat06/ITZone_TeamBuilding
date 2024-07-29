<?php

class Team extends Person{
    private string $team_route;
    private string $mentor_id;

    public function __construct($person_id, $person_name, $person_phone, $team_route, $mentor_id)
    {
        parent::__construct($person_id, $person_name, $person_phone);
        $this->team_route = $team_route;
        $this->mentor_id = $mentor_id;
    }

    public function getTeamRoute(){
        return $this->team_route;
    }

    public function getMentorId(){
        return $this->mentor_id;
    }

    public function setTeamRoute($team_route){
        $this->team_route = $team_route;
    }

    public function setMentorId($mentor_id){
        $this->mentor_id = $mentor_id;
    }
}

?>