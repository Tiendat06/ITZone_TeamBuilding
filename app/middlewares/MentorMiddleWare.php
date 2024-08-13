<?php

class MentorMiddleWare{
    private MentorController $mentorController;
    public function __construct()
    {
        $this->mentorController = new MentorController();
    }

    public function index(){
        if (!isset($_SESSION['person_id']) && !isset($_SESSION['role_name'])) {
            header('location: /');
        } else{
            $this->mentorController->index();
        }
    }

    public function mentor_member()
    {
        if (!isset($_SESSION['person_id']) && !isset($_SESSION['role_name'])) {
            header('location: /');
        } else {
            $this->mentorController->mentor_member();
        }
    }

}

?>