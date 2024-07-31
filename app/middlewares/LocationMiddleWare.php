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
            echo "<p>Wrong answer !!</p>";
        }
    }
}

?>