<?php

class TeamArrivalService{
    private TeamArrivalRepository $teamArrivalRepository;
    public function __construct()
    {
        $this->teamArrivalRepository = new TeamArrivalRepository();
    }

    public function getTeamArrivalsAndLocationByTeamId($team_id): array{
        return $this->teamArrivalRepository->getTeamArrivalsAndLocationByTeamId($team_id);
    }
}

?>