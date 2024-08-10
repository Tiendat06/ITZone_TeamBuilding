<?php

class SupportController{

    public function __construct()
    {
    }

//    [GET] /support
    public function index(){

        $content = 'support';
        include "./views/layout/index.php";
    }

//    [GET] /support/question
    public function question(){

        $content = 'support-question';
        include "./views/layout/index.php";
    }

//    [GET] /support/team
    public function team_control()
    {

        $content = 'support-team';
        include "./views/layout/index.php";
    }
}

?>