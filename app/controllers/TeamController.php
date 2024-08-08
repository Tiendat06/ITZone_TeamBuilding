<?php

class TeamController{

    public function __construct()
    {
    }

    public function index(){

        $content = 'team';
        include "./views/layout/index.php";
    }
}

?>