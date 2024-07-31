<?php

class LocationController{
    private LocationService $locationService;
    public function __construct()
    {
        $this->locationService = new LocationService();
    }

//    [GET] /location/{param}
    public function index($location_id){
        $topic_data = $this->locationService->index($location_id);
        $content = 'location';
        include "./views/layout/index.php";
    }

//    [POST, AJAX] /location/send_answer
    public function send_answer($topic_answer, $location_id){
        if ($location_id === 'LOC0000006'){

        } else if($location_id === 'LOC0000001'){

        } else{
            $isTopicAnswerCorrect = $this->locationService->checkTopicAnswerIsCorrect($topic_answer, $location_id);
            if($isTopicAnswerCorrect['is_correct']){
                echo '<p>Correct answer !!</p>
                    <p>Please go to: '. $isTopicAnswerCorrect['location_address'].'</p>';
            } else {
                echo '<p>Wrong answer !!</p>';
            }
        }

    }
}

?>