<?php

class SupportMiddleWare{
    private SupportController $supportController;
    public function __construct()
    {
        $this->supportController = new SupportController();
    }

    public function index(){
        if (!isset($_SESSION['person_id']) && !isset($_SESSION['role_name'])) {
            header('location: /');
        } else {
            $this->supportController->index();
        }
    }

    public function question(){
        if (!isset($_SESSION['person_id']) && !isset($_SESSION['role_name'])) {
            header('location: /');
        } else {
            $this->supportController->question();
        }
    }

    public function team_control(){
        if (!isset($_SESSION['person_id']) && !isset($_SESSION['role_name'])) {
            header('location: /');
        } else {
            $this->supportController->team_control();
        }
    }
}

?>