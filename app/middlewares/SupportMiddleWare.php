<?php

class SupportMiddleWare{
    private SupportController $supportController;
    public function __construct()
    {
        $this->supportController = new SupportController();
    }

    public function index(){
        $this->supportController->index();
    }

    public function question(){
        $this->supportController->question();
    }

    public function team_control(){
        $this->supportController->team_control();
    }
}

?>