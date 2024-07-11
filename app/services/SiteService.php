<?php

class SiteService{

    public function __construct(){
//        initialize repository here
    }

    public function index(){
//        echo 'hi world hehehe';
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
