<?php

class TeamMiddleWare{
    private TeamController $teamController;

    public function __construct()
    {
        $this->teamController = new TeamController();
    }

    public function index(){
        $this->teamController->index();
    }

    public function game_1(){
        $this->teamController->game_1();
    }
}

?>