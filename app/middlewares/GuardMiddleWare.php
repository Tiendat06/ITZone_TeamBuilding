<?php

class  GuardMiddleWare{
    private GuardController $guardController;
    public function __construct()
    {
        $this->guardController = new GuardController();
    }

    public function index()
    {
        if ((!isset($_SESSION['person_id']) && !isset($_SESSION['role_name'])) || $_SESSION['role_name'] != 'guard') {
            header('location: /');
        } else {
//            $this->guardController->index();
              $this->guardController->guardLocation();
        }
    }

    public function question()
    {
        if ((!isset($_SESSION['person_id']) && !isset($_SESSION['role_name'])) || $_SESSION['role_name'] != 'guard') {
            header('location: /');
        } else{
            $this->guardController->question();
        }
    }
}

?>