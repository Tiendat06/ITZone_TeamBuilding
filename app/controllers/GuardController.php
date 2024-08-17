<?php

class GuardController{
    private AccountService $accountService;
    private LocationService $locationService;
    public function __construct()
    {
        $this->accountService = new AccountService();
        $this->locationService = new LocationService();
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
        $content = 'guard-question';
        $footer = 'question';
        include "./views/layout/index.php";
    }
}

?>