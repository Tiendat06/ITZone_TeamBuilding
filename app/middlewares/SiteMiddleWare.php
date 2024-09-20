<?php

class SiteMiddleWare{

    private SiteController $siteController;

    public function __construct(){
        $this->siteController = new SiteController();
    }

    public function index(){
        if (isset($_SESSION['person_id']) && isset($_SESSION['role_name'])) {
            $role_name = $_SESSION['role_name'];
            if ($role_name == 'mentor') {
                header('location: /mentor');
            } else if ($role_name == 'guard') {
                header('location: /guard');
            } else if ($role_name == 'support') {
                header('location: /support');
            } else if ($role_name == 'team') {
                header('location: /team/game-mentor');
            }
        } else{
            $this->siteController->index();
        }
    }

}

?>