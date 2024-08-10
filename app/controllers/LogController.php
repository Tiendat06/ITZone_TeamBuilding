<?php

class LogController{
    public function __construct()
    {
    }

    public function index($username, $pwd){
        echo 'hi world';
        echo 'Hi WORLD 1234';
//        code
    }

//    [POST]
    public function checkLogin($username, $pwd){

    }

//    [GET] /log/login
    public function login(){

        include "./views/log/login.php";
    }
}

?>