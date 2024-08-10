<?php

class TeamController{

    public function __construct()
    {
    }

//    [GET] /team/game-1
    public function game_1(){

        $content = 'team-game-1';
        include "./views/layout/index.php";
    }

//    [GET] /team/game-1-topic/{param}
    public function game_1_topic($location_id){

        $content = 'team-game-1-topic';
        include "./views/layout/index.php";
    }
}

?>