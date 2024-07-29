<?php

class SiteController{
    private SiteService $siteService;
    private TeamArrivalService $teamArrivalService;
    private HintService $hintService;
    private TeamPuzzleService $teamPuzzleService;
    private LocationService $locationService;

    public function __construct()
    {
        $this->siteService = new SiteService();
        $this->teamArrivalService = new TeamArrivalService();
        $this->hintService = new HintService();
        $this->teamPuzzleService = new TeamPuzzleService();
        $this->locationService = new LocationService();
    }

//    [GET] /
    public function index(){
        $this->siteService->index();
        $team_arrival = $this->teamArrivalService->getTeamArrivalsAndLocation('TEA0000001');
        $hint = $this->hintService->getHintsWithIsShow('TEA0000001');
        $team_puzzle = $this->teamPuzzleService->getTeamPuzzles('TEA0000001', 'TOP0000001');
        $location = $this->locationService->getLocations();
        print_r($location);
        $content = 'home';
        include "./views/layout/index.php";
    }

//    [POST] /student
    public function index_POST(){
        $this->siteService->index_POST();
    }

}

?>
