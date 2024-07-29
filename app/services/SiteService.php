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
            'message' => "<h1 class='text-danger'>Hello, {$name}!</h1>"
        );
//        for form POST (form POST is easier to use than json)
//        $name = $_POST['name'];
        echo json_encode($response);
    }

    function getNextId($id) {
        preg_match('/(\D+)(\d+)/', $id, $matches);

        if (count($matches) == 3) {
            $prefix = $matches[1];
            $number = (int)$matches[2];

            $newNumber = $number + 1;

            $newId = $prefix . str_pad($newNumber, strlen($matches[2]), '0', STR_PAD_LEFT);

            return $newId;
        } else {
            return $id;
        }
    }

}

?>