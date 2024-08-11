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

    public function game_mentor()
    {
        $this->teamController->game_mentor();
    }

    public function mentor_topic($location_id)
    {
        $this->teamController->mentor_topic($location_id);
    }

    public function team_member()
    {
        $this->teamController->team_member();
    }
}

?>