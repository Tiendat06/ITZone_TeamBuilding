<?php

class TeamArrivalService{
    private TeamArrivalRepository $teamArrivalRepository;
    public function __construct()
    {
        $this->teamArrivalRepository = new TeamArrivalRepository();
    }

    public function getTeamArrivalsAndLocation($team_id): array{
        return $this->teamArrivalRepository->getTeamArrivalsAndLocation($team_id);
    }
}

?>