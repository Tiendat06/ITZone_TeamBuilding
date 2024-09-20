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
        $content = trim(file_get_contents("php://input"));
        $data = json_decode($content, true);

        if(!empty($data['topic_answer']) && !empty($data['location_id'])){
            $topic_answer = $data['topic_answer'];
            $location_id = $data['location_id'];
            $this->locationController->send_answer(strtoupper($topic_answer), $location_id);
        } else{
            echo json_encode(array(
                'status' => false,
                'message' => 'Rất tiếc câu trả lời của bạn đã sai'
            ));
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