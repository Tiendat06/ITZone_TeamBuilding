<?php

class MentorController{
    public function __construct()
    {
    }

//    [GET] /mentor
    public function index(){

        $content = 'mentor';
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