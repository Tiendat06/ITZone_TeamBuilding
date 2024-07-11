<?php

class SiteController{
    private SiteService $siteService;

    public function __construct()
    {
        $this->siteService = new SiteService();
    }

//    [GET] /
    public function index(){
        $this->siteService->index();
        $content = 'home';
        return include "./views/layout/index.php";
    }

//    [POST] /student
    public function index_POST(){
        $this->siteService->index_POST();
    }

}

?>
