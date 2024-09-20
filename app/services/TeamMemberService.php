<?php

class TeamMemberService{
    private TeamMemberRepository $teamMemberRepository;
    private TeamArrivalRepository $teamArrivalRepository;
    private PersonRepository $personRepository;
    public function __construct()
    {
        $this->teamMemberRepository = new TeamMemberRepository();
        $this->teamArrivalRepository = new TeamArrivalRepository();
        $this->personRepository = new PersonRepository();
    }

    public function getTeamMemberInSupportControl($team_id) {
        $team_arrival = $this->teamArrivalRepository->getTeamArrivalByTeamId($team_id);
        $team_member = $this->personRepository->getTeamMemberByTeamId($team_id);
        $team_mentor = $this->personRepository->getTeamMemberByTeamIdOrMentorId($team_id);
        return array(
            "team_arrival" => $team_arrival,
            "team_member" => $team_member,
            "team_mentor" => $team_mentor
        );
    }
}

?>