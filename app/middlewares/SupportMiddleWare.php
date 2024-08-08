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
}

?>