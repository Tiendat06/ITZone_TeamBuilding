<?php

class PersonService{
    private PersonRepository $personRepository;
    public function __construct()
    {
        $this->personRepository = new PersonRepository();
    }

    public function getTeamMemberByTeamIdOrMentorId($team_id, $operation='team'): array{
        return $this->personRepository->getTeamMemberByTeamIdOrMentorId($team_id, $operation);
    }

    public function getPersonNameByPersonId($person_id, $role_name){
        return $this->personRepository->getPersonNameByPersonId($person_id, $role_name);
    }
}

?>