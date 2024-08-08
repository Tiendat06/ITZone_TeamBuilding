<?php

class SupportController{

    public function __construct()
    {
    }

    public function index(){

        $content = 'support';
        include "./views/layout/index.php";
    }
}

?>