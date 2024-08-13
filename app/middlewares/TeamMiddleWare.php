<?php

class TeamMiddleWare{
    private TeamController $teamController;

    public function __construct()
    {
        $this->teamController = new TeamController();
    }

    public function game_1(){
        if (!isset($_SESSION['person_id']) && !isset($_SESSION['role_name'])) {
            header('location: /');
        } else {
            $this->teamController->game_1();
        }
    }

    public function game_1_topic($location_id){
        if (!isset($_SESSION['person_id']) && !isset($_SESSION['role_name'])) {
            header('location: /');
        } else {
            $this->teamController->game_1_topic($location_id);
        }
    }

    public function game_mentor()
    {
        if (!isset($_SESSION['person_id']) && !isset($_SESSION['role_name'])) {
            header('location: /');
        } else {
            $this->teamController->game_mentor();
        }
    }

    public function mentor_topic($location_id)
    {
        if (!isset($_SESSION['person_id']) && !isset($_SESSION['role_name'])) {
            header('location: /');
        } else {
            $this->teamController->mentor_topic($location_id);
        }
    }

    public function team_member()
    {
        if (!isset($_SESSION['person_id']) && !isset($_SESSION['role_name'])) {
            header('location: /');
        } else {
            $this->teamController->team_member();
        }
    }
}

?>