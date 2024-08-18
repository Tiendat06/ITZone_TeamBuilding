<?php

class GuardController{
    private AccountService $accountService;
    private LocationService $locationService;
    private PersonService $personService;
    private TeamArrivalService $teamArrivalService;
    public function __construct()
    {
        $this->accountService = new AccountService();
        $this->locationService = new LocationService();
        $this->personService = new PersonService();
        $this->teamArrivalService = new TeamArrivalService();
    }

//    [POST, FETCH] /guard/update_next_location
    public function update_next_location($team_id, $mentor_id, $next_priority, $inputKey){
        $location = $this->locationService->getLocationDataByPersonId();
        $location_id = $location->getLocationId();
        echo json_encode($this->personService->unlockNextLocation($team_id, $mentor_id, $next_priority, $inputKey, $location_id));
    }

//    [GET] /guard
    public function index()
    {
        $location = $this->locationService->getLocationDataByPersonId();
        $location_name = $location->getLocationName();
        $location_map = $location->getLocationMap();
        $location_address = $location->getLocationAddress();
        $content = 'guard';
        $footer = 'home';
        include "./views/layout/index.php";
    }

//    [GET] /guard/question
    public function question()
    {
        $location = $this->locationService->getLocationDataByPersonId();
        $location_id = $location->getLocationId();
        $teams = $this->teamArrivalService->getTeamArrivalAndTeamByLocationId($location_id);
        $team_arrival_progress = $this->teamArrivalService->getTeamArrivalsByLocationIdAndIsOpenNextLocation($location_id);
        $team_arrival_percent_complete = $team_arrival_progress * 100 / 6;

        $content = 'guard-question';
        $footer = 'question';
        include "./views/layout/index.php";
    }
}

?>