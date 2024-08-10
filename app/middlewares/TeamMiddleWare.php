<?php

class TeamMiddleWare{
    private TeamController $teamController;

    public function __construct()
    {
        $this->teamController = new TeamController();
    }

    public function game_1(){
        $this->teamController->game_1();
    }

    public function game_1_topic($location_id){
        $this->teamController->game_1_topic($location_id);
    }
}

?>