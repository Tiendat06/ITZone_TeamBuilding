<?php

class MentorController{
    private PersonService $personService;
    public function __construct()
    {
        $this->personService = new PersonService();
    }

//    [GET] /mentor
    public function index(){
        $mentor = $this->personService->getMentorByMentorId();
        $mentor_name = $mentor->getPersonName();
        $mentor_phone = $mentor->getPersonPhone();
        $mentor_key = $mentor->getMentorKey();

        $team_member = $this->personService->getTeamMemberWhileDoneMentorGame();

        $content = 'mentor';
        $footer = 'home';
        include "./views/layout/index.php";
    }

//    [GET] /mentor/member
    public function mentor_member()
    {
        $content = 'mentor-member';
        include "./views/layout/index.php";
    }
}

?>