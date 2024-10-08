<?php

class MentorMiddleWare{
    private MentorController $mentorController;
    public function __construct()
    {
        $this->mentorController = new MentorController();
    }

    public function index(){
        if ((!isset($_SESSION['person_id']) && !isset($_SESSION['role_name'])) || $_SESSION['role_name'] != 'mentor') {
            header('location: /');
        } else{
            $this->mentorController->index();
        }
    }

    public function mentor_rule(){
        if ((!isset($_SESSION['person_id']) && !isset($_SESSION['role_name'])) || $_SESSION['role_name'] != 'mentor') {
            header('location: /');
        } else{
            $this->mentorController->mentor_rule();
        }
    }

    public function mentor_member()
    {
        if ((!isset($_SESSION['person_id']) && !isset($_SESSION['role_name'])) || $_SESSION['role_name'] != 'mentor') {
            header('location: /');
        } else {
            $this->mentorController->mentor_member();
        }
    }

}

?>