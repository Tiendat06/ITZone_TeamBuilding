<?php

class TeamArrivalService{
    private TeamArrivalRepository $teamArrivalRepository;
    private SiteService $siteService;
    public function __construct()
    {
        $this->teamArrivalRepository = new TeamArrivalRepository();
        $this->siteService = new SiteService();
    }

    public function getTeamArrivalsAndLocationByTeamId(): array{
        $team_id = $_SESSION['person_id'];
        return $this->teamArrivalRepository->getTeamArrivalsAndLocationByTeamId($team_id);
    }

    public function updateIsShowNextLocationByLocationIdAndTeamId($location_id): bool{
        $team_id = $_SESSION['person_id'];
        return $this->teamArrivalRepository->updateIsShowNextLocationByLocationIdAndTeamId($location_id, $team_id);
    }

    public function getMentorLocationByTeamId(): string{
        $team_id = $_SESSION['person_id'];
        return $this->teamArrivalRepository->getMentorLocationByTeamId($team_id);
    }

    public function getTeamArrivalsInD1ByTeamId(): array{
        $team_id = $_SESSION['person_id'];
        return $this->teamArrivalRepository->getTeamArrivalsInD1ByTeamId($team_id);
    }
}

?>