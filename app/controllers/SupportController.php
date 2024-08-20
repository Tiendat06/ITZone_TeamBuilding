<?php

class SupportController{

    private PersonService $personService;
    public function __construct()
    {
        $this->personService = new PersonService();
    }

//    [GET] /support
    public function index(){
        $mentors = $this->personService->getAllMentor();
        $guards = $this->personService->getAllGuard();
        $content = 'support';
        $footer = 'home';
        include "./views/layout/index.php";
    }

//    [GET] /support/question
    public function question(){

        $content = 'support-question';
        $footer = 'question';
        include "./views/layout/index.php";
    }

//    [GET] /support/team
    public function team_control()
    {

        $content = 'support-team';
        $footer = 'team';
        include "./views/layout/index.php";
    }
}

?>