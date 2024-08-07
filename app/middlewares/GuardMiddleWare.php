<?php

class  GuardMiddleWare{
    private GuardController $guardController;
    public function __construct()
    {
        $this->guardController = new GuardController();
    }

    public function index()
    {
        $this->guardController->index();
    }

    public function question()
    {
        $this->guardController->question();
    }
}

?>