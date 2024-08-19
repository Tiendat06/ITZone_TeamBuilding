<?php

class TeamArrivalService{
    private TeamArrivalRepository $teamArrivalRepository;
    private SiteService $siteService;
    public function __construct()
    {
        $this->teamArrivalRepository = new TeamArrivalRepository();
        $this->siteService = new SiteService();
    }

    public function getTeamArrivalByLocationIdAndTeamId($location_id): TeamArrival{
        $team_id = $_SESSION['person_id'];
        return $this->teamArrivalRepository->getTeamArrivalByLocationIdAndTeamId($location_id, $team_id);
    }

    public function getTeamArrivalByTeamArrivalId($team_arrival_id): TeamArrival{
        return $this->teamArrivalRepository->getTeamArrivalByTeamArrivalId($team_arrival_id);
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

    public function getTeamArrivalsByLocationIdAndIsOpenNextLocation($location_id): int{
        return $this->teamArrivalRepository->countTeamArrivalsByLocationIdAndIsOpenNextLocation($location_id);
    }

    public function getTeamArrivalAndTeamByLocationId($location_id): array{
        return $this->teamArrivalRepository->getTeamArrivalAndTeamByLocationId($location_id);
    }
}

?>