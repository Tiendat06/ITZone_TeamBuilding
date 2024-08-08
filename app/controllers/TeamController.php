<?php

class TeamController{

    public function __construct()
    {
    }

    public function game_1(){

        $content = 'team';
        include "./views/layout/index.php";
    }

    public function game_1_topic($location_id){

        $content = 'team-game_1';
        include "./views/layout/index.php";
    }
}

?>