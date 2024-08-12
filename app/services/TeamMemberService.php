<?php

class TeamMemberService{
    private TeamMemberRepository $teamMemberRepository;
    public function __construct()
    {
        $this->teamMemberRepository = new TeamMemberRepository();
    }
}

?>