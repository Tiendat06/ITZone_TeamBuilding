<?php

class SiteController{
    private SiteService $siteService;

    public function __construct()
    {
        $this->siteService = new SiteService();
    }

    public function index(){
        $this->siteService->index();
        $content = 'home';
        return include "./views/layout/index.php";
    }

    public function index_POST(){
        header('Content-Type: application/json');
        $data = json_decode(file_get_contents('php://input'), true);
        $name = $data['name'] ?? '';
        $response = array(
            'message' => "Hello, {$name}!"
        );
//        for form POST (form POST is easier to use than json)
//        $name = $_POST['name'];
        echo json_encode($response);
    }

}

?>
