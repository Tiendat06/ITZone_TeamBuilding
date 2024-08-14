<?php

class GuardController{
    public function __construct()
    {

    }

//    [GET] /guard
    public function index()
    {
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