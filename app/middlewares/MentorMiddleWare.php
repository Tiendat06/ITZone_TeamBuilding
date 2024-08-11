<?php

class MentorMiddleWare{
    private MentorController $mentorController;
    public function __construct()
    {
        $this->mentorController = new MentorController();
    }

    public function index(){
        $this->mentorController->index();
    }

    public function mentor_member()
    {
        $this->mentorController->mentor_member();
    }

}

?>