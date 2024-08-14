<?php

class SupportController{

    public function __construct()
    {
    }

//    [GET] /support
    public function index(){

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