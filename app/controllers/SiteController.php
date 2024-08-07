<?php

class SiteController{
    private SiteService $siteService;
    private TeamArrivalService $teamArrivalService;
    private HintService $hintService;
    private TeamPuzzleService $teamPuzzleService;
    private LocationService $locationService;
    private AccountService $accountService;
    private PersonService $personService;

    public function __construct()
    {
        $this->siteService = new SiteService();
        $this->teamArrivalService = new TeamArrivalService();
        $this->hintService = new HintService();
        $this->teamPuzzleService = new TeamPuzzleService();
        $this->locationService = new LocationService();
        $this->accountService = new AccountService();
        $this->personService = new PersonService();
    }

//    [GET] /
    public function index(){
//        $this->siteService->index();
//        $team_arrival = $this->teamArrivalService->getTeamArrivalsAndLocationByTeamId('TEA0000001');
//        $hint = $this->hintService->getHintsWithIsShow('TEA0000001');
//        $team_puzzle = $this->teamPuzzleService->getTeamPuzzlesByTeamIdAndTopicId('TEA0000001', 'TOP0000001');
//        $location = $this->locationService->getLocations();
//        $next_id = $this->siteService->getNextOrPreviousId('TAV0000005');
//        $checkLogin = $this->accountService->checkLogin('', 'mentor01_ITZone');
//        $role_name = $this->accountService->getRoleByUsernameAndPassword('', 'mentor01_ITZone');
//        $team_member = $this->personService->getTeamMemberByTeamIdOrMentorId('MEN0000002', 'mentor');

//        $content = 'home';
        include "./views/site/home.php";
    }

//    [POST] /student
    public function index_POST(){
        $this->siteService->index_POST();
    }

}

?>
