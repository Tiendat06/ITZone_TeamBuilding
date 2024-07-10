<?php

class SiteMiddleWare{

    private SiteController $siteController;

    public function __construct(){
        $this->siteController = new SiteController();
    }

    public function index(){
        $this->siteController->index();
    }

}

?>