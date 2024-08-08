<?php

class TeamController{

    public function __construct()
    {
    }

    public function index(){

        $content = 'team';
        include "./views/layout/index.php";
    }

    public function game_1(){

        $content = 'team-game_1';
        include "./views/layout/index.php";
    }
}

?>