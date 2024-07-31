<?php

class PersonService{
    private PersonRepository $personRepository;
    public function __construct()
    {
        $this->personRepository = new PersonRepository();
    }

    public function getTeamMemberByTeamIdOrMentorId($team_id, $operation): array{
        return $this->personRepository->getTeamMemberByTeamIdOrMentorId($team_id, $operation);
    }
}

?>