<?php

class LocationController{
    private LocationService $locationService;
    private PersonService $personService;
    public function __construct()
    {
        $this->locationService = new LocationService();
        $this->personService = new PersonService();
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
            $isCheckMentorKey = $this->locationService->checkMentorKey($topic_answer);
            $team_member = $isCheckMentorKey['team_member'];
            if($isCheckMentorKey['is_correct']){
                echo '<p>Correct answer !!</p>
                    <p>Please contact to: '. $team_member['mentor_name'] .', '. $team_member["mentor_phone"].'</p>';
            } else{
                echo '<p>Wrong answer !!</p>';
            }
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

//    [POST, FETCH] /location/get_answer
    public function get_answer($location_id){
        if ($location_id === 'LOC0000006'){
            $team_id = 'TEA0000001';
            $team_member = $this->personService->getTeamMemberByTeamIdOrMentorId($team_id);
            echo json_encode(array(
               'mentor_name' => $team_member['mentor_name'],
               'mentor_phone' => $team_member['mentor_phone'],
            ));
        } else{
            $location = $this->locationService->getAnswerByLocationId($location_id);
            echo json_encode(array(
                'location_address' => $location->getLocationAddress(),
                'location_name' => $location->getLocationName(),
                'bus_go' => $location->getBusGo(),
                'bus_back' => $location->getBusBack(),
            ));
        }


    }
}

?>