<?php

class TeamController{
    private TeamArrivalService $teamArrivalService;
    private TeamPuzzleService $teamPuzzleService;
    private LocationService $locationService;
    private HintService $hintService;

    public function __construct()
    {
        $this->teamArrivalService = new TeamArrivalService();
        $this->teamPuzzleService = new TeamPuzzleService();
        $this->locationService = new LocationService();
        $this->hintService = new HintService();
    }

//    [POST, FETCH] /team/get_topic_hint
    public function get_topic_hint($topic_id, $hint_priority){
        if($this->hintService->updateHintByTopicIdAndPriority($topic_id, $hint_priority)){
            echo json_encode(array(
               'status' => true,
               'message' => 'Update hint successfully'
            ));
        } else {
            echo json_encode(array(
               'status' => false,
               'message' => 'Update hint failed'
            ));
        }
    }

//    [POST, FETCH] /team/update_topic_is_done
    public function update_topic_is_done($topic_id, $is_done)
    {
        $data = $this->teamPuzzleService->updateTeamIsDoneByTopicIdAndTeamId($topic_id, $is_done);
        if($data){
            echo json_encode(array(
                'status' => true,
                'message' => 'Update Successfully'
            ));
        } else {
            echo json_encode(array(
                'status' => false,
                'message' => 'Update Failed'
            ));
        }
        return;
    }

//    [POST, FETCH] /team/update_time_fine
    public function update_time_fine($topic_id){
        $data = $this->teamPuzzleService->updateTimeFineByTopicIdAndTeamId($topic_id);
        if($data['isUpdateSuccess']){
            echo json_encode(array(
                'status' => true,
                'message' => 'Update Successfully',
                'time_fine' => $data['time_fine']
            ));
        } else {
            echo json_encode(array(
                'status' => false,
                'message' => 'Update Failed'
            ));
        }
    }

//    [POST, FETCH] /team/check_time_fine
    public function check_time_fine($topic_id){
        $data = $this->teamPuzzleService->getTeamPuzzlesByTeamIdAndTopicId($topic_id);
        echo json_encode(array(
           'status' => true,
           'time_fine' =>  $data['time_fine']
        ));
    }

//    [POST, FETCH] /team/check_is_done_topic
    public function check_is_done_topic($topic_id){
        if ($this->teamPuzzleService->checkTeamIsDoneByTopicIdAndTeamId($topic_id)){
            echo json_encode(array(
                'status' => true,
                'message' => 'Complete'
            ));
        } else{
            echo json_encode(array(
                'status' => false,
                'message' => 'Incomplete'
            ));
        }
    }

//    [POST, FETCH] /team/update_lotte_location
    public function update_lotte_location($location_id){
        if($this->teamArrivalService->updateIsShowNextLocationByLocationIdAndTeamId($location_id)){
            echo json_encode(array(
                'status' => true,
                'message' => 'Update Lotte Successfully'
            ));
        } else {
            echo json_encode(array(
                'status' => false,
                'message' => 'Update Lotte Failed'
            ));
        }
    }

//    [POST, FETCH] /team/view_topic_hint
    public function view_topic_hint($topic_id, $hint_priority){
        $hint = $this->hintService->getHintByTopicIdAndPriority($topic_id, $hint_priority);
        if($hint){
            echo json_encode(array(
                'status' => true,
                'hint_description' => $hint->getHintDescription(),
            ));
        } else {
            echo json_encode(array(
                'status' => false,
                'message' => 'Hint not found',
            ));
        }

    }

//    [GET] /team/game-1
    public function game_1(){
        $team_arrival_location = $this->teamArrivalService->getTeamArrivalsAndLocationByTeamId();
        $content = 'team-game-1';
        $footer = 'game';
        include "./views/layout/index.php";
    }

//    [GET] /team/game-1-topic/{param}
    public function game_1_topic($location_id){
        $topic_data = $this->locationService->index($location_id);
        $location_data = $this->locationService->getLocationByLocationId($location_id);

        $content = 'team-game-1-topic';
        $footer = 'game';
        include "./views/layout/index.php";
    }

//    [GET] /team/game-mentor
    public function game_mentor()
    {
        $location_id = $this->teamArrivalService->getMentorLocationByTeamId();
        $content = 'team-game-mentor';
        $footer = 'home';
        include "./views/layout/index.php";
    }

//    [GET] /team/mentor-topic/{param}
    public function mentor_topic($location_id)
    {
        $topic_data = $this->locationService->index($location_id);
        $content = 'team-mentor-topic';
        $footer = 'home';
        include "./views/layout/index.php";
    }

//    [GET] /team/member
    public function team_member()
    {

        $content = 'team-member';
        $footer = 'team';
        include "./views/layout/index.php";
    }
}

?>