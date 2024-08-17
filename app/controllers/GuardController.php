<?php

class GuardController{
    private AccountService $accountService;
    public function __construct()
    {
        $this->accountService = new AccountService();
    }

//    [GET] /guard
    public function index()
    {
        $content = 'guard';
        $footer = 'home';
        include "./views/layout/index.php";
    }

//    [GET] /guard
    public function guardLocation()
    {
        $person_id = $_SESSION['person_id'];
        $location_name = $this->accountService->getLocationNameByPersonId($person_id);
        $location_map = $this->accountService->getLocationMapByPersonId($person_id);
        $location_address = $this->accountService->getLocationMAddressByPersonId($person_id);
        $content = 'guard-location';
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