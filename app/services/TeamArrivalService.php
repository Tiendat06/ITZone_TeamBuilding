<?php

class TeamArrivalService{
    private TeamArrivalRepository $teamArrivalRepository;
    private SiteService $siteService;
    public function __construct()
    {
        $this->teamArrivalRepository = new TeamArrivalRepository();
        $this->siteService = new SiteService();
    }

    public function getTeamArrivalsAndLocationByTeamId($team_id): array{
        return $this->teamArrivalRepository->getTeamArrivalsAndLocationByTeamId($team_id);
    }

    public function updateIsShowNextLocation()
    {

    }
}

?>