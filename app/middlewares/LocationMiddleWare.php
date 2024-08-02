<?php

class LocationMiddleWare{

    private LocationController $locationController;
    public function __construct()
    {
        $this->locationController = new LocationController();
    }

    public function index($location_id){
        if(!empty($location_id)){
            $this->locationController->index($location_id);
        } else{
            header('location: /');
        }
    }

    public function send_answer(){
        $topic_answer = $_POST['topic_answer'];
//        $topic_id = $_POST['topic_id'];
        $location_id = $_POST['location_id'];

        if(!empty($topic_answer) && !empty($location_id)){
            $this->locationController->send_answer(strtoupper($topic_answer), $location_id);
        } else{
            echo "<p>Please fill in your answer !!</p>";
        }
    }

    public function get_answer(){
        $content = trim(file_get_contents("php://input"));
        $data = json_decode($content, true);
        if(!empty($data['location_id'])){
            $location_id = $data['location_id'];
            $this->locationController->get_answer($location_id);
        } else{
            echo json_encode(array(
                'fail' => "<p>Invalid value !!</p>"
            ));
        }
    }
}

?>