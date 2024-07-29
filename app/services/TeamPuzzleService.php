<?php

class TeamPuzzleService{
    private TeamPuzzleRepository $teamPuzzleRepository;
    public function __construct()
    {
        $this->teamPuzzleRepository = new TeamPuzzleRepository();
    }

    public function getTeamPuzzles($team_id, $topic_id){
        return $this->teamPuzzleRepository->getTeamPuzzles($team_id, $topic_id);
    }
}

?>